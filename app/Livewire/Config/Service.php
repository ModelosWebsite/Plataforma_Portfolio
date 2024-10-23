<?php

namespace App\Livewire\Config;

use App\Models\Service as ModelsService;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Service extends Component
{
    public $getService, $title, $description, $serviceId;
    public $editMode = false;
    use LivewireAlert;

    public function mount()
    {
        $this->getService = ModelsService::all(); // Carrega os serviços do banco
    }

    public function storeService()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        ModelsService::create([
            'title' => $this->title,
            'description' => $this->description,
            "company_id" => auth()->user()->company_id,
        ]);

        $this->resetFields();
        $this->mount(); // Atualiza a lista de serviços
        
        $this->alert('success', 
        'CADASTRADO', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => false,
            'confirmButtonText' => 'OK',
        ]);
    }

    public function editService($id)
    {
        $service = ModelsService::findOrFail($id);
        $this->serviceId = $service->id;
        $this->title = $service->title;
        $this->description = $service->description;
        $this->editMode = true;
    }

    public function updateService()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $service = ModelsService::findOrFail($this->serviceId);
        $service->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->resetFields();
        $this->mount(); // Atualiza a lista de serviços
        $this->editMode = false;
    }

    public function deleteService($id)
    {
        ModelsService::destroy($id);
        $this->mount(); // Atualiza a lista de serviços
    }

    public function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->editMode = false;
    }

    public function render()
    {
        return view('livewire.config.service');
    }
}
