<?php

namespace App\Business\Infra\Repositories;

use App\Exceptions\RepositoryException;
use App\Business\Domain\Repositories\UserRepository as IUserRepository;
use App\Models\User;
use Illuminate\Http\Response;

class UserRepository implements IUserRepository 
{
    public function findByEmail(string $email): ?User
    {
        try {
            return User::where('email', $email)->first();
        } catch (\Throwable $e) {
            throw new RepositoryException("Erro ao buscar usuário por email", Response::HTTP_INTERNAL_SERVER_ERROR, $e);
        }
    }
}