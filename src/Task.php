<?php
namespace Tasker;

use App\Alias\Model;

/**
 * @property int $id
 * @property string $title length=100
 * @property string $descripcion text
 */
class Task extends Model
{
  protected $asociated;
  public function tasks()
  {
    return \model(Task::class)
      ->select('tasks.*')
      ->join('task_asociations', ['ta.task_id', '=', 'tasks.id'], 'ta')
      ->where('ta.asociated', 'tasks')
      ->where('ta.asociated_id', $this->id)
      ->findMany();
  }
  public function asociated()
  {
    if ($this->asociated == null) {
      $query = "SELECT asociated_id, asociated FROM task_asociations WHERE task_id = ?";
      $stmt = \ORM::getDb()->prepare($query);
      $stmt->execute([$this->id]);
      if ($stmt->rowCount() > 0) {
        $output = [];
        $R = $stmt->fetchAll(\PDO::FETCH_OBJ);
        foreach ($R as $r) {
          switch ($r->asociated) {
            case 'person':
              $output []= \model(Person::class)->findOne($r->asociated_id);
              break;
            case 'place':
              $output []= \model(Place::class)->findOne($r->asociated_id);
              break;
            case 'project':
              $output []= \model(Project::class)->findOne($r->asociated_id);
              break;
            case 'task':
              $output []= \model(Task::class)->findOne($r->asociated_id);
              break;
          }
        }
        $this->asociated = $output;
      }
    }
    return $this->asociated;
  }
}
