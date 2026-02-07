<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardItem extends Model
{
    /** @use HasFactory<\Database\Factories\BoardItemFactory> */
    use HasFactory;

    protected $fillable = [
        'board_column_id',
        'title',
        'description',
        'position',
        'status',
        'priority',
        'due_date',
        'created_by',
        'assigned_to',
    ];

    protected function casts(): array
    {
        return [
            'position' => 'integer',
            'due_date' => 'date',
        ];
    }

    public function scopeOrdered($query): void
    {
        $query->orderBy('position');
    }

    public function column(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BoardColumn::class, 'board_column_id');
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
