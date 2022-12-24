<div>
@foreach($theduties as $duty)
<x-jet-form-section submit="createDutyStatus({{$duty->id}})" class="md:grid md:grid-cols-3 md:gap-6">
    <x-slot name="title">
        {{'Priority '.$duty->priority_id}}
    </x-slot>

    <x-slot name="description">
        {{'Due on '.$duty->deadline}}
    </x-slot>
    <x-slot name="form">
    <div class="col-span-6">
        <div class="flex justify-between">
            <div>
                <div class="text-lg font-medium">{{$duty->name}}  </div> 
            </div>
            <div>
            @if($duty->priority_id==1 && (($duty->status->level??'')== $duty->id."pending"))
            <div class="flex">
             @for($count=0; $count<4; $count++)
                <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5 mx-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            @endfor
            </div>
            @elseif($duty->priority_id==2 && (($duty->status->level??'')== $duty->id."pending"))
            <div class="flex">
                @for($count=0; $count<3; $count++)
                <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5 mx-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
                @endfor
            </div>
            @elseif($duty->priority_id==3 && (($duty->status->level??'')== $duty->id."pending"))
            <div class="flex">
                @for($count=0; $count<2; $count++)
                <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5 mx-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
                @endfor
            </div>
            @else
            @if($duty->priority_id==4 && (($duty->status->level??'')== $duty->id."pending"))
                <svg xmlns="http://www.w3.org/2000/svg"  class="h-5 w-5 mx-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            @endif
            @endif
            </div>
        </div>
        <div class="text-sm font-medium text-gray-600">{{$duty->description}}</div>
         </div>
         <div class="col-span-4">
               @if (count($this->statuses) > 0)
                        <div class="col-span-6 lg:col-span-4">
                            <div class="flex items-center">
                            <x-jet-label for="status" value="status" /> 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-4" viewBox="0 0 20 20" fill="purple-200">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                            <div class="ml-4 text-sm font-medium text-gray-500">{{isset($duty->status->level)? str_replace($duty->id, "", $duty->status->level):'not chosen..'}}</div>
                            </div> 
                            <x-jet-input-error for="status" class="mt-2" />
                            <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                                @foreach ($this->statuses as $index => $status)
                                    <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 {{ $index > 0 ? 'border-t border-gray-200 rounded-t-none' : '' }} {{ ! $loop->last ? 'rounded-b-none' : '' }}"
                                                    wire:click="$set('createDutyStatus.selectedStatus', '{{ $duty->id.$status}}')">
                                        <div class="{{ isset($createDutyStatus['selectedStatus']) && $createDutyStatus['selectedStatus'] !== $duty->id.$status? 'opacity-50' : '' }}">
                                            <!-- Role Name -->
                                            <div class="flex items-center">
                                                <div class="text-sm text-gray-600 {['selectedStatus'] == $status ? 'font-semibold' : '' }}">
                                                    {{ $status }}
                                                </div>

                                                @if ($createDutyStatus['selectedStatus'] == $duty->id.$status)
                                                    <svg class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                @endif
                                            </div>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
    </x-slot>
     <x-slot name="actions">
      <x-jet-action-message class="mr-3" on="{{$duty->id}}">
                      Updated
      </x-jet-action-message>
        <x-jet-button>
            update
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
<x-jet-section-border />
 @endforeach
 
 {{ $theduties->links() }}
 </div>