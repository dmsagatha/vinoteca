<?php

namespace App\Repositories\Wine;

use App\Models\Wine;
use App\Traits\CRUDOperations;

class EloquentWineRepository implements WineRepositoryInterface
{
  use CRUDOperations;

  protected string $model = Wine::class;

  /* protected function deleteChecks(Wine $wine): void
  {
    if ($wine->wines()->exists()) {
      throw new Exception(message: 'No se puede eliminar la categoría porque tiene vinos asociados');
    }
  } */
}