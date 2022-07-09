<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data=[
            'title'=>'Home | App Crud'
        ];
        return view('pages/home', $data);

    }

    public function about()
    {
        $data=[
            'title'=>'About Me | App Crud'
        ];
       
        return view('/pages/about', $data);
    }

    public function contact()
    {
        $data=[
            'title'=>'Contact Me | App Crud'
        ];
       
        return view('/pages/contact', $data);
    }

}
