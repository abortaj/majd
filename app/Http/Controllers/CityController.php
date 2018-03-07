<?php

namespace App\Http\Controllers;

use App\Interfaces\CityInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public $city;

    public function __construct(CityInterface $city)
    {
        $this->city = $city;
    }


    public function index($country)
    {
        $cities = $this->city->findByCountry($country)->pluck('name','id');
        return response()->json(['cities'=>$cities]);
    }
}
