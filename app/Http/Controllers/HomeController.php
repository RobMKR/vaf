<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;
use App;
use App\Http\Controllers\Controller;


class HomeController extends Controller{
    
    public function index(){
      return view('home.home');
    }

    public function contact(){
      return view('home.contact');
    }

    public function about(){
      return view('home.about');
    }
}