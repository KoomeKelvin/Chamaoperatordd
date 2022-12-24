
<div class="grid grid-cols-6 gap-2">
    <div class="col-span-2 p-6">
    <p class="text-lg font-extrabold text-red-600 uppercase tracking-wider p-2">pending Tasks</p>
        @foreach($thependingduties as $duty)
        <p class="text-lg font-semibold text-red-600">{{$duty->name}}<p>
        <p class="text-base font-normal text-red-400">{{$duty->description}}</p>
        <x-jet-section-border/>
         @endforeach
         {{$thependingduties->links()}}
    </div>
    <div class="col-span-2 p-6">
     <p class="text-lg font-extrabold text-gray-600 uppercase tracking-wider p-2">Not started</p>
         @foreach($thedoneduties as $duty)
        <p class="text-lg font-semibold text-gray-600">{{$duty->name}}<p>
        <p class="text-base font-normal text-gray-400">{{$duty->description}}</p>
        <x-jet-section-border/>
         @endforeach
         {{$thedoneduties->links()}}
    </div>
  
    <div class="col-span-2 p-6">
     <p class="text-lg font-extrabold text-gray-600 uppercase tracking-wider p-2">Not started</p>
     {{dd($dutieswithoutstatus)}}
     {{-- @if(count($dutieswithoutstatus)>0)
         @foreach($dutieswithoutstatus as $duty)
        <p class="text-lg font-semibold text-gray-600">{{$duty->name}}<p>
        <p class="text-base font-normal text-gray-400">{{$duty->description}}</p>
        <x-jet-section-border/>
         @endforeach
         {{$dutieswithoutstatus->links()}}
    @endif --}}
    </div>
</div>
