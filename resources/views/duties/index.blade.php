<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Upcoming Duties
        </h2>
</x-slot>
<ul>
Hello everybody welcome back!
@foreach($duties as $duty)
<li>{{$duty->name}}</li>
<li>{{$duty->description}}</li>
<li>{{$duty->deadline}}</li>
@endforeach
</ul>
</x-app-layout>