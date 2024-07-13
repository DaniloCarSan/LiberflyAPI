<?php

namespace App\Business\Domain\Repositories;

use App\Models\Customer;
use Illuminate\Pagination\LengthAwarePaginator;

interface CustomerRepository {
    public function findById(int $id): ?Customer;
    public function list(?string $search, int $page, int $perPage): LengthAwarePaginator;
}