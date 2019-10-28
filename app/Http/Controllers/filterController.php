<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_data;

class filterController extends Controller
{
    public function index(){
      $users = user_data::all();
      return view('welcome', compact('users'));
    }

    public function filter(){
      $minPay=request('minPay');
      $maxPay=request('maxPay');
      $avail=request('avail');
      $availNow=request('availNow');
      $withoutPay=request('withoutPay');
      $maxYears=request('maxYears');
      $skills = array_map('trim', explode(',',request('skills')));

      $users=user_data::findSkills($skills)
        ->available($avail, $availNow)
        ->payRate($minPay, $maxPay, $withoutPay)
        ->yearsOfExp($maxYears)
        ->get();

      return view('welcome', compact('users'));

    }
}
