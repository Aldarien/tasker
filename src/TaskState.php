<?php
namespace Tasker;

use App\Alias\Model;

/**
 * @property int $id
 * @property int $task_id
 * @property int state
 * @property \DateTime $date
 */
class TaskState extends Model
{
  public static $_table = 'task_states';

  public function task()
  {
    return $this->belongsTo(Task::class)->findOne();
  }
}
