<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class GtrGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'gtr_model_id',
        'image',
        'caption',
    ];

    public function gtrModel(): BelongsTo
    {
        return $this->belongsTo(GtrModel::class);
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image && \Storage::disk('public')->exists('gtr/' . $this->image)) {
            return \Storage::url('gtr/' . $this->image);
        }
        return 'https://via.placeholder.com/800x500/1a1a1a/ff0000?text=GT-R';
    }
}
