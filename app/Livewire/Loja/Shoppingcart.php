<?php

namespace App\Livewire\Loja;

use Livewire\Component;
use App\Models\company;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Shoppingcart extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $number = 0, $localizacao, $cartContent, $getTotal, $getSubTotal,
    $getTotalQuantity, $location, $cupon, $taxapb = 0, $finalCompra,
    $totalFinal = 0, $code, $delveryId;

    //propriedades de checkout
    public $name, $lastname, $province, $municipality, $street, $phone, $otherPhone,
    $email, $deliveryPrice =0, $paymentType ="Trasnferencia",  $taxPayer,$receipt,$otherAddress;
    public $company;

    protected $listeners = ["updateQuantity"];

    public function mount()
    {
        $this->cartContent = CartFacade::getContent();
        $this->getTotal = CartFacade::getTotal();
        $this->getSubTotal = CartFacade::getSubTotal();
        $this->getTotalQuantity = CartFacade::getTotalQuantity();
        $this->finalCompra = $this->getSubTotal + $this->localizacao;
        $this->taxapb = ($this->finalCompra * 14) / 100;
        $this->totalFinal = $this->finalCompra + $this->taxapb;
    }

    public function render()
    {
        return view('livewire.loja.shoppingcart');
    }

    public function getHeaders()
    {
        return[
            "Accept" => "application/json",
            "Content-Type" => "application/json",
            "Authorization" => $this->getCompany()->companytokenapi,
        ];
    }

    public function getCompany()
    {
        return company::where("companyhashtoken", session("companyhashtoken"))->first();
    }

    //logica para aplicar cupon de desconto
    public function cuponDiscount()
    {   
        //Acesso a API com um token        
        $response = Http::withHeaders($this->getHeaders())
        ->post("https://kytutes.com/api/cupons",[
            "code"=>$this->code,
            "total"=>$this->totalFinal,
        ]);
        $cupon = collect(json_decode($response));
          
        if (isset($cupon['discount'])) {
            session()->put('discountvalue',$cupon['discount']);
            $this->code = "";
        }
    }
    
    public function checkout($company)
    {
        try {
                //manipulacao de arquivo;
                $filaName = null;
                if ($this->receipt != null and !is_string($this->receipt)) {
                    $filaName = md5($this->receipt->getClientOriginalName())
                                .".".$this->receipt->getClientOriginalExtension();
                    $this->receipt->storeAs("public/recibos",$filaName);
                }
        
                //Acesso a API com um token
                $items = [];
                if (count(CartFacade::getContent()) > 0) {
                    foreach(CartFacade::getContent() as $key => $item) {
                    array_push($items,[
                            "name"=>$item->name,
                            "price"=>$item->price,
                            "quantity"=>$item->quantity,
                    ]);
                    }
                }
        
                $data = [
                    "clientName" => $this->name,
                    "clientLastName" => $this->lastname,
                    "province" => $this->province,
                    "municipality" => $this->municipality,
                    "street" => $this->street,
                    "cupon" => "",
                    "deliveryPrice" => 0,
                    "phone" => $this->phone,
                    "otherPhone" => $this->otherPhone,
                    "email" => $this->email,
                    "taxPayer" => $this->taxPayer,
                    "receipt" => $filaName,
                    "paymentType" => $this->paymentType,
                    "items" => $items,
                ];
        
                //Chamada a API
                $response = Http::withHeaders($this->getHeaders())
                ->post("https://kytutes.com/api/deliveries",$data);

                $result  = collect(json_decode($response, true));

                if ($result) {
                    session()->put("idDelivery", $result['reference']);
                    session()->put("companyapi", $this->getCompany()->companyhashtoken);
                }

                $this->alert('success', 'SUCESSO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => false,
                    'confirmButtonText' => 'OK',
                    'text'=>'Encomenda Finalizada'
                ]);
            
                return redirect()->route("site.delivery.status",[
                    $result['reference']
                ]);
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação '. $th->getMessage()
            ]);
        }
    }

    public function remove($id)
    {
        try {
            $itenDelete = CartFacade::remove($id);
            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'timer' => '1500',
                'text'=>'Item Eliminado'
            ]);
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateQuantity($id, $quantity)
    {
        CartFacade::update($id, [
            'quantity' => 1,
        ]);
    }
}