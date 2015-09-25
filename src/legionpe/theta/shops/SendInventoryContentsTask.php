<?php

/*
 * LegionPE
 *
 * Copyright (C) 2015 PEMapModder and contributors
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PEMapModder
 */

namespace legionpe\theta\shops;

use pocketmine\inventory\ChestInventory;
use pocketmine\item\Item;
use pocketmine\network\protocol\ContainerSetContentPacket;
use pocketmine\scheduler\PluginTask;

class SendInventoryContentsTask extends PluginTask{
	/** @var ShopsPlugin */
	public $owner;
	/** @var ShopsSession */
	public $session;
	/** @var ChestInventory */
	public $chest;
	/** @var Item[] */
	public $items;

	public function onRun($t){
		if($this->session->getPlayer()->isOnline()){
			return;
		}
		$pk = new ContainerSetContentPacket;
		$pk->windowid = $this->session->getPlayer()->getWindowId($this->chest);
		if($pk->windowid === -1){
			return;
		}
		$pk->slots = $this->items;
		$this->session->getPlayer()->dataPacket($pk);
	}
}
