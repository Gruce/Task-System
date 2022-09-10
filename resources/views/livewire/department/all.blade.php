<div>
    <div :class=" gridDepartment ? 'grid gap-8 lg:grid-cols-1':'grid gap-8 lg:grid-cols-3'" class=" sm:grid-cols-1">
        @forelse ($departments as $department )
        @livewire('department.card' , ['department'=> $department] , key($department->id . "-" . now()))
        @empty
        <div class="flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-lg text-center text-gray-500">{{ __('ui.no_data') }}</h1>
            </div>
        </div>
        @endforelse
    </div>
</div>
