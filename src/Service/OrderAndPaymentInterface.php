<?php

namespace MaillotF\Ikentoo\IkentooBridgeBundle\Service;

use MaillotF\Ikentoo\IkentooBridgeBundle\Objects\Menu;

/**
 *
 * @package MaillotF\Ikentoo\IkentooBridgeBundle\Service
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
interface OrderAndPaymentInterface
{

	public function loadMenus(int $businessLocationId): array;

	public function loadMenu(int $businessLocationId, int $menuId, bool $richContent = false): ?Menu;
}
