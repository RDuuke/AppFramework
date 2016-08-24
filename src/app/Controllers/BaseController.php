<?php

namespace RDuuke\Newbie\App\Controllers;
use RDuuke\Newbie\App\Models\Users;
use RDuuke\Newbie\App\Contracts\Controller;

class BaseController implements Controller
{

    public function Index()
    {
        $title = "Newbie Framework";
        return view('welcome', compact('title'));
    }
}