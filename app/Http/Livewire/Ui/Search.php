<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;

class Search extends Component
{
    protected $queryString = ['search'];

    public $search;

    public function render(){
        $this->emit('search', $this->search);
        return view('livewire.ui.search');
    }
}
