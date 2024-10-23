<?php

namespace App\Livewire\Config;

use App\Models\contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Footer extends Component
{
    public $getfooter, $telefone, $endereco, $email, $atendimento;

    use LivewireAlert;

    public function render()
    {
        return view('livewire.config.footer', $this->getfooter = contact::where("company_id", auth()->user()->company->id)->get());
    }

    public function storefooter()
    {
        try {            
            $data = new contact();

            $data->telefone = $this->telefone;
            $data->endereco = $this->endereco;
            $data->email = $this->email;
            $data->atendimento = $this->atendimento;
            $data->company_id = auth()->user()->company->id;

            $data->save();

            $this->clearform();

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text'=>'Informações Inseridas'
            ]);

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => false,
                'confirmButtonText' => 'OK',
                'text'=>'Falha na Operação'
            ]);
        }   
    }

    public function clearform()
    {
        $this->telefone = "";
        $this->endereco = "";
        $this->email = "";
        $this->atendimento = "";
    }

    // public function actualizarContact(Request $request, $id)
    // {
    //     contact::where(["id" => $id])->update([
    //         "telefone" => $request->telefone,
    //         "endereco" => $request->endereco,
    //         "atendimento" => $request->atendimento,
    //         "email" => $request->email,
    //         "id" => $request->id,
    //     ]);
    //     return redirect()->back()->with("success", "Footer actualizado");
    // }
}
