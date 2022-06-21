<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;

class Show extends Component
{
    protected $listeners = ['$refresh'];

    public function mount($id){
        $this->project = Project::with(['tasks' , 'files'])->withCount(['tasks' , 'files'])->findOrFail($id);
        debug($this->project->toArray());
    }

    public function render()
    {
        return view('livewire.project.show');
    }
}
