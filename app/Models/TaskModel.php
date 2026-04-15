<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $allowedFields = ['title', 'status'];
    
    protected $validationRules = [
        'title'  => 'required|min_length[3]',
        'status' => 'required|in_list[pending,completed]'
    ];
}
