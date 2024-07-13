<?php

namespace App\Http\Controllers\Api\Customer;

use App\Business\Domain\UseCases\Customer\Select\Input;
use App\Business\Domain\UseCases\Customer\Select\UseCase;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CustomerResource;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    public function __construct(
        private UseCase $select
    ) {
    }

    public function execute(Request $request, $id)
    {
        $input = new Input(
            id: $id
        );
    
        $customer = $this->select->execute($input);

        return new CustomerResource($customer);
    }
}