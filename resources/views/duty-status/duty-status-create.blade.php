<div class="overflow-x-auto sm:mx-auto">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <table>
            <thead class="w-full text-sm text-left text-gray-500">
                <tr>
                    <th  class="py-3 px-6">Task Name</th>
                    <th  class="py-3 px-6">Priority Level</th>
                    <th  class="py-3 px-6">Due</th>
                    <th class="py-3 px-3">Progress</th>
                    <th class="py-3 px-6">Check </th>
                    <th class="py-3 px-6">Update </th>
                </tr>
                
            </thead>
            <tbody>
            @foreach($theduties as $duty)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 w-full">
                        <td class="py-4 px-6 text-sm">{{$duty->name}}</td>
                        @if($duty->priority_id == 1)
                            <td>
                                <p class="mx-auto h-4 w-4 bg-gray-900 rounded-full"></p>
                            </td>
                        @elseif($duty->priority_id ==2)
                            <td>
                                <p class="mx-auto h-4 w-4 bg-gray-400 rounded-full"></p>
                            </td>
                        @elseif($duty->priority_id ==3)
                            <td>
                            <p class="mx-auto h-4 w-4 bg-gray-200 rounded-full"></p>
                            </td>
                        @elseif($duty->priority_id == 4)
                            <td>
                            <p class="mx-auto h-4 w-4 bg-gray-100 rounded-full"></p>
                            </td>
                        @endif
                        
                        <td class="py-4 px-6 text-sm text-gray-600">{{$duty->deadline->diffForHumans()}}</td>
                        <td  class="py-4 px-6 whitespace-nowrap ">
                            <div class="flex">
                                <x-jet-label for="status" value="status" /> 
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-4" viewBox="0 0 20 20" fill="purple-200">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="ml-4 text-sm font-medium text-gray-500">{{isset($duty->status->level)? str_replace($duty->id, "", $duty->status->level):'not chosen..'}}</div>
                                    </div> 
                            </div>
                        </td>
                            <form  wire:submit.prevent="createDutyStatus({{$duty->id}})" >   
                                <td class="px-6 py-3 mx-10">
                                    @if (count($this->statuses) > 0)
                                                    <div class="flex items-center"> 
                                                    <x-jet-input-error for="status" class="mt-2" />
                                                    <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                                                        @foreach ($this->statuses as $index => $status)
                                                            <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 {{ $index > 0 ? 'border-t border-gray-200 rounded-t-none' : '' }} {{ ! $loop->last ? 'rounded-b-none' : '' }}"
                                                                            wire:click="$set('createDutyStatus.selectedStatus', '{{ $duty->id.$status}}')">
                                                                <div class="{{ isset($createDutyStatus['selectedStatus']) && $createDutyStatus['selectedStatus'] !== $duty->id.$status? 'opacity-50' : '' }}">
                                                                    
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
                                            @endif
                            </td>
                            <td>
                                <x-jet-action-message class="mr-3" on="{{$duty->id}}">
                                                Updated
                                </x-jet-action-message>
                                <x-jet-button class="bg-purple-900 p-5 hover:bg-purple-700 active:bg-gray-900 focus:border-purple-900 focus:ring-purple-300">
                                    update
                                </x-jet-button>
                            </td>
                        </form>
            </tr>
            @endforeach
            </tbody>
        </table>
        <x-jet-section-border />
        {{ $theduties->links() }}
    </div>
</div>


 
