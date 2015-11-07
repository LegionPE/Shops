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

use legionpe\theta\libkit\LibKitMysqlQueries;
use legionpe\theta\query\LoginDataQuery;

class ShopsLoginDataQuery extends LoginDataQuery{
	protected function onAssocFetched(\mysqli $db, &$row){
		parent::onAssocFetched($db, $row);
		$row = array_merge($row, LibKitMysqlQueries::getLibKitRows($db, $row["uid"]));
	}
}
