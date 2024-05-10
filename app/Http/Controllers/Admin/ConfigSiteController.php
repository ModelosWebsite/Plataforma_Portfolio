<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\Termo;
use Illuminate\Http\Request;

class ConfigSiteController extends Controller
{
    //open the page view config
    public function configView(){
        $company_id = auth()->user()->company_id;
        $termos = Termo::where("company_id", isset($company_id) ? $company_id : "")->first();
        $statusSite = company::where("id", $company_id)->first();
        return view("site.Config", compact("statusSite", "termos"));
    }

    public function updateStatus(Request $request)
    {
        $company_id = auth()->user()->company_id;
        $item = company::find($company_id);
        
        // Atualiza o estado baseado no valor do checkbox
        $item->status = $request->input('status') ? 'active' : 'inactive';
        $item->save();
        
        return redirect()->back()->with('success', 'Estado atualizado com sucesso!');
    }
}