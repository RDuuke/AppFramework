<?php

namespace RDuuke\Newbie\Contracts\Controller;


/**
 * Interface ResourceController.
 *
 * @package RDuuke\Newbie\Contracts\Controller
 */

interface ResourceController
{
    public function Index();

    public function Show();

    public function Edit($id);

    public function Update($id);

    public function Store();

    public function Destroy($id);

}