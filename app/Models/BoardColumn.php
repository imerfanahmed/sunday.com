<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardColumn extends Model
{
    /** @use HasFactory<\Database\Factories\BoardColumnFactory> */
    use HasFactory;

    protected $fillable = [
        'board_id',
        'name',
        'position',
        'color',
    ];

    protected function casts(): array
    {
        return [
            'position' => 'integer',
        ];
    }

    public function scopeOrdered($query): void
    {
        $query->orderBy('position');
    }

    public function board(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BoardItem::class);
    }
}
