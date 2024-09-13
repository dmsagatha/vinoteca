<?php

namespace App\Repositories\Category;

use App\Models\Category;

interface CategoryRepositoryInterface
{
  public function model($slug = null);

  public function paginate($counts = [], $relationships = [], $perPage = 10);

  public function create($data);
  
  public function update($data, Category $category);
  
  public function delete(Category $category);
}