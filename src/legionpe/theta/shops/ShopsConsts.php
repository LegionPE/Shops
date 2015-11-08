<?php

/*
 * LegionPE
 *
 * Copyright (C) 2015 PEMapModder
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PEMapModder
 */

namespace legionpe\theta\shops;

use legionpe\theta\config\Settings;
use legionpe\theta\libkit\data\kitpvp\PvpKitProducts;
use pocketmine\level\Position;

final class ShopsConsts{
	public static function getShops(ShopsSession $customer){
		$level = $customer->getMain()->getServer()->getLevelByName("world_shops");
		return [
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ARMOR_HELMET, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ARMOR_CHESTPLATE, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ARMOR_LEGGINGS, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ARMOR_BOOTS, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::INV_SWORD, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::INV_FOOD, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::INV_ARROW, new Position(0, 10, 0, $level)),
			// TODO more
		];
	}
}
