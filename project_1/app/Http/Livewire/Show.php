<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Payments;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Faker\Provider\ar_EG\Payment;

class Show extends Component
{
    public $payments, $name, $description, $price, $client_id , $payment_id, $clients;
    public $isModalOpen = 0;

    public function render(Request $request)
    {
        $this->payments =  Payments::where('client_id', $request->route('id'))->get();
        
        $clients = Clients::all();
        return view('livewire.payment.payment-crud',['cr'=>$clients]);
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
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->client_id = '';
    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required|alpha',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);
    
        Payments::updateOrCreate(['id' => $this->payment_id], [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'client_id' => $this->client_id,
        ]);

        session()->flash('message', $this->id ? 'Payment has been updated' : 'A Payment has been created');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $payments = Payments::findOrFail($id);
        $this->payment_id = $id;
        $this->name = $payments->name;
        $this->description = $payments->description;
        $this->price = $payments->price;
        $this->client_id = $payments->client_id;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Payments::find($id)->delete();
        session()->flash('message', 'Client has been deleted.');
    }

    public function show(Request $request, int $id){
        $payments =  Payments::find($id);
        

    }
}
