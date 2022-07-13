<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Carbon\Carbon;

use App\Models\{
    Project,
    Task,
    Employee
};

class Main extends Component
{
    public $select = 1;

    public function render(){

        $year = date('Y');
        $month = date('m');

        $employees_count = Employee::count();

        $projects = Project::whereYear('change_at' , $year);
        $tasks = Task::whereYear('change_at' , $year);

        if($this->select == 2) {
            $projects = $projects->whereMonth('change_at' , $month);
            $tasks = $tasks->whereMonth('change_at' , $month);
        }
        if($this->select == 3) {
            $from = now()->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
            $to = now()->endOfWeek(Carbon::SATURDAY)->format('Y-m-d');

            $projects = $projects->whereBetween('change_at' , [$from, $to]);
            $tasks = $tasks->whereBetween('change_at' , [$from, $to]);
        }
        if($this->select == 4) {
            $projects = $projects->where('change_at' , date('Y-m-d'));
            $tasks = $tasks->where('change_at' , date('Y-m-d'));
        }

        $projects = $projects->get(['id' , 'title' , 'done']);
        $tasks = $tasks->get(['id' , 'state']);

        $projects_done_count = $projects->where('done' , true)->count();
        $projects_not_done_count = $projects->where('done' , false)->count();

        $tasks_done_count = $tasks->where('state' , 3)->count();
        $tasks_in_progress_count = $tasks->whereIn('state' , [1,2])->count();



        return view('livewire.home.main' , [
            'employees_count' => $employees_count,
            'tasks_done_count' => $tasks_done_count,
            'tasks_in_progress_count' => $tasks_in_progress_count,
            'projects' => [],
            'projects_done_count' => $projects_done_count,
            'projects_not_done_count' => $projects_not_done_count,
        ]);
    }
}
