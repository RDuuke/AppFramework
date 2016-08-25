<?php

namespace RDuuke\Newbie\Controllers;

use RDuuke\Newbie\Contracts\Controller;
use RDuuke\Newbie\Models\Users;


class UsersController implements Controller
{
    protected $users;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Method index receives GET request extends the interface controller.
     */
    public function index()
    {
        newFlashMessage('test', 'test', 'warning');
        $users = Users::all();

        return view('users\home', compact('users'));
    }

    /**
     * Edit method, receives numeric parameter.
     *
     * @param $id int
     */
    public function edit($id)
    {
        $user = Users::find($id);

        return view('users/edit', compact('user'));
    }

    /**
     * Show method, receives numeric parameter.
     *
     * @param $id
     */
    public function show($id)
    {
        echo 'Show: '.$id;
    }

    public function create()
    {
        return view('users/create');
    }


    /**
     * Store method receives POST parameters.
     */
    public function store()
    {
        $request = (array) $_POST;
        Users::create($request);

        return redirect('users/');
    }

    /**
     * Update method, receives numeric parameter.
     * and receives POST parameters.
     *
     * @param $id
     */
    public function update($id)
    {
        $request = (object) $_POST;
        $user = Users::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        return redirect('users/');

    }

    /**
     * Destroy method, receives numeric parameter.
     *
     * @param $id
     */
    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();

        return redirect('users/');
    }
}