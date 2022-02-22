<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'parent_id',
        'name',
        'description',
        'status',
        'file_name'
    ];

    public const STATUS_NEW = 0;
    public const STATUS_IN_PROGRESS = 1;
    public const STATUS_TESTING = 2;
    public const STATUS_DONE = 3;

    public static $statuses = [
        0 => 'Open',
        1 => 'In progress',
        2 => 'Testing',
        3 => 'Done'
    ];

    public static function getProjectTasks(int $projectId) : array
    {
        return [
            'new' => Task::where([
                                     'project_id'    => $projectId,
                                     'status'        => Task::STATUS_NEW
                                ])->get(),
            'in_progress' => Task::where([
                                     'project_id'    => $projectId,
                                     'status'        => Task::STATUS_IN_PROGRESS
                                ])->get(),
            'testing' => Task::where([
                                     'project_id'    => $projectId,
                                     'status'        => Task::STATUS_TESTING
                                ])->get(),
            'done' => Task::where([
                                     'project_id'    => $projectId,
                                     'status'        => Task::STATUS_DONE
                                 ])->get()
        ];
    }

}
