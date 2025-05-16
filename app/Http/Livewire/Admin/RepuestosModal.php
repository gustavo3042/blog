<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class RepuestosModal extends Component
{

   
    public $repuestos = [];

    protected $listeners = ['openModal' => 'open', 'closeModal' => 'close'];
    
    public $isOpen = false;

    public function open()
    {
        $this->isOpen = true;
    }

    
    public function close()
    {
        $this->isOpen = false;
    }

    public function addRepuesto()
    {
        $this->repuestos[] = ['nombrerepuesto' => '', 'preciorepuesto' => '', 'cantidadrepuesto' => ''];
    }

    public function removeRepuesto($index)
    {
        unset($this->repuestos[$index]);
        $this->repuestos = array_values($this->repuestos);
    }

    public function render()
    {
    
        return view('livewire.admin.repuestos-modal');
    }
}
