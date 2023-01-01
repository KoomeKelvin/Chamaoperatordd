@props(
    [
    'data'=>[]
    ]
)
@if(count($data)>0)
<table class="overflow-x-auto relative">
  <thead clas="w-full text-sm text-left text-gray-500">
    <tr>
        @foreach($data as $key=>$value)
        <th  class="py-3 px-6">{{ucwords(str_replace('_', ' ', $key))}}</th>
        @endforeach
    </tr>
    
  </thead>
  <tbody>
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        @foreach($data as $key=> $value)
         <td class="py-4 px-6 text-sm">{{$value}}</td>
        @endforeach
    </tr>
  </tbody>
</table>
@endif