<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Services\UploadService;
use App\Traits\WithCurrencyFormatter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
  use HasSlug;
  use WithCurrencyFormatter;

  protected $fillable = [
    'category_id', 'name', 'slug', 'description', 'year', 'price', 'stock', 'image'
  ];
  
  protected function casts(): array
  {
    return [
      'year'  => 'integer',
      'price' => 'decimal:2',
      'stock' => 'integer',
    ];
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function imageUrl(): Attribute
  {
    return Attribute::make(
      get: fn () => UploadService::url($this->image)
    );
  }

  // WithCurrencyFormatter
  public function formattedPrice(): Attribute
  {
    return Attribute::make(
      get: fn () => $this->formatCurrency($this->price)
    );
  }
}