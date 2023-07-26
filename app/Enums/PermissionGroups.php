<?php

namespace App\Enums;

enum PermissionGroups: string
{
    case user           = 'user';
    case role           = 'role';
    case permission     = 'permission';
    case admin          = 'admin';
    case shareholder    = 'shareholder';
    case company        = 'company';
    case round          = 'round';
    case user_data      = 'user_data';
    case email_template = 'email_template';

    public function getName(): string
    {
        return match ($this) {
            self::user           => 'User',
            self::role           => 'Role',
            self::permission     => 'Permission',
            self::admin          => 'Administrator',
            self::shareholder    => 'Shareholder',
            self::company        => 'Company',
            self::round          => 'Round',
            self::user_data      => 'User data',
            self::email_template => 'Email template',
        };
    }

    public static function getKeysValues(): array
    {
        $cases = [];
        foreach (self::cases() as $case) :
            $cases[$case->value] = $case->getName();
        endforeach;
        return $cases;
    }
}
