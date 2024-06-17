<?php

namespace App\Enums;

enum UserTypeEnum : string
{
    case ADMIN = 'admin';
    case EMPLOYEE = 'employee';
    case CUSTOMER = 'customer';

    case Practitioner = 'practitioner';

    public static function getValues(): array
    {
        return [
            self::ADMIN,
            self::EMPLOYEE,
            self::CUSTOMER,
            self::Practitioner,
        ];
    }

    public static function getLabels(): array
    {
        return [
            self::ADMIN => 'Admin',
            self::EMPLOYEE => 'Employee',
            self::CUSTOMER => 'Customer',
            self::Practitioner => 'practitioner',
        ];
    }

    public static function getRoles(): array
    {
        return [
            self::ADMIN => 'ROLE_ADMIN',
            self::EMPLOYEE => 'ROLE_EMPLOYEE',
            self::CUSTOMER => 'ROLE_CUSTOMER',
            self::Practitioner => 'ROLE_Practitioner',
        ];
    }
}