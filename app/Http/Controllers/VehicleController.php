<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use Illuminate\Contracts\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Http\FormRequest;

class VehicleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("vehicle.index", [

            'vehicles' => vehicle::paginate(5),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function create(Vehicle $vehicle)
    {
        return view("vehicle.create", [

            'vehicles' => Vehicle::all(),
            'vehicle' => $vehicle

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        Vehicle::create($request->validated() + [

            'status' => 'Y'

        ]);

        Alert::toast(__('Vehicle Added Successfully'), 'success')->autoClose(3000);
        return redirect()->route('vehicle.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Vehicle  
     * @return View
     */
    public function show(Vehicle $vehicle): View
    {
        return view("vehicle.show", [

            'vehicle' => $vehicle

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Vehicle 
     * @return View
     */
    public function edit(Vehicle $vehicle): View
    {
        return view('vehicle.edit', [

            'vehicle' => $vehicle

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleRequest  $request
     * @param  Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->name = $request->name;
        $vehicle->category = $request->category;
        $vehicle->color = $request->color;
        $vehicle->year = $request->year;
        $vehicle->capacity = $request->capacity;
        $vehicle->power = $request->power;
        $vehicle->save();


        Alert::toast(__('Vehicle Updated Successfully'), 'success')->autoClose(3000);
        return redirect(route('vehicle.index'));
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response  
     */
    public function destroy($id)
    {
        Vehicle::find($id)->delete();
        Alert::toast(__('Vehicle Deleted Successfully'), 'success')->autoClose(3000);
        return redirect(route('vehicle.index'));
    }
}
