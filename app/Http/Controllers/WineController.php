<?php

namespace App\Http\Controllers;

use App\Models\Wine;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\WineRequest;
use App\Repositories\Wine\WineRepositoryInterface;
use App\Http\Controllers\Controller;

class WineController extends Controller
{
  public function __construct(private readonly WineRepositoryInterface $repository)
  {}
  
  public function index(): View
  {
    return view('wine.index', [
      'wines' => $this->repository->paginate(
        relationships: ['category']
      )
    ]);
  }

  public function create(): View
  {
    return view('wine.create', [
      'wine' => $this->repository->model(),
      'action' => route('wines.store'),
      'method' => 'POST',
      'submit' => 'Crear'
    ]);
  }

  public function store(WineRequest $request): RedirectResponse
  {
    // ray($request->all());

    $this->repository->create($request->validated());

    session()->flash('success', 'Categoría creada con éxito');

    return redirect()->route('wines.index');
  }

  public function edit(Wine $wine): View
  {
    // rd($wine);
    
    return view('wine.edit', [
      'wine' => $wine,
      'action' => route('wines.update', $wine),
      'method' => 'PUT',
      'submit' => 'Actualizar'
    ]);
  }

  public function update(WineRequest $request, Wine $wine): RedirectResponse
  {
    // ray($request->all());

    $this->repository->update($request->validated(), $wine);

    session()->flash('success', 'Categoría actualizada con éxito');

    return redirect()->route('wines.index');
  }

  public function destroy(Wine $wine): RedirectResponse
  {
    try {
      $this->repository->delete($wine);
      session()->flash('success', 'Categoría eliminada con éxito');
    } catch (\Exception $exception) {
      session()->flash('error', $exception->getMessage());
    }

    return redirect()->route('wines.index');
  }
}