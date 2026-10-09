<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    protected $helpers = ['form'];

    private array $rules = [
        'title'     => 'required|min_length[3]|max_length[150]',
        'task_date' => 'required|valid_date[Y-m-d]',
    ];

    public function index()
    {
        return view('tasks/index', ['tasks' => (new TaskModel())->getActive()]);
    }

    public function new()
    {
        return view('tasks/form', [
            'task'   => null,
            'action' => site_url('tasks/create'),
            'title'  => 'New Task',
        ]);
    }

    public function create()
    {
        if (! $this->validate($this->rules)) {
            return view('tasks/form', [
                'task'       => null,
                'action'     => site_url('tasks/create'),
                'title'      => 'New Task',
                'validation' => $this->validator,
            ]);
        }

        (new TaskModel())->insert([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0,
        ]);
        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $task = (new TaskModel())->find($id);
        if (! $task || $task['is_archived']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('tasks/form', [
            'task'   => $task,
            'action' => site_url('tasks/update/' . $id),
            'title'  => 'Edit Task',
        ]);
    }

    public function update($id)
    {
        $model = new TaskModel();
        $task  = $model->find($id);
        if (! $task || $task['is_archived']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (! $this->validate($this->rules)) {
            return view('tasks/form', [
                'task'       => $task,
                'action'     => site_url('tasks/update/' . $id),
                'title'      => 'Edit Task',
                'validation' => $this->validator,
            ]);
        }

        $model->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
        ]);
        return redirect()->to('/tasks');
    }

    // Soft delete: keep the row, just hide it
    public function archive($id)
    {
        $model = new TaskModel();
        if ($model->find($id)) {
            $model->update($id, ['is_archived' => 1]);
        }
        return redirect()->to('/tasks');
    }
}