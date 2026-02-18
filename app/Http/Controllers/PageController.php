<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home() {
        return view('home');
    }

    public function service() {
        return view('service');
    }

    public function how() {
        return view('how');
    }

    public function sample() {
        return view('sample');
    }

    public function pricing() {
        return view('pricing');
    }

    public function about() {
        return view('about');
    }

    public function legal() {
        return view('legal');
    }

    public function contact() {
        return view('contact');
    }

    public function intake() {
        return view('intake');
    }
}

