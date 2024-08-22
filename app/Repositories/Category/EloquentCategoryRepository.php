<?php

namespace App\Repositories\Category;

use Exception;
use App\Models\Category;
use App\Traits\CRUDOperations;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
  use CRUDOperations;

  protected string $model = Category::class;

  protected function deleteChecks(Category $category): void
  {
    if ($category->wines()->exists()) {
      throw new Exception(message: 'No se puede eliminar la categoría porque tiene vinos asociados');
    }
  }
}