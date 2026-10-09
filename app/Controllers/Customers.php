<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Customers extends BaseController
{
    protected $helpers = ['form'];

    private array $rules = [
        'full_name' => 'required|min_length[3]',
        'email'     => 'required|valid_email',
    ];

    public function index()
    {
        $model = new CustomerModel();
        $customers = $model->findAll();

        return view('customers/index', ['customers' => $customers]);
    }

    public function new()
    {
        return view('customers/form', [
            'customer' => null,
            'action'   => site_url('customers/create'),
            'title'    => 'New Customer',
        ]);
    }

    public function create()
    {
        if (! $this->validate($this->rules)) {
            return view('customers/form', [
                'customer'   => null,
                'action'     => site_url('customers/create'),
                'title'      => 'New Customer',
                'validation' => $this->validator,
            ]);
        }

        (new CustomerModel())->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
        ]);
        return redirect()->to('/customers');
    }

    public function edit($id)
    {
        $customer = (new CustomerModel())->find($id);
        if (! $customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('customers/form', [
            'customer' => $customer,
            'action'   => site_url('customers/update/' . $id),
            'title'    => 'Edit Customer',
        ]);
    }

    public function update($id)
    {
        $model    = new CustomerModel();
        $customer = $model->find($id);

        if (! $this->validate($this->rules)) {
            return view('customers/form', [
                'customer'   => $customer,
                'action'     => site_url('customers/update/' . $id),
                'title'      => 'Edit Customer',
                'validation' => $this->validator,
            ]);
        }

        $model->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
        ]);
        return redirect()->to('/customers');
    }
}