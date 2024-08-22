<?php

namespace App\Repositories\Wine;

use App\Models\Wine;

interface WineRepositoryInterface
{
  public function model(?string $slug = null);

  public function paginate($counts = [], $relationships = [], $perPage = 10);

  public function create($data);
  
  public function update($data, Wine $wine);
  
  public function delete(Wine $wine);
}