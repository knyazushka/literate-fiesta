<?php

namespace App\Filters;

class BookFilter extends QueryFilter
{
    public function title($title)
    {
        return $this->builder->where('title', 'like', '%' . $title . '%');
    }

    public function year($year)
    {
        return $this->builder->where('year', '=', $year);
    }
}
