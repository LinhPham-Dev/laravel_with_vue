<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookVersion extends Model
{
    use HasFactory;

    // Update field updated_at books table when bookVersion update
    // protected $touches = ['books'];

    protected $fillable = ['name', 'book_id', 'reprint_date'];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function scopeReprintDate(Builder $query, $from)
    {
        return $query->where('reprint_date', '>=', "$from");
    }
}
