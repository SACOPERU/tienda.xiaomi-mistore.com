<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class StatusProduct extends Component
{

    public $product , $status , $destacado;

    public  function mount(){

        $this->status = $this->product->status;

        $this->destacado = $this->product->destacado;

    }

    public function save(){

        $this->product->status = $this->status;
        $this->product->destacado = $this->destacado;

        $this->product->save();

        $this->emit('saved');

    }

    public function render()
    {
        return view('livewire.admin.status-product');
    }
}
