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
  public static $_table = 'tasks';
  protected $asociated;

  public function asociated()
  {
    if ($this->asociated == null) {
      $query = "SELECT asociated_id, asociated FROM task_asociations WHERE task_id = ?";
      $stmt = \ORM::getDb()->prepare($query);
      $stmt->execute([$this->id]);
      $output = [];
      if ($stmt->rowCount() > 0) {
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
      }
      $this->asociated = $output;
    }
    return $this->asociated;
  }
  public function state()
  {
    return $this->hasMany(TaskState::class)->orderByAsc('date')->findMany();
  }
  public function new()
  {
    parent::save();
    $data = [
      'task_id' => $this->id,
      'state' => 0,
      'date' => \Carbon\Carbon::now(config('app.timezone'))->format('Y-m-d H:i:s')
    ];
    $state = \model(TaskState::class)->create($data);
    $state->save();
  }
}
