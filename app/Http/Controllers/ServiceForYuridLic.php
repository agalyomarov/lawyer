<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceForYuridLic extends Controller
{
    public function index()
    {
        return view('service_for_yur_lic.index');
    }
    public function pageDosudebnoeUregulirovanieSporov()
    {
        return view('service_for_yur_lic.dosudebnoe-uregulirovanie-sporov');
    }
    public function pageAdvokatPoArbitrazhnymDelam()
    {
        return view('service_for_yur_lic.advokat-po-arbitrazhnym-delam');
    }
    public function pagePredstavitelstvo()
    {
        return view('service_for_yur_lic.predstavitelstvo');
    }
    public function pageProfessionalnieKonsultatsiiAdvokata()
    {
        return view('service_for_yur_lic.professionalnie-konsultatsii-advokata');
    }
    public function pageYuridicheskayaKonsultaciyaIp()
    {
        return view('service_for_yur_lic.yuridicheskaya-konsultaciya-ip');
    }
}
