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

use legionpe\theta\libkit\GlobalKit;
use legionpe\theta\query\LoginDataQuery;

class ShopsLoginDataQuery extends LoginDataQuery{
	protected function onAssocFetched(\mysqli $db, &$row){
		parent::onAssocFetched($db, $row);
//		$row["products"] = $this->queryProducts($db, (int) $row["uid"]);
//		$row["kits"] = $this->queryKits($db, (int) $row["uid"]);
	}
	protected function queryKits(\mysqli $db, $uid){
		$kits = []; // Kit $products[$class][$kitid]
		$result = $db->query("SELECT category,slot,name,value FROM kits WHERE uid=$uid");
		$rows = []; // $rows[$class][$kitid][$category][$slot]
		while(is_array($row = $result->fetch_assoc())){
			$class = (int) $row["class"];
			$kitid = (int) $row["kitid"];
			$category = (int) $row["category"];
			$slot = (int) $row["slot"];
			$rows[$class][$kitid][$category][$slot] = $row;
		}
		$result->close();
		foreach($rows as $class => $kits){
			foreach($kits as $kitid => $cats){
				$kit = new GlobalKit($class, $kitid);
				$kit->importCategorizedRows($cats);
			}
		}
		return $kits;
	}

}
