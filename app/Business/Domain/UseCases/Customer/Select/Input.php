<?php

namespace App\Business\Domain\UseCases\Customer\Select;

readonly class Input
{
    public function __construct(
        public ?int $id
    ) {
    }
}
