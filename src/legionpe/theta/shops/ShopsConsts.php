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
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::POTION_SPEED, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::POTION_STRENGTH, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::POTION_JUMP_BOOST, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::POTION_REGEN, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::POTION_IMMUNITY, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::POTION_FIRE_IMMUNITY, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::POTION_OXYGEN, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::POTION_INVISIBILITY, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::BOMB_KNOCKBACK, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::BOMB_NAUSEA, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::BOMB_SLOWNESS, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::BOMB_WEAKNESS, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::BOMB_WITHER, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::BOMB_POISON, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::BOMB_INSTA_DAMAGE, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::BOMB_VULNERABILITY, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::BOMB_DIARRHEA, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_FIRE_SWORD, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_FLAME_BOW, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_MOMENTUM_SWORD, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_KNOCKBACK_ARROW, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_ELECTRIC_SWORD, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_MAGNETIC_ARROW, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_DIAMOND_CRUSHER_SWORD, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_CARBON_FLATTENER_BOW, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_STICKY_ARMOR, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_THORNED_ARMOR, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_NAILED_BOOTS, new Position(0, 10, 0, $level)),
			new Shop($customer, Settings::CLASS_KITPVP, PvpKitProducts::ENCHANT_PARACHUTE_HELMET, new Position(0, 10, 0, $level)),
		];
	}
}
