<?php

namespace App\Traits;

use App\Services\UploadService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

trait CRUDOperations
{
  // Operaciones con Eloquent
  public function model($slug = null): Model
  {
    if ($slug) {
      return $this->model::whereSlug($slug)->firstOrFail();
    }

    return app($this->model);
  }

  public function paginate($counts = [], $relationships = [], $perPage = 10): LengthAwarePaginator
  {
    return $this->model::query()
        ->with($relationships)
        ->withCount($counts)
        ->paginate($perPage);
  }

  public function create($data): Model
  {
    $image = UploadService::upload(data_get($data, 'image'), strtolower(class_basename($this->model)));

    return $this->model::create(array_merge($data, ['image' => $image]));
  }
  
  public function update($data, Model $model): Model
  {
    if (data_get($data, 'image')) {
      UploadService::delete($model->image);
      data_set(
        $data, 
        'image', 
        UploadService::upload(data_get($data, 'image'), strtolower(class_basename($this->model)))
      );
    }

    $model->update($data);

    return $model;
  }
  
  /**
   * @throws \Exception
   */
  public function delete(Model $model): ?bool
  {
    if (method_exists($this, method: 'deleteChecks')) {
      $this->deleteChecks($model);
    }

    UploadService::delete($model->image);

    return $model->delete();
  }
}