<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'image', 'author_id', 'page', 'release_date', 'price', 'description'];

    /**
     * Get the user that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function bookVersions(): HasMany
    {
        return $this->hasMany(BookVersion::class);
    }

    public function availableBookVersions($from): bool
    {
        return 0 === $this->bookVersions()->reprintDate($from)->get();
    }

    public function currentBookVersionsFilter($from)
    {
        return $this->bookVersions()->reprintDate($from)->get();
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
