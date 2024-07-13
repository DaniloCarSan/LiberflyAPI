<?php

namespace App\Business\Domain\Repositories;

use App\Models\User;

interface UserRepository {
    public function findByEmail(string $email): ?User;
}