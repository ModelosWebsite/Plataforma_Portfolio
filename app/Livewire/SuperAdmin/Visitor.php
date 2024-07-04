<?php

namespace App\Livewire\SuperAdmin;

use App\Models\visitor as ModelsVisitor;
use Livewire\Component;

class Visitor extends Component
{
    public $visitors;

    public function mount()
    {
        $this->visitors = ModelsVisitor::get();
    }

    public function render()
    {
        return view('livewire.super-admin.visitor');
    }
}
