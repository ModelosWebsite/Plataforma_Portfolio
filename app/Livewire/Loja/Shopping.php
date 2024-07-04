<?php

namespace App\Livewire\Loja;

use App\Models\company;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;

class Shopping extends Component
{
    public $company, $category, $itemid;
    use LivewireAlert;

    public function mount()
    {
        $this->company = company::where("companyhashtoken", session("companyhashtoken"))->first();
    }

    public function render()
    {
        return view('livewire.loja.shopping', [
            "categories" => $this->getCategories(),
            "getCollectionsItens" => $this->getItems($this->category),
        ]);
    }

    public function getHeaders()
    {
        return [
            "Accept" => "application/json",
            "Content-Type" => "application/json",
            "Authorization" => "{$this->company->companytokenapi}",
        ];
    }

    //Pegar todas as categorias 
    public function getCategories()
    {
        try {
            //Chamada a API
            $response = Http::withHeaders($this->getHeaders())
            ->get("https://kytutes.com/api/categories");
    
            return collect(json_decode($response, true));
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }
    
    //Pegar os Itens pertencentes a categoria selecionada
    public function getItems($category)
    {
        try {
            if ($category) {
                $this->category = $category;
                //Chamada a API
                $response = Http::withHeaders($this->getHeaders())
                ->get("https://kytutes.com/api/items?category=$category");   
                return collect(json_decode($response,true));
            }else{
                $this->category = $category;
                
                $response = Http::withHeaders($this->getHeaders())
                ->get("https://kytutes.com/api/items");
                return collect(json_decode($response,true));   
            }
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    //adicionar no carrinho
    public function addToCart($itemid)
    {
        try {
            $getItemCart = Http::withHeaders($this->getHeaders())
            ->get("https://kytutes.com/api/items?description=$itemid");

            $product = Collect(json_decode($getItemCart,true));

            Cart::add(array(
                'id' => $product[0]["reference"],
                'name' => $product[0]["name"],
                'price' => $product[0]["price"],
                'quantity' => 1,
            ));

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'timer' => '1500',
                'text'=>'Item '.$product[0]["name"].', adicionado'
            ]);
            return;
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }
}