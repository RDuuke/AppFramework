<?php

namespace RDuuke\Newbie\Controllers;

use RDuuke\Newbie\Contracts\Controller;

class BaseController implements Controller
{

    public function Index()
    {
        $title = 'Newbie Framework';

        return view('welcome', compact('title'));
    }
}