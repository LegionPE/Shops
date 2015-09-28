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
	/** @var ShopsSession */
	private $session;
	private $kitId;
	public function __construct(ShopsSession $session, Chest $chestTile, $kitName, $kitId){
		$this->session = $session;
		$this->kitId = $kitId;
		parent::__construct($chestTile, InventoryType::get(InventoryType::DOUBLE_CHEST), [], null, $kitName);
		$this->reloadItems();
	}
	public function openTo(Player $player){
		$player->addWindow($this);
		$this->reloadItems();
	}
	public function sendContents($target){
		$this->reloadItems();
		parent::sendContents($target);
	}
	public function reloadItems(){

	}
}
