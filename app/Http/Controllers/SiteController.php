<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\About;
use App\Models\Color;
use App\Models\company as ModelsCompany;
use App\Models\contact;
use App\Models\Fundo;
use App\Models\hero;
use App\Models\pacote;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    //
    public function index($company){
        $data = ModelsCompany::where("companyhashtoken", $company)->first();
        $contact = contact::where("company_id", isset($data->id) ? $data->id : "")->get();
        $skills = Skill::where("company_id", isset($data->id) ? $data->id : "")->get();
        $about = About::where("company_id", isset($data->id) ? $data->id : "")->get();
        $services = Service::where("company_id", isset($data->id) ? $data->id : "")->get();
        $projects = Project::where("company_id", isset($data->id) ? $data->id : "")->get();
        $name = ModelsCompany::where("companyhashtoken", $company)->first();
        $clients = Skill::where("elements", "Clientes")
        ->where("company_id", isset($data->id) ? $data->id : "")->get();
        $works = Skill::where("elements", "Trabalhos")
        ->where("company_id", isset($data->id) ? $data->id : "")->get();
        $premios = Skill::where("elements", "Premios")
        ->where("company_id", isset($data->id) ? $data->id : "")->get();
        $experience = Skill::where("elements", "Experiência")
        ->where("company_id", isset($data->id) ? $data->id : "")->get();
        $hero = hero::where("company_id", isset($data->id) ? $data->id : "")->get();
        $color = Color::where("company_id", isset($data->id) ? $data->id : "")->first();
        $api = Http::post("http://127.0.0.1/karamba.ao/api/anuncios", ["key" => "wRYBszkOguGJDioyqwxcKEliVptArhIPsNLwqrLAomsUGnLoho"]);

        $apiArray = $api->json();
        
        $pacotes = pacote::where("company_id", isset($data->id) ? $data->id : "")->first();
        return view("pages.home", [
            "clients" => $clients, 
            "works" => $works, 
            "premios" => $premios, 
            "experience" => $experience, 
            "contact" => $contact, 
            "hero" => $hero, 
            "skills" => $skills, 
            "about" => $about,
            "projects" => $projects,
            "services" => $services,
            "apiArray" => $apiArray,
            "name" => $name,
            "color" => $color,
            "pacotes" => $pacotes,
            "imageHero" => $this->imageHero($company),
            "start" => $this->start($company),
            "footer" => $this->footer($company)
        ]);
    }

    public function imageHero($company){
        $data = ModelsCompany::where("companyhashtoken", $company)->first();
        $imageHero = Fundo::where("tipo", "Hero")
        ->where("company_id", isset($data->id) ? $data->id : "")->first();
        return $imageHero;
    }

    public function start($company){
        $data = ModelsCompany::where("companyhashtoken", $company)->first();
        $start = Fundo::where("tipo", "Start")
        ->where("company_id", isset($data->id) ? $data->id : "")->first();
        return $start;
    }

    public function footer($company){
        $data = ModelsCompany::where("companyhashtoken", $company)->first();
        $footer = Fundo::where("tipo", "Footer")
        ->where("company_id", isset($data->id) ? $data->id : "")->first();
        return $footer;
    }

    public function sendEmail(Request $request){
    $data =   Mail::to("pachecobarrosodig3@gmail.com", "Pacheco Barroso")->send(new SendEmail([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
            "from" => $request->email,
    ]));
       return redirect()->back();
    }

    public function senha(){
        return Hash::make("admin@gmail.com");
    }
}