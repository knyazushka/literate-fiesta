<?php

namespace App\Filters;

class AuthorFilter extends QueryFilter
{
    public function name($name)
    {
        return $this->builder->where('name', 'like', '%' . $name . '%');
    }

    public function surname($surname)
    {
        return $this->builder->where('surname', 'like', '%' . $surname . '%');
    }

    public function middle_name($middlename)
    {
        return $this->builder->where('middle_name', 'like', '%' . $middlename . '%');
    }

    public function date_born($yearBorn)
    {
        return $this->builder->where('date_born', '=', $yearBorn);
    }

    public function date_death($yearDeath)
    {
        return $this->builder->where('date_death', '=', $yearDeath);
    }
}
