<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\EloquentCategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  /**
  * Register services.
  */
  public function register(): void
  {
    $this->app->bind(
      abstract:CategoryRepositoryInterface::class,
      concrete:EloquentCategoryRepository::class,
    );
  }

  /**
  * Bootstrap services.
  */
  public function boot(): void
  {
  }
}