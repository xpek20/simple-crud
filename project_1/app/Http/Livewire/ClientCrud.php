<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Clients;
use Illuminate\Http\Request;


class ClientCrud extends Component
{
    public $clients, $first_name, $last_name, $email, $mobile, $client_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->clients = Clients::all();
        return view('livewire.client.client-crud');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->mobile = '';
    }
    
    public function store()
    {
        $this->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
    
        Clients::updateOrCreate(['id' => $this->client_id], [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ]);

        session()->flash('message', $this->id ? 'Client has been updated' : 'A Client has been created');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $clients = Clients::findOrFail($id);
        $this->client_id = $id;
        $this->first_name = $clients->first_name;
        $this->last_name = $clients->last_name;
        $this->email = $clients->email;
        $this->mobile = $clients->mobile;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Clients::find($id)->delete();
        session()->flash('message', 'Client has been deleted.');
    }

    public function searchClient(Request $request)
   {
      $clientsS = Clients::all();
      if($request->keyword != ''){
      $clientsS = Clients::where('name','LIKE','%'.$request->keyword.'%')->get();
      }
      return response()->json([
         'clients' => $clientsS
      ]);
    }
}
