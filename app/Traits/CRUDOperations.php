<?php

namespace App\Traits;

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

  public function create($data);
  
  public function update($data, Category $category);
  
  public function delete(Category $category);
}