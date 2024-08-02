<?php

namespace App\Http\Controllers\Wine;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\View\View;

class CategoryController extends Controller
{
  public function __construct(private readonly CategoryRepositoryInterface $repository)
  {}
  
  public function index(): View
  {
    /* $categories = $this->repository->paginate(
      counts: ['wines']
    );
    ray($categories); */
    
    return view('wine.category.index', [
      'categories' => $this->repository->paginate(
        counts: ['wines']
      )
    ]);
  }

  public function create(): View
  {
    return view('wine.category.create', [
      'category' => $this->repository->model(),
      'action' => route('categories.store'),
      'method' => 'POST',
      'submit' => 'Crear'
    ]);
  }
}