<?php

namespace RDuuke\Newbie\Controllers;


class BaseController
{
    public function Index()
    {
        $title = 'Newbie Framework';

        return view('welcome', compact('title'));
    }
}
