<?php

   namespace App\Models;

   use CodeIgniter\Model;

   class TaskModel extends Model
   {
       protected $table         = 'tasks';
       protected $primaryKey    = 'id';
       protected $returnType    = 'array';
       protected $allowedFields = ['title', 'description', 'task_date', 'is_archived'];
       protected $useTimestamps = true;

       // Only tasks that are not archived (soft delete hides the rest)
       public function getActive()
       {
           return $this->where('is_archived', 0)
                       ->orderBy('task_date', 'ASC')
                       ->findAll();
       }
   }