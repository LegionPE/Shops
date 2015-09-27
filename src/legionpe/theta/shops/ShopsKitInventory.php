<?php

/*
 * LegionPE
 *
 * Copyright (C) 2015 LegendsOfMCPE and contributors
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PEMapModder
 */

namespace legionpe\theta\shops;

use pocketmine\inventory\CustomInventory;
use pocketmine\inventory\InventoryType;
use pocketmine\Player;
use pocketmine\tile\Chest;

class ShopsKitInventory extends CustomInventory{
	public function __construct(Chest $chestTile, $kitName){
		parent::__construct($chestTile, InventoryType::get(InventoryType::DOUBLE_CHEST), [], null, $kitName);
	}
	public function openTo(Player $player){
		$player->addWindow($this);
	}
}
