<?php
namespace Tasker;

use App\Alias\Model;

/**
 * @property int $id
 * @property string $description length=100
 */
class Place
{
  public function tasks()
  {
    return \model(Task::class)
      ->select('tasks.*')
      ->join('task_asociations', ['ta.task_id', '=', 'tasks.id'], 'ta')
      ->where('ta.asociated', 'place')
      ->where('ta.asociated_id', $this->id)
      ->findMany();
  }
}
