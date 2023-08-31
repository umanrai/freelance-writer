<?php

namespace App\Misc;

class Role
{

    const ROLE_ADMIN = 0;
    const ROLE_CLIENT = 1;
    const ROLE_WRITER = 2;
    const ROLE_USER = 3;

    const ROLE_ADMIN_SLUG = 'Admin';
    const ROLE_CLIENT_SLUG = 'Client';
    const ROLE_WRITER_SLUG = 'Writer';
    const ROLE_USER_SLUG = 'User';

    public static function all(): array
    {
        return [
            Role::ROLE_ADMIN  => Role::ROLE_ADMIN_SLUG,
            Role::ROLE_CLIENT => Role::ROLE_CLIENT_SLUG,
            Role::ROLE_WRITER => Role::ROLE_WRITER_SLUG,
            Role::ROLE_USER   => Role::ROLE_USER_SLUG,
        ];
    }

}
