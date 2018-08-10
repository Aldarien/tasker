<?php
namespace Tasker;

use App\Alias\Model;

/**
 * @property int $id
 * @property string names length=100
 * @property string last_name length=50
 * @property string last_name2 length=50
 */
class Person extends Model
{
  public static $_table = 'people';
  public function tasks()
  {
    return \model(Task::class)
      ->select('tasks.*')
      ->join('task_asociations', ['ta.task_id', '=', 'tasks.id'], 'ta')
      ->where('ta.asociated', 'person')
      ->where('ta.asociated_id', $this->id)
      ->findMany();
  }
  public function name()
  {
    return trim($this->names . ' ' . $this->last_name . ' ' . $this->last_name2);
  }
}
