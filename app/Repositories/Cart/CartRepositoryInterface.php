<?php

namespace App\Repositories\Cart;

use App\Models\Wine;
use Illuminate\Support\Collection;

interface CartRepositoryInterface
{
  // 33. Interfaz Cart - Curso de Laravel 11
  public function add(Wine $wine, int $quantity): void;

  public function increment(Wine $wine): void;

  public function decrement(int $wineId): void;

  public function remove(int $wineId): void;

  public function getTotalQuantityForWine(Wine $wine): int;

  public function getTotalCostForWine(Wine $wine, bool $formatted): float|string;

  public function getTotalQuantity(): int;

  public function getTotalCost(bool $formatted): float|string;

  public function hasProduct(Wine $wine): bool;

  public function getCart(): Collection;

  public function isEmpty(): bool;

  public function clear(): void;
}
