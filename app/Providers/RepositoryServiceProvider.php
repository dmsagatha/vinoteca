<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Cart\SessionCartRepository;
use App\Repositories\Shop\EloquentShopRepository;
use App\Repositories\Wine\EloquentWineRepository;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\Shop\ShopRepositoryInterface;
use App\Repositories\Wine\WineRepositoryInterface;
use App\Repositories\Category\EloquentCategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;

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

    $this->app->bind(
      abstract:WineRepositoryInterface::class,
      concrete:EloquentWineRepository::class,
    );

    $this->app->bind(
      abstract:CartRepositoryInterface::class,
      concrete:SessionCartRepository::class,
    );

    $this->app->bind(
      abstract:ShopRepositoryInterface::class,
      concrete:EloquentShopRepository::class,
    );
  }

  /**
  * Bootstrap services.
  */
  public function boot(): void
  {
  }
}