<?php
namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;

class Task extends ResourceController
{
    protected $modelName = 'App\Models\TaskModel';
    protected $format    = 'json';

    public function index() {
        return $this->respond($this->model->findAll());
    }

    public function create() {
        $data = $this->request->getJSON();
        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        }
        return $this->failValidationErrors($this->model->errors());
    }

    // PUT: Update task status (e.g., set to 'completed')
    public function update($id = null)
    {
        $data = $this->request->getJSON();
        if ($this->model->update($id, $data)) {
            return $this->respond(['message' => 'Task updated successfully']);
        }
        return $this->failNotFound();
    }

// DELETE: Remove a task
    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id, 'message' => 'Task deleted']);
        }
        return $this->failNotFound();
    }
}

