<?php

namespace App\Services;

use App\Contracts\ProgramRepositoryInterface;

class ProgramService
{
    protected $programRepositoryInterface;

    public function __construct(ProgramRepositoryInterface $programRepositoryInterface)
    {
        $this->programRepositoryInterface = $programRepositoryInterface;
    }

    public function store($data)
    {
        return $this->programRepositoryInterface->store($data);
    }
}
