<?php

namespace App\Business\Infra\Repositories;

use App\Exceptions\RepositoryException;
use App\Business\Domain\Repositories\CustomerRepository as ICustomerRepository;
use App\Models\Customer;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class CustomerRepository implements ICustomerRepository
{
    public function findById(int $id): ?Customer
    {
        try {
            return Customer::find($id);
        } catch (\Throwable $e) {
            throw new RepositoryException("Erro ao buscar usuário por id", Response::HTTP_INTERNAL_SERVER_ERROR, $e);
        }
    }

    public function list(?string $search, int $page, int $perPage): LengthAwarePaginator
    {
        try {

            if (!is_null($search)) {
                return Customer::where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search)
                    ->orderBy('id', 'asc')->paginate($perPage, ['*'], 'page', $page);
            }

            return Customer::orderBy('id', 'asc')->paginate($perPage, ['*'], 'page', $page);
        } catch (\Throwable $e) {
            throw new RepositoryException($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, $e);
        }
    }
}
