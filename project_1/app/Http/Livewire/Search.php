<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Clients;

class Search extends Component
{
    public $searchTerm;
    public $clients;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->clients = Clients::where('first_name' ,'like', $searchTerm)->orWhere('last_name' ,'like', $searchTerm)->get();
        return view('livewire.search.search');
    }
}
