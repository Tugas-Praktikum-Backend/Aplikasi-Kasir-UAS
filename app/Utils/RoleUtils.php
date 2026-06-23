<?php

namespace App\Utils;

use function array_key_exists;
use function in_array;

class RoleUtils {

    public const ROLE_MANAGER = "manager";
    public const ROLE_CASHIER = "cashier";
    public const ROLE_SUPPLIER = "supplier";

    public const PERM_CASHIER = "cashier.index";
    public const PERM_MANAGER = "managers.index";
    public const PERM_SUPPLIER = "suppliers.index";
    public const PERM_SHIFT = "employees.shift";
    public const PERM_INVENTORY = "products.index";
    public const PERM_CATEGORY = "categories.index";
    public const PERM_CLIENT = "clients.index";
    public const PERM_DISCOUNT = "discounts.index";

    private static array $list = [
        self::ROLE_CASHIER => [
            self::PERM_CASHIER, self::PERM_SHIFT, self::PERM_DISCOUNT
        ],
        self::ROLE_MANAGER => [
            self::PERM_MANAGER
        ],
        self::ROLE_SUPPLIER => [
            self::PERM_SUPPLIER, self::PERM_INVENTORY, self::PERM_CATEGORY, self::PERM_CLIENT
        ]
    ];

    public static function isPermitted(string $role, string $perm): bool {
        return array_key_exists($role, self::$list) && in_array($perm, self::$list[$role]);
    }

    public static function getAllowedRoutes(string $role): array {
        return self::$list[$role] ?? [];
    }

    public static function getRoles(): array {
    return array_keys(self::$list);
}
}
