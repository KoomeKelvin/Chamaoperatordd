<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Change a Duty 
        </h2>
</x-slot>
<ul>
<li>{{$duty->name}}</li>
<li>{{$duty->description}}</li>
<li>{{$duty->deadline}}</li>
</ul>
</x-app-layout>