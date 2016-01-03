<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Users;


class UsersController implements Controller
{
    protected $users;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->users = new Users();
    }

    /**
     * Method index receives GET request extends the interface controller
     */
    public function index()
    {
        newFlashMessage('test', 'teste de mensajes flash');
        $users = $this->users->all();
        return view('users/home', compact('users'));
    }

    /**
     * Edit method, receives numeric parameter
     * @param $id int
     */
    public function edit($id)
    {
        $user = $this->users->find($id);
        return view('users/edit',compact('user'));
    }

    /**
     * Show method, receives numeric parameter
     * @param $id
     */
    public function show($id)
    {
        echo "Show: " . $id;
    }

    public function create()
    {
        return view('users/create');
    }


    /**
     * Store method receives POST parameters
     */
    public function store()
    {
        $request = (object)$_POST;
        $this->users->email = $request->email;
        $this->users->name = $request->name;
        $this->users->create($request->password, $request->rol);
        return redirect('users/');
    }

    /**
     * Update method, receives numeric parameter
     * and receives POST parameters
     * @param $id
     */
    public function update($id)
    {
        $request = (object)$_POST;
        $this->users->email = $request->email;
        $this->users->name = $request->name;
        if ($request->password == "") {
            $this->users->update($id, $request->rol);
            return redirect('users/');
        }
        $this->users->update($id, $request->rol, $request->password);
        return redirect('users/');

    }

    /**
     * Destroy method, receives numeric parameter
     * @param $id
     */
    public function destroy($id)
    {
        $this->users->destroy($id);
        return redirect('users/');
    }

}