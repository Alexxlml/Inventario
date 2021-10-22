<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Reportes extends Component
{
    public $bandera = 1;
    public function render()
    {
        return view('livewire.reportes');
    }

    public function elegirForm($id){
        if($id == 1){
            $this->bandera = 1;
        }else{
            $this->bandera = 0;
        }
    }
}
