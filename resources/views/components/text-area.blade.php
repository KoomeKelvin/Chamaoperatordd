@props(['disabled' => false, 'rows'=>4])

<textarea {{ $disabled ? 'disabled' : '' }} {{$rows}} {!! $attributes->merge(['class' => 'border-gray-300 sm:h-40 focus:border-indigo-300 focus:ring focus:ring-indigo-200 sm:focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
{{$slot}}
</textarea>