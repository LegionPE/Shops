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

use legionpe\theta\BasePlugin;
use legionpe\theta\libkit\data\kitpvp\PvpKitProducts;
use pocketmine\Player;

class ShopsPlugin extends BasePlugin{
	public function onEnable(){
		parent::onEnable();
		PvpKitProducts::init($this);
	}
	protected function createSession(Player $player, array $loginData){
		return new ShopsSession($this, $player, $loginData);
	}
	public function query_world(){
		return "shops";
	}
	public function sendFirstJoinMessages(Player $player){
		// TODO: Implement sendFirstJoinMessages() method.
	}
	public function getLoginQueryImpl(){
		return ShopsLoginDataQuery::class;
	}
}

/*
 * TODO
 * - customize sword and food configs
 */
