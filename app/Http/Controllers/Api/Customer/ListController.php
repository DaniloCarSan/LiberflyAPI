<?php

namespace App\Http\Controllers\Api\Customer;

use App\Business\Domain\UseCases\Customer\List\Input;
use App\Business\Domain\UseCases\Customer\List\UseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function __construct(
        private UseCase $list
    ) {
    }

    public function execute(Request $request)
    {
        $input = new Input(
            search: $request->input('search'),
            page: $request->input('page', 1),
            perPage: $request->input('perPage', 20)
        );

        $customers = $this->list->execute($input);

        return $customers;
    }
}
