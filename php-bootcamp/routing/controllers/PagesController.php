<?php

namespace App\Controllers;

class PageController {

    public function home() {

        return view('index');

    }

    public function about() {

        $companyName = 'ocanica';
        return view('about', ['companyName' => $companyName]);

    }

    public function contact() {

        return view('contact');

    }

}