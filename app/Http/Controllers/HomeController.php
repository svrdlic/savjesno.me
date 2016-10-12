<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getHome();
    }

    public function getHome()
    {
        $incidents = Incident::where('approved', true)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('pages.home', compact('incidents'));
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}
