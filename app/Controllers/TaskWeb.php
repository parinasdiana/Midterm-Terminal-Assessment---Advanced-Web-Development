<?php
namespace App\Controllers;
use App\Models\TaskModel;

class TaskWeb extends BaseController {
    
    public function index() {
        // Simple security check (Authorization)
        if (!session()->get('isLoggedIn')) return redirect()->to('/login');

        $model = new TaskModel();
        $data['tasks'] = $model->findAll();
        return view('tasks/index', $data);
    }

    public function create() {
        $model = new TaskModel();
        $model->save([
            'title'  => $this->request->getPost('title'),
            'status' => 'pending'
        ]);
        return redirect()->to('/tasks');
    }

    public function toggle($id) {
        $model = new TaskModel();
        $task = $model->find($id);
        $newStatus = ($task['status'] == 'pending') ? 'completed' : 'pending';
        $model->update($id, ['status' => $newStatus]);
        return redirect()->to('/tasks');
    }

    public function delete($id) {
        $model = new TaskModel();
        $model->delete($id);
        return redirect()->to('/tasks');
    }
}