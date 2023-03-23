<?php

namespace App\Services\RolesAndPermissionsService;

use App\Services\CoreService;

class RolesAndPermissionsService extends CoreService {
    /**
     * Admin role slug
     */
    const ROLE_ADMIN_SLUG = 'admin';

    /**
     * User role slug
     */
    const ROLE_USER_SLUG = 'user';

    /**
     * Roles
     *
     * @var array|string[]
     */
    public array $roles = [
        self::ROLE_ADMIN_SLUG,
        self::ROLE_USER_SLUG
    ];
}
