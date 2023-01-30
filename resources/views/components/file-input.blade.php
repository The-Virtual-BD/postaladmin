@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['type' => 'file', 'class' => 'rounded-md border border-gray-300 text-gray-500 file:font-poppins file:mr-5 file:py-2 file:px-2 file:border-0 file:font-raleway  file:text-white file:bg-blue-500'])!!}/>
