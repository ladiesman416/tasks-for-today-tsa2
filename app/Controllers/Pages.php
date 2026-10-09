<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;

class Pages extends BaseController
{
    public function index()
    {
        return view('pages/landing', ['tasks' => (new TaskModel())->getActive()]);
    }

    public function about()
    {
        return view('pages/about');
    }

    public function profile()
    {
        return view('pages/profile', ['username' => session()->get('username')]);
    }
}