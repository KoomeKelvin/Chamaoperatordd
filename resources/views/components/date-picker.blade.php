
 
<input
    x-data
    x-ref="input"
    x-init="new Pikaday({ field: $refs.input, format:'M/D/YYYY', onSelect:function(){
        {{-- console.log(this); --}}
        } })"
    type="text"
    
    {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm'])!!}
/> 