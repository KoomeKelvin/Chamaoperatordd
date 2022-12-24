<x-jet-form-section submit="createDuties" class="md:grid md:grid-cols-3 md:gap-6">
    <x-slot name="title">
        Create Task 
    </x-slot>

    <x-slot name="description">
        Create task to be done
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="What's the task" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="dutyFields.name" autofocus />
            <x-jet-input-error for="dutyFields.name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="description" value="Details of the task " />
            <x-text-area id="description" rows="3" class="mt-1 block w-full" wire:model.defer="dutyFields.description" autofocus />
            <x-jet-input-error for="dutyFields.description" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="deadline" value="To be done by.." />
            <x-date-picker id="deadline" class="mt-1 block w-full focus:indigo-300"  wire:model.lazy="dutyFields.deadline" placeholder="when is the deadline?"/>
            <x-jet-input-error for="dutyFields.deadline" class="mt-2" />
        </div> 
           @if (count($priorities))
                        <div class="col-span-6 lg:col-span-4">
                            <x-jet-label for="priority" value="Priority" />
                            <x-jet-input-error for="dutyFields.chosenPriority" class="mt-2" />

                            <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                                @foreach ($this->priorities as  $priority)
                                    <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 {{ $priority->id > 0 ? 'border-t border-gray-200 rounded-t-none' : '' }} {{ ! $loop->last ? 'rounded-b-none' : '' }}"
                                                    wire:click="$set('dutyFields.chosenPriority', '{{ $priority->id}}')">
                                        <div class="{{ isset($dutyFields['chosenPriority']) && $dutyFields['chosenPriority'] !== $priority->id ? 'opacity-50' : '' }}">
                                            <!-- Priority Name -->
                                            <div class="flex items-center">
                                                <div class="text-sm text-gray-600 {{ $dutyFields['chosenPriority'] == $priority->id ? 'font-semibold' : '' }}">
                                                    P{{ $priority->id}}
                                                </div>

                                                @if ($dutyFields['chosenPriority'] == $priority->id)
                                                    <svg class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                @endif
                                            </div>

                                            <!-- Priority Description -->
                                            <div class="mt-2 text-xs text-gray-600 text-left">
                                                {{ $priority->description }}
                                            </div>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif
    </x-slot>
 
     <x-slot name="actions">
      <x-jet-action-message class="mr-3" on="created">
                      Created
      </x-jet-action-message>
        <x-jet-button>
            {{ __('Create') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>


