<div class="grid grid-cols-6 gap-2">
    <div class="col-span-6 md:col-span-2 p-3 md:p-6">
        <p class="text-sm md:text-lg font-extrabold text-red-600 uppercase tracking-wider p-2">pending Tasks</p>
        @foreach($thependingduties as $duty)

        <div class="grid grid-cols-6 p-2 md:p-4">
                <div class="col-span-5">
                    <p class="text-sm md:text-lg font-semibold text-red-600 tracking-wide">{{$duty->name}}<p>
                    <p class="text-sm md:text-base font-light text-red-400 leading-normal">{{$duty->description}}</p>
                    <p class="text-xs text-purple-600">Due .. {{$duty->deadline->diffForHumans()}}</p>
                </div>
                <div class="col-span-1 flex items-center justify-center">
                        @if($duty->priority_id ==1)    
                        <p class="mx-auto h-4 w-4 bg-gray-900 rounded-full   d-block"></p> 
                        @elseif($duty->priority_id ==2)
                        <p class="mx-auto h-4 w-4 bg-gray-400 rounded-full   d-block"></p>
                        @elseif($duty->priority_id ==3)
                        <p class="mx-auto h-4 w-4 bg-gray-200 rounded-full   d-block"></p>
                        @elseif($duty->priority_id == 4)
                        <p class="mx-auto h-4 w-4 bg-gray-100 rounded-full   d-block"></p>
                        @endif
                </div>
        </div>  
            <x-jet-section-border/>
         @endforeach
        {{$thependingduties->links()}}
    </div>

    <div class="col-span-6 md:col-span-2 p-3 md:p-6">
        <p class="text-sm md:text-lg font-extrabold text-green-600 uppercase tracking-wider p-2">completed Tasks</p>
        @foreach($thedoneduties as $duty)
        <div class="grid grid-cols-6 p-2 md:p-4">
                <div class="col-span-5">
                    <p class="text-sm md:text-lg font-semibold text-green-600 tracking-wide">{{$duty->name}}<p>
                    <p class="text-sm md:text-base font-light text-green-400 leading-normal">{{$duty->description}}</p>
                    <p class="text-xs text-purple-600">Due .. {{$duty->deadline->diffForHumans()}}</p>
                </div>
                <div class="col-span-1 flex items-center justify-center">
                        @if($duty->priority_id ==1)    
                        <p class="mx-auto h-4 w-4 bg-gray-900 rounded-full   d-block"></p> 
                        @elseif($duty->priority_id ==2)
                        <p class="mx-auto h-4 w-4 bg-gray-400 rounded-full   d-block"></p>
                        @elseif($duty->priority_id ==3)
                        <p class="mx-auto h-4 w-4 bg-gray-200 rounded-full   d-block"></p>
                        @elseif($duty->priority_id == 4)
                        <p class="mx-auto h-4 w-4 bg-gray-100 rounded-full   d-block"></p>
                        @endif
                </div>
        </div>  
            <x-jet-section-border/>
            @endforeach
        {{$thedoneduties->links()}}
    </div>
  
    <div class="col-span-6 md:col-span-2 p-3 md:p-6">
        <p class="text-sm md:text-lg font-extrabold text-gray-600 uppercase tracking-wider p-2">Unattempted Tasks</p>
            @foreach($dutieswithoutstatus as $duty)
            <div class="grid grid-cols-6 p-2 md:p-4">
                <div class="col-span-5">
                    <p class="text-sm md:text-lg font-semibold text-gray-600 tracking-wide">{{$duty->name}}<p>
                    <p class="text-sm md:text-base font-light text-gray-400 leading-normal">{{$duty->description}}</p>
                    <p class="text-xs text-purple-600">Due .. {{$duty->deadline->diffForHumans()}}</p>
                </div>
                <div class="col-span-1 flex items-center justify-center">
                        @if($duty->priority_id ==1)    
                        <p class="mx-auto h-4 w-4 bg-gray-900 rounded-full   d-block"></p> 
                        @elseif($duty->priority_id ==2)
                        <p class="mx-auto h-4 w-4 bg-gray-400 rounded-full   d-block"></p>
                        @elseif($duty->priority_id ==3)
                        <p class="mx-auto h-4 w-4 bg-gray-200 rounded-full   d-block"></p>
                        @elseif($duty->priority_id == 4)
                        <p class="mx-auto h-4 w-4 bg-gray-100 rounded-full   d-block"></p>
                        @endif
                </div>
            </div>  
            <x-jet-section-border/>
            @endforeach
        {{$dutieswithoutstatus->links()}}
    </div>
</div>
