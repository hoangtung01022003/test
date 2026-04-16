<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function show($id)
{
    $user = User::findOrFail($id);
    return view('crud_user.detail', compact('user'));
}
}
