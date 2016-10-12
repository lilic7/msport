<?php

namespace App\Http\Controllers;

use App\Promo;
use Illuminate\Http\Request;

use App\Http\Requests;

class PromoController extends Controller
{
    public function show($id){
        return view('welcome', ['promo' => Promo::where('video_id', $id)->first()]);
    }
}
