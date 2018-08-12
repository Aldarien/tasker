<?php
namespace Tasker;

use App\Alias\Model;

/**
 * @property int $id
 * @property string $description length=100
 */
class Project extends Model
{
  public static $_table = 'projects';
  public function tasks()
  {
    return \model(Task::class)
      ->select('tasks.*')
      ->join('task_asociations', ['ta.task_id', '=', 'tasks.id'], 'ta')
      ->where('ta.asociated', 'project')
      ->where('ta.asociated_id', $this->id)
      ->findMany();
  }
}
