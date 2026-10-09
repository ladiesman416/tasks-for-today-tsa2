<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $helpers = ['form'];

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/customers');
        }
        return view('auth/login');
    }

    public function attempt()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('auth/login', ['validation' => $this->validator]);
        }

        $user = (new UserModel())
            ->where('username', $this->request->getPost('username'))
            ->first();

        if (! $user
            || empty($user['password'])
            || ! password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        session()->regenerate();
        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'username'   => $user['username'],
        ]);

        return redirect()->to('/customers');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}