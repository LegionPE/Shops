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
use pocketmine\level\Position;

class Shop{
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
}
