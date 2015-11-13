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

use legionpe\theta\libkit\data\ProductDeclaration;
use pocketmine\entity\Entity;
use pocketmine\entity\Item as ItemEntity;
use pocketmine\item\Item;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\network\protocol\AddItemEntityPacket;
use pocketmine\network\protocol\RemoveEntityPacket;

class Shop{
	const QUANTITIFIER = Item::SUGAR_CANES;
	const ANTI_QUANTITIFIER = Item::SUGAR; // TODO not enough relevance
	const QUALIFIER = Item::TALL_GRASS;
	const ANTI_QUALIFIER = Item::DEAD_BUSH;
	const SHOW_INFO = Item::COMPASS;
	const PURCHASE = 329; // saddle, looks like a purse


	// final fields
	/** @var ShopsSession */
	private $customer;
	/** @var ProductDeclaration */
	private $declaration;
	/** @var Position */
	private $position;

	// state fields
	private $quality;
	private $quantity;

	private $eids = [];

	public function __construct(ShopsSession $customer, $class, $productType, Position $position){
		$this->customer = $customer;
		$this->declaration = ProductDeclaration::get($customer->getMain(), $class, $productType);
		$this->position = $position;
		$this->quality = 0;
		$this->quantity = $this->declaration->getQuantityUnit();
	}
	/**
	 * @return ShopsSession
	 */
	public function getCustomer(){
		return $this->customer;
	}
	/**
	 * @return int
	 */
	public function getProductDeclaration(){
		return $this->declaration;
	}
	/**
	 * @return Position
	 */
	public function getPosition(){
		return $this->position;
	}

	public function spawn(){
		$customer = $this->customer->getPlayer();
		$i = 0;
		foreach($this->declaration->getItems($this->quality) as $i => $item){
			$pk = new AddItemEntityPacket;
			$pk->eid = $this->eid($i);
			$pk->item = $item;
			$pk->x = $this->position->x;
			$pk->y = $this->position->y;
			$pk->z = $this->position->z;
			$pk->speedX = 0;
			$pk->speedY = 0;
			$pk->speedZ = 0;
			$customer->dataPacket($pk);
		}
		$i++;
		$lang = $this->declaration->getDescriptionFromLangList($this->customer->getLangs());
		$this->showFTP($i, $this->position, $lang);
	}
	private function showFTP(&$i, Vector3 $pos, $text){
		$pk = new AddEntityPacket();
		$pk->eid = $this->eid($i++);
		$pk->type = ItemEntity::NETWORK_ID;
		$pk->x = $pos->x;
		$pk->y = $pos->y - 0.75;
		$pk->z = $pos->z;
		$pk->speedX = 0;
		$pk->speedY = 0;
		$pk->speedZ = 0;
		$pk->yaw = 0;
		$pk->pitch = 0;
		$pk->item = 0;
		$pk->meta = 0;
		$pk->metadata = [
				Entity::DATA_FLAGS => [Entity::DATA_TYPE_BYTE, 1 << Entity::DATA_FLAG_INVISIBLE],
				Entity::DATA_NAMETAG => [Entity::DATA_TYPE_STRING, $text],
				Entity::DATA_SHOW_NAMETAG => [Entity::DATA_TYPE_BYTE, 1],
				Entity::DATA_NO_AI => [Entity::DATA_TYPE_BYTE, 1]
		];
		$this->customer->getPlayer()->dataPacket($pk);
	}
	public function despawn(){
		$customer = $this->customer->getPlayer();
		foreach($this->eids as $eid){
			$pk = new RemoveEntityPacket;
			$pk->eid = $eid;
			$customer->dataPacket($pk);
		}
	}

	public function getQuality(){
		return $this->quality;
	}
	public function setQuality($quality){
		$this->quality = $quality;
	}
	public function getQuantity(){
		return $this->quantity;
	}
	public function setQuantity($quantity){
		$this->quantity = $quantity;
	}

	private function eid($id){
		if(!(isset($this->eids[$id]))){
			$this->eids[$id] = Entity::$entityCount++;
		}
		return $this->eids[$id];
	}

	public function onClick(Item $item){
		if($item->getId() === self::QUANTITIFIER){
			$this->quantity += $this->declaration->getQuantityUnit();
			$this->despawn();
			$this->spawn();
		}
	}
}
