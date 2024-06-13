<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\GenerateImage;
use App\Models\pacote;
use Illuminate\Http\Request;

class GenerateImageController extends Controller
{
    public function index()
    {
        $categoryPacote = pacote::get();
        $packgeImages = GenerateImage::get();
        return view("superadmin.generate.app", compact("categoryPacote", "packgeImages"));
    }

    public function packgeSave(Request $request)
    {
        try {

            $packge = new GenerateImage();
            $packge->packgename = $request->name;
            $packge->packgeprice = $request->price;
            $packge->packgedescription = $request->description;
            $packge->packgeqtd = $request->qtd;
            $packge->pacote_id = $request->pacote_id;

            $packge->save();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}