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

use legionpe\theta\config\Settings;
use legionpe\theta\Session;
use pocketmine\block\Block;
use pocketmine\entity\Effect;
use pocketmine\event\inventory\InventoryOpenEvent;
use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\inventory\ChestInventory;
use pocketmine\math\Vector3;
use pocketmine\Player;

class ShopsSession extends Session{
	/** @var ShopsPlugin */
	private $main;
	public function __construct(ShopsPlugin $main, Player $player, array $loginData){
		$this->main = $main;
		parent::__construct($player, $loginData);
	}
	public function login($method){
		parent::login($method);
		$this->getPlayer()->removeAllEffects();
		$this->getPlayer()->addEffect(Effect::getEffect(Effect::MINING_FATIGUE)->setVisible(false)->setDuration(0x7FFFFF)->setAmplifier(0x7F));
	}
	public function getMain(){
		return $this->main;
	}
	public function onTransaction(InventoryTransactionEvent $event){
		if(!parent::onTransaction($event)){
			return false;
		}
		$chest = null;
		foreach($event->getTransaction()->getInventories() as $inv){
			if($inv instanceof ChestInventory){
				$chest = $inv;
			}
		}
		$tile = $chest->getHolder();
		$class = self::getClassFromCoords($tile);
		if($class !== Settings::CLASS_ALL){
			return false;
		}
		return true;
	}
	public function onOpenInv(InventoryOpenEvent $event){
		if(!parent::onOpenInv($event)){
			return false;
		}
		$inv = $event->getInventory();
		if($inv instanceof ChestInventory){
			$class = self::getClassFromCoords($inv->getHolder());
		}
		return true;
	}
	public function onInteract(PlayerInteractEvent $event){
		if(!parent::onInteract($event)){
			return false;
		}
		if($event->getAction() !== PlayerInteractEvent::RIGHT_CLICK_BLOCK){
			return false;
		}
		$block = $event->getBlock();
		$item = $event->getItem();
		if($block->getId() === Block::CHEST){
			return true;
		}
		if($item->getId() === Block::SIGN_POST or $item->getId() === Block::WALL_SIGN){
			return true;
		}
		return false;
	}

	public static function getClassFromCoords(/** @noinspection PhpUnusedParameterInspection */
		Vector3 $v){
		return Settings::CLASS_ALL;
	}
}
