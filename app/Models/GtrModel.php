<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class GtrModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'generation',
        'year_start',
        'year_end',
        'engine',
        'displacement',
        'horsepower',
        'torque',
        'transmission',
        'drivetrain',
        'acceleration',
        'top_speed',
        'fuel_type',
        'weight',
        'price',
        'description',
        'main_image',
        'is_nismo',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'horsepower' => 'integer',
        'year_start' => 'integer',
        'year_end' => 'integer',
        'is_nismo' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function galleries(): HasMany
    {
        return $this->hasMany(GtrGallery::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function approvedReviews(): HasMany
    {
        return $this->hasMany(Review::class)->where('status', 'approved');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function getAverageRatingAttribute(): ?float
    {
        $avg = $this->approvedReviews()->avg('rating');
        return $avg ? round($avg, 1) : null;
    }

    public function getMainImageUrlAttribute(): string
    {
        if ($this->main_image) {
            if (str_starts_with($this->main_image, 'http')) {
                return $this->main_image;
            }
            if (\Storage::disk('public')->exists('gtr/' . $this->main_image)) {
                return \Storage::url('gtr/' . $this->main_image);
            }
        }
        return 'https://via.placeholder.com/800x500/1a1a1a/ff0000?text=' . urlencode($this->name);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeNismo($query)
    {
        return $query->where('is_nismo', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeSearch($query, ?string $search)
    {
        if ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('generation', 'like', "%{$search}%")
                  ->orWhere('engine', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        return $query;
    }

    public function scopeFilterGeneration($query, ?string $generation)
    {
        if ($generation) {
            return $query->where('generation', $generation);
        }
        return $query;
    }

    public function scopeFilterYear($query, ?string $year)
    {
        if ($year) {
            return $query->where('year_start', '<=', $year)
                         ->where(function ($q) use ($year) {
                             $q->whereNull('year_end')->orWhere('year_end', '>=', $year);
                         });
        }
        return $query;
    }

    public function scopeFilterHorsepower($query, ?string $minHp, ?string $maxHp)
    {
        if ($minHp) {
            $query->where('horsepower', '>=', $minHp);
        }
        if ($maxHp) {
            $query->where('horsepower', '<=', $maxHp);
        }
        return $query;
    }

    public function scopeFilterPrice($query, ?string $minPrice, ?string $maxPrice)
    {
        if ($minPrice) {
            $query->whereRaw("CAST(REPLACE(REPLACE(price, '$', ''), ',', '') AS UNSIGNED) >= ?", [$minPrice]);
        }
        if ($maxPrice) {
            $query->whereRaw("CAST(REPLACE(REPLACE(price, '$', ''), ',', '') AS UNSIGNED) <= ?", [$maxPrice]);
        }
        return $query;
    }
}
