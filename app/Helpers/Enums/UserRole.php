<?php
/*user role enum*/

namespace App\Helpers\Enums;

enum UserRole: string
{
    case ADMIN = "admin";
    case USER = "user";

    /*restricted user*/
    /*this user is restricted from viewing, creating or editing, but its account is alive*/
    case RESTRICTED = "restricted";
}
