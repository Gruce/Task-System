<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;



class Main extends Component
{

    protected $listeners = ['updatedSelectedTab'];
    public function updatedSelectedTab($value){ $this->selectedTab = $value; }

    public function mount(){
        $this->tabs = [__('ui.tasks'), __('ui.incomplete')];
        $this->selectedTab = 0;}

    public function render()
    {

        $tasks = Task::get();
        //dd($tasks->toArray());

        return view('livewire.task.main', compact('tasks'));
    }
}
