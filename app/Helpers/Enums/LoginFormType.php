<?php

namespace App\Helpers\Enums;

/**
 * Enum helper for login form types
 * User or admin form
 */
enum LoginFormType: string
{
    case ADMIN = "admin";
    case USER = "user";
}
