<?php

namespace App\Livewire\Definition;

use App\Models\{company, Termpb, Termpb_has_Company, TermsCompany};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Adjust extends Component
{
    public $terms,$termPbs, $statusTermo, $statusSite, $privacity, $term, $config, $company; 
    use LivewireAlert;
    
    public function mount()
    {
        $this->statusSite = Company::find(auth()->user()->company_id)->status;
        $this->termPbs = Termpb::first(); // Supondo que você tem apenas um registro de Termo PB
        $this->statusTermo = isset($this->termPbs) && $this->termPbs->status === 'active';
    }

    public function toggleSiteStatus()
    {
       try {
            $company = Company::find(auth()->user()->company_id);
            $company->status = $this->statusSite === 'active' ? 'inactive' : 'active';
            $company->save();

            $this->statusSite = $company->status;

            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Estado Actualizado'. " " . $this->statusSite
            ]);

       } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text' => 'Falha na operação'
            ]);
       }
    }

    public function toggleTermStatus()
    {
        if ($this->statusTermo) {
            Termpb_has_Company::where('company_id', auth()->user()->company_id)->delete();
            $this->statusTermo = false;
            session()->flash('success', 'Termos não aceitos.');
        } else {
            Termpb_has_Company::create([
                'company_id' => auth()->user()->company_id,
                'termpb_id' => $this->termPbs->id,
            ]);
            $this->statusTermo = true;
        }
    }

    public function conditionsCreate()
    {
        $this->validate([
            'privacity' => 'required',
            'term' => 'required',
        ]);

        TermsCompany::create([
            'privacity' => $this->privacity,
            'term' => $this->term,
            'company_id' => auth()->user()->company_id,
        ]);

        session()->flash('success', 'Termo Criado');
        $this->reset(['privacity', 'term']);
    }

    public function render()
    {
        return view('livewire.definition.adjust');
    }
}
