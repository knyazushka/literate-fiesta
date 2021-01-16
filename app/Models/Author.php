<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = ['name', 'surname', 'middle_name', 'year_born', 'year_death'];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(
            Book::class,
            'books_authors',
            'author_id',
            'book_id'
        );
    }

    public function bookCount(): int
    {
        return $this->books()->count();
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter): Builder
    {
        return $filter->apply($builder);
    }
}
