<?php

namespace RDuuke\Newbie\Contracts\Controller;

/**
 * Interface ResourceController.
 */
interface ResourceController
{
    public function Index();

    public function Show($id);

    public function Edit($id);

    public function Update($id);

    public function Store();

    public function Destroy($id);
}
