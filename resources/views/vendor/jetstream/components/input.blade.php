@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-gray-300  dark:border-gray-700 dark:bg-slate-200 focus:border-indigo-900  dark:focus:border-indigo-900 focus:ring-opacity-50 rounded shadow-sm']) !!}>
