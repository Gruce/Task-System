<div class="p-8 bg-white rounded-lg">
    <form wire:submit.prevent="add">
        <div class="flex gap-10">
            <div class="flex flex-col gap-4 basis-3/4">
                <label class="block mb-2 text-sm font-medium text-gray-500">
                    {{ __('ui.basicinfo') }}
                </label>
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.title') }}
                        </label>
                        <input wire:model.defer="task.title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.title') }} required>
                    </div>
                    <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            {{ __('ui.choose_project') }}</label>
                        </label>
                        {{-- <select id="countries" wire:model.defer="task.project_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="">{{ __('ui.choose_project') }}</option>
                            @forelse( $projects as $item )
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @empty
                            <option value="id">{{ __('ui.no_projects') }}</option>
                            @endforelse
                        </select> --}}
                        <div class="flex w-full gap-2">
                            <input wire:model="search" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.project_title')}}" required>
                            @if ($search)
                                <select wire:model="task.project_id" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="" selected>{{__('ui.select_project')}}</option>
                                    @foreach ($projects as $project)
                                        <option value="{{$project->id}}">{{$project->title}}</option>
                                    @endforeach
                                </select>
                                <button wire:click="add" @click="add=!add" class="px-4 py-1 duration-150 ease-in-out delay-75 border rounded-lg hover:text-success-800 hover:bg-success-100">
                                    <i class="fas fa-check"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                    {{-- <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.start_date') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker="" wire:model.defer="start_at" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date">
                        </div>
                    </div> --}}
                    {{-- <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.end_date') }}
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker="" wire:model.defer="end_at" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date">
                        </div>
                    </div> --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.start_date') }}
                        </label>
                        <input wire:model.defer="task.start_at" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.end_date') }}
                        </label>
                        <input wire:model.defer="task.end_at" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date">
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                        {{ __('ui.description') }}
                    </label>
                    <textarea wire:model.defer="task.description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.project_description') }}></textarea>

                </div>

                <div class="grid xl:grid-cols-2 xl:gap-6">
                    {{-- <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            {{ __('ui.assign_task') }}</label>
                        </label>
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="">Choose a country</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div> --}}
                    <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            {{ __('ui.importance') }}</label>
                        </label>
                        <select id="countries" wire:model.defer="task.importance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="">{{ __('ui.importance') }}</option>
                            <option value="1">{{ __('ui.importance_low') }}</option>
                            <option value="2">{{ __('ui.importance_medium') }}</option>
                            <option value="3">{{ __('ui.importance_high') }}</option>
                        </select>
                    </div>

                    <div  class="flex flex-col">
                        <div class="flex flex-col w-full gap-2 overflow-y-auto text-sm">
                            <div class="flex justify-between w-full px-4 py-2 rounded-lg text-secondary-500">
                                <div class="flex w-full gap-2">
                                    <input wire:model="search" type="text" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="{{__('ui.name')}}" required>
                                    @if ($search)
                                        <select wire:model="userId" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                            <option value="" selected>{{__('ui.select_employee')}}</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                                            @endforeach
                                        </select>
                                        <button wire:click="add" @click="add=!add" class="px-4 py-1 duration-150 ease-in-out delay-75 border rounded-lg hover:text-success-800 hover:bg-success-100">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>

                            {{-- Loop Item Below --}}
                            @forelse ($task_employees as $employee)
                            <div class="flex justify-between w-full px-4 py-2 rounded-lg hover:bg-secondary-50 text-secondary-500">
                                <div class="flex items-center gap-4">
                                    <img class="w-10 h-10 rounded-lg" src="{{$employee->photo}}" alt="Bordered avatar">
                                    <div class="flex flex-col">
                                        <span class="text-base font-normal text-secondary-700">
                                            {{$employee->name}}
                                        </span>
                                        <span class="text-xs font-normal text-secondary-400">
                                            {{-- {{$employee->pivot->created_at->diffForHumans()}} --}}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button wire:click="confirmed({{ $employee->id }} , 'delete')" class="px-4 py-1 duration-150 ease-in-out delay-75 rounded-lg hover:text-error-600 hover:bg-error-100">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            @empty
                                {{__('ui.no_data')}}
                            @endforelse
                        </div>
                    </div>

                    {{-- <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            {{ __('ui.estimated_time') }}
                        </label>
                        <input wire:model.defer="" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder={{ __('ui.estimated_time') }} required>
                    </div>
                    <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            {{ __('ui.estimated_time_unit') }}</label>
                        </label>
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="">{{__('ui.choose_estimated_time')}}</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div> --}}
                </div>

                <button type="submit" class="text-white hover:bg-blue-700 bg-blue-600 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    {{ __('ui.add') }}
                </button>
            </div>

            {{-- Attachments --}}
            <div class="flex flex-col gap-4 basis-1/4">
                {{-- Label --}}
                <label class="flex items-center justify-between mb-2 text-sm font-medium text-gray-500">
                    <span>{{ __('ui.addattachments') }}</span>
                    @if (count($files) > 0)
                    <span class="text-xs text-secondary-400">{{ __('ui.file_count') }}: {{ count($files) }}
                    </span>
                    @endif
                </label>

                {{-- Input --}}
                <div class="relative flex items-center justify-center h-48 border-2 border-dotted rounded-lg bg-secondary-50 border-secondary-300">
                    <div class="absolute">
                        <div class="flex flex-col items-center cursor-pointer">
                            <div wire:loading wire:target="files">
                                <i class="mb-3 fas fa-spinner fa-spin fa-3x text-secondary-600"></i>
                            </div>
                            <div wire:loading.remove wire:target="files">
                                <i class="ri-upload-line ri-3x text-secondary-600"></i>
                            </div>
                            <span class="block font-normal text-secondary-600">{{ __('ui.upload_files') }}</span>
                        </div>
                    </div>
                    <input wire:model="files" type="file" class="w-full h-full opacity-0 cursor-pointer" name="" multiple>
                </div>

                {{-- Preview --}}
                <div class="flex flex-col gap-2">
                    @foreach ($files as $key => $file)
                    <div class="flex items-center justify-between px-4 py-2 rounded-lg bg-secondary-50 text-secondary-500">
                        <span>{{ __('ui.file') . ' ' . ($key + 1) }}</span>
                        <button wire:click="removeFile({{ $key }})" type="button" class="focus:outline-none text-error-600 hover:bg-error-100 focus:ring-4 focus:ring-error-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </form>

</div>
