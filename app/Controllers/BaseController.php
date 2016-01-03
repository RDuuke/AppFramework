<?php

namespace App\Controllers;
use App\Controllers\Controller;

class BaseController implements Controller
{

    public function Index()
    {
        $title = "Newbie Framework";
        return view('welcome', compact('title'));
    }
}