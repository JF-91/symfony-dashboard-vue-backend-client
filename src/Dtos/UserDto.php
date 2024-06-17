<?php

namespace App\Dtos;

use ApiPlatform\Metadata\ApiResource;
use App\Enums\UserTypeEnum;

#[ApiResource(
    collectionOperations: [
        'get',
        'post' => [
            'security' => "is_granted('ROLE_ADMIN')",
        ],
        'get' => [
            'security' => "is_granted('ROLE_EMPLOYEE')",
        ],
        'delete' => [
            'security' => "is_granted('ROLE_ADMIN')",
        ],
        'patch' => [
            'security' => "is_granted('ROLE_EMPLOYEE')",
        ],
        'put' => [
            'security' => "is_granted('ROLE_EMPLOYEE')",
        ],
    ],
    itemOperations: [
        'get',
        'put' => [
            'security' => "is_granted('ROLE_EMPLOYEE')",
        ],
        'patch' => [
            'security' => "is_granted('ROLE_EMPLOYEE')",
        ],
        'delete' => [
            'security' => "is_granted('ROLE_ADMIN')",
        ],
    ],
)]
class UserDto
{
    public function __construct(
        public string $id,
        public string $email,
        public string $type = UserTypeEnum::EMPLOYEE,
    ) {
    }
}