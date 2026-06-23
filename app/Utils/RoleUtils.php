<?php

namespace App\Utils;

use function array_key_exists;
use function in_array;

class RoleUtils {

    public const ROLE_MANAGER = "manager";
    public const ROLE_CASHIER = "cashier";

    public const PERM_SHIFT = "shifts";
    public const PERM_PRODUCTS = "products";
    public const PERM_CASHIER = "cashier";

    private static array $list = [
        self::ROLE_CASHIER => [self::PERM_SHIFT, self::PERM_CASHIER],
        self::ROLE_MANAGER => [self::PERM_PRODUCTS]
    ];

    private static array $routes = [
        self::PERM_SHIFT => "employees.shift",
        self::PERM_PRODUCTS => "products.index",
        self::PERM_CASHIER => 'employees.cashier'
    ];

    public static function isPermitted(string $role, string $perm): bool {
        return array_key_exists($role, self::$list) && in_array($perm, self::$list[$role]);
    }

    public static function getAllowedRoutes(string $role): array {
        $allowed = [];
        foreach (self::$list[$role] as $perm) {
            $allowed[$perm] = self::$routes[$perm];
        }
        return $allowed;
    }
}
