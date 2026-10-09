<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Users extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $model = new UserModel();
        $users = $model->findAll();

        return view('users/index', ['users' => $users]);
    }

    public function new()
    {
        return view('users/form', [
            'user'   => null,
            'action' => site_url('users/create'),
            'title'  => 'New User',
        ]);
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('users/form', [
                'user'       => null,
                'action'     => site_url('users/create'),
                'title'      => 'New User',
                'validation' => $this->validator,
                'password' => 'required|min_length[6]',
            ]);
        }

        (new UserModel())->insert([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);
        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $user = (new UserModel())->find($id);
        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('users/form', [
            'user'   => $user,
            'action' => site_url('users/update/' . $id),
            'title'  => 'Edit User',
        ]);
    }

    public function update($id)
    {
        $model = new UserModel();
        $user  = $model->find($id);

        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required',
        ];

        $file      = $this->request->getFile('avatar');
        $hasUpload = $file && $file->getError() !== UPLOAD_ERR_NO_FILE;
        if ($hasUpload) {
            $rules['avatar'] = 'uploaded[avatar]'
                . '|ext_in[avatar,jpg,jpeg,png]'
                . '|mime_in[avatar,image/jpg,image/jpeg,image/png]'
                . '|is_image[avatar]'
                . '|max_size[avatar,2048]';
        }

        if (! $this->validate($rules)) {
            return view('users/form', [
                'user'       => $user,
                'action'     => site_url('users/update/' . $id),
                'title'      => 'Edit User',
                'validation' => $this->validator,
            ]);
        }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        $newPassword = $this->request->getPost('password');
        if (! empty($newPassword)) {
            $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        if ($hasUpload && $file->isValid() && ! $file->hasMoved()) {
            $dir     = FCPATH . 'uploads/avatars/';
            $newName = $file->getRandomName();
            $file->move($dir, $newName);

            // display-ready 150x150 thumbnail
            service('image')->withFile($dir . $newName)
                ->fit(150, 150, 'center')
                ->save($dir . 'thumb_' . $newName);

            // remove the previous avatar files
            if (! empty($user['avatar'])) {
                @unlink($dir . $user['avatar']);
                @unlink($dir . 'thumb_' . $user['avatar']);
            }

            $data['avatar'] = $newName; // only the filename goes in the DB
        }

        $model->update($id, $data);
        return redirect()->to('/users');
    }
}