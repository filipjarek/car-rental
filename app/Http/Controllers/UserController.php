<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $users = User::select("*")
            ->whereNotNull('status')
            ->orderBy('status', 'DESC')
            ->paginate(5);

        return view('user.index', compact('users'), [

            'employees' => Employee::all(),

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  
     * @return View
     */
    public function show(User $user): View
    {
        return view("user.show", [

            'user' => $user

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User 
     * @return View
     */
    public function edit(User $user): View
    {
        return view("user.edit", [

            'employees' => Employee::all(),
            'users' => User::all(),
            'user' => $user

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  User  $user
     * 
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->employee_id = $request->employee_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        Alert::toast(__('User Updated Successfully'), 'success')->autoClose(3000);
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     *
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Alert::toast(__('User Deleted Successfully'), 'success')->autoClose(3000);
        return redirect(route('user.index'));
    }
}
