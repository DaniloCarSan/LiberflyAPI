<?php

namespace App\Business\Domain\UseCases\Customer\Select;

use App\Business\Domain\Repositories\CustomerRepository;
use App\Exceptions\CustomerException;
use App\Models\Customer;
use App\Utils\ValidatorAdapter;
use Illuminate\Http\Response;

class UseCase
{

    public function __construct(
        private CustomerRepository $repository
    ) {
    }

    public function execute(Input $input): Customer
    {
        $this->validate($input);

        if (!$customer = $this->repository->findById($input->id)) {
            throw new CustomerException("Cliente não encontrado", Response::HTTP_NOT_FOUND);
        }

        return $customer;
    }

    public function validate(Input $input)
    {
        $this->validateId($input->id);
    }

    public function validateId($id): void
    {
        ValidatorAdapter::field('id', $id, 'required|numeric');
    }
}
