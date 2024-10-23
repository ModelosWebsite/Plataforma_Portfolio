<?php

namespace App\Livewire\Config;

use App\Models\Skill;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Componente extends Component
{
    public $selectedComponentId = null;
    public $elements, $getComponents;
    public $level;
    use LivewireAlert;

    public function mount()
    {
        $this->getComponents = Skill::where("company_id", auth()->user()->company_id);
    }

    public function storeOrUpdateComponent()
    {
        if ($this->selectedComponentId) {
            // Atualiza o componente existente
            $component = Skill::find($this->selectedComponentId);
            $component->update([
                'elements' => $this->elements,
                'level' => $this->level,
            ]);
        } else {
            // Cria um novo componente
            Skill::create([
                'elements' => $this->elements,
                'level' => $this->level,
                'company_id' => auth()->user()->company_id,
            ]);
        }

        // Limpa os campos e o ID do componente selecionado
        $this->reset(['selectedComponentId', 'elements', 'level']);
    }

    public function editComponent($id)
    {
        $component = Skill::find($id);
        $this->selectedComponentId = $component->id;
        $this->elements = $component->elements;
        $this->level = $component->level;
    }

    public function render()
    {
        return view('livewire.config.componente', $this->getComponents = Skill::where("company_id", auth()->user()->company_id)->get());
    }
}