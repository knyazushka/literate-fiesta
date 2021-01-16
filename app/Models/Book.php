<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = ['title', 'description', 'year'];

    public function scopeFilter(Builder $builder, QueryFilter $filter): Builder
    {
        return $filter->apply($builder);
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(
            Author::class,
            'books_authors',
            'book_id',
            'author_id'
        );
    }

    public function authorsBook(): string
    {
        $authorsBook = '';
        $models = $this->authors()->get();

        foreach ($models as $model){
            $authorsBook .= $model->surname . ' ' . mb_substr($model->name, 0, 1, 'UTF-8') . '. ' . mb_substr($model->middle_name, 0, 1, 'UTF-8') . '.' . ', ';
        }

        return substr($authorsBook, 0, -2);
    }
}
