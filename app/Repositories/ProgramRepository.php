<?php

namespace App\Repositories;

use App\Contracts\ProgramRepositoryInterface;
use App\Models\Program;

class ProgramRepository implements ProgramRepositoryInterface
{
    public function store($data)
    {
        return Program::create($data);
    }
}
