<?php

namespace App\Http\Controllers\Wine;

use App\Models\Category;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

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

  public function store(CategoryRequest $request): RedirectResponse
  {
    // ray($request->all());

    $this->repository->create($request->validated());

    session()->flash('success', 'Categoría creada con éxito');

    return redirect()->route('categories.index');
  }

  public function edit(Category $category): View
  {
    // rd($category);
    
    return view('wine.category.edit', [
      'category' => $category,
      'action' => route('categories.update', $category),
      'method' => 'PUT',
      'submit' => 'Actualizar'
    ]);
  }

  public function update(CategoryRequest $request, Category $category): RedirectResponse
  {
    // ray($request->all());

    $this->repository->update($request->validated(), $category);

    session()->flash('success', 'Categoría actualizada con éxito');

    return redirect()->route('categories.index');
  }

  public function destroy(Category $category): RedirectResponse
  {
    try {
      $this->repository->delete($category);
      session()->flash('success', 'Categoría eliminada con éxito');
    } catch (\Exception $exception) {
      session()->flash('error', $exception->getMessage());
    }

    return redirect()->route('categories.index');
  }
}