<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceForSimpleClient extends Controller
{
    public function index()
    {
        return view('service-for-simple-client.index');
    }
    public function pageAdvokatPoUgalownymDelam()
    {
        return view('service-for-simple-client.advokat-po-ugolovnym-delam');
    }
    public function pageAdvokatPoAdministrativnymDelam()
    {
        return view('service-for-simple-client.advokat-po-administrativnym-delam');
    }
    public function pageAdvokatPoDtp()
    {
        return view('service-for-simple-client.advokat-po-dtp');
    }

    public function pageVzyskanieDolgovSFizicheskihLic()
    {
        return view('service-for-simple-client.vzyskanie-dolgov-s-fizicheskih-lic');
    }

    public function pageAdvokatPoZhilishchnymVoprosam()
    {
        return view('service-for-simple-client.advokat-po-zhilishchnym-voprosam');
    }
}
