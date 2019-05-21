<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailable;
use App\Mail\WelcomeUser;
use App\Mail\Markdowntemplate;
use App\Mail\OrderShipped;
//namespace App\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $successStatus;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getDetails()
    {
        $user = Auth::user();
        return response()->json(['success' => $user]);
    }
    public function mail()
    {
       $name = 'Akshay';
       Mail::to('akshay@gmail.com')->send(new OrderShipped);
       
       return 'Email was sent';
    }
}
