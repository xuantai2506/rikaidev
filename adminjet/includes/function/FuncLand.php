<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

function countLandNze($id, $user) {
	global $db;
	$count = 0;

	$db->table = "core_user";
	$db->condition = "user_id = " . ($user+0);
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	foreach($rows as $row) {
		if($row['role_id']+0==1 || $row['role_id']+0==11) {
			$db->table = "product";
			$db->condition = "product_menu_id = " . ($id+0);
			$db->order = "";
			$db->limit = "";
			$rows = $db->select();
			$count = $db->RowCount;
		} else {
			$db->table = "product";
			$db->condition = "product_menu_id = " . ($id+0) . " AND user_id = " . ($user+0);
			$db->order = "";
			$db->limit = "";
			$rows = $db->select();
			$count = $db->RowCount;
		}
	}
	return $count;
}

//----------------------------------------------------------------------------------------------------------------------
function loadTypeProject($id = 0) {
	global $db;
	$db->table = "others_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 46";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		echo '<select id="project_type" name="project_type" class="selectpicker" data-live-search="true">';
		foreach($rows as $row) {
			$db->table = "others_menu";
			$db->condition = "is_active = 1 and parent = ".($row['others_menu_id']+0). " and category_id = 46";
			$db->order = "sort ASC";
			$rows_s = $db->select();
			if($db->RowCount > 0) {
				echo '<optgroup label="'.stripslashes($row['name']).'">';
				foreach($rows_s as $row_s) {
					$selected = ($row_s['others_menu_id']+0 == $id) ? ' selected' : '';
					echo '<option value="'.($row_s['others_menu_id']+0).'" '.$selected.'>'.stripslashes($row_s['name']).'</option>';
				}
				echo '</optgroup>';
			} else {
				$selected = ($row['others_menu_id']+0 == $id) ? ' selected' : '';
				echo '<option value="'.($row['others_menu_id']+0).'" '.$selected.'>'.stripslashes($row['name']).'</option>';
			}
		}
		echo '</select>';
	}
}

//----------------------------------------------------------------------------------------------------------------------
function getNameOthers($id = 0) {
	global $db;
	$txt = '';
	$db->table = "others_menu";
	$db->condition = "others_menu_id = " . ($id+0);
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		foreach($rows as $row) {
			$txt = stripslashes($row['name']);
		}
	}
	return $txt;
}

//----------------------------------------------------------------------------------------------------------------------
function loadCity($id = 0) {
	global $db;
	$id_city = 0;
	$db->table = "location_menu";
	$db->condition = "is_active = 1 and location_menu_id = " . $id;
	$db->order = "sort ASC";
	$db->limit = 1;
	$rows = $db->select();
	if($db->RowCount > 0) {
		foreach($rows as $row) {
			$db->table = "location_menu";
			$db->condition = "is_active = 1 and location_menu_id = " . ($row['parent']+0);
			$db->order = "sort ASC";
			$db->limit = 1;
			$rows1 = $db->select();
			if($db->RowCount > 0) {
				foreach($rows1 as $row1) {
					$id_city = $row1['parent']+0;
				}
			}
		}
	}

	$db->table = "location_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 39";
	$db->order = "sort ASC";
	$db->limit = "";
	$rows = $db->select();
	echo '<select id="city_list" name="city" class="form-control" onChange="getDistrict(this.value, \'district_list\', \'location_list\', 1);" required>';
	if($id_city == 0) echo '<option value="" selected="selected">Chọn thành phố/tỉnh...</option>';
	else echo '<option value="">Chọn thành phố/tỉnh...</option>';
	if($db->RowCount > 0) {
		foreach ($rows as $row) {
			if($row['location_menu_id'] + 0 == $id_city) {
				echo '<option selected="selected" value="' . ($row['location_menu_id'] + 0) . '">' . stripslashes($row["name"]) . '</option>';
			}
			else {
				echo '<option value="' . ($row['location_menu_id'] + 0) . '">' . stripslashes($row["name"]) . '</option>';
			}
		}
	}
	echo '</select>';
}

//----------------------------------------------------------------------------------------------------------------------
function loadDistrict($id = 0) {
	global $db;
	$id_city = 0;
	$id_district = 0;
	$db->table = "location_menu";
	$db->condition = "is_active = 1 and location_menu_id = " . $id;
	$db->order = "sort ASC";
	$db->limit = 1;
	$rows = $db->select();
	if($db->RowCount > 0) {
		foreach($rows as $row) {
			$id_district = $row['parent']+0;
			//------------------------------
			$db->table = "location_menu";
			$db->condition = "is_active = 1 and location_menu_id = " . ($row['parent']+0);
			$db->order = "sort ASC";
			$db->limit = 1;
			$rows1 = $db->select();
			if($db->RowCount > 0) {
				foreach($rows1 as $row1) {
					$id_city = $row1['parent']+0;
				}
			}
		}
	}

	$db->table = "location_menu";
	$db->condition = "is_active = 1 and parent = " . $id_city . " and category_id = 39";
	$db->order = "sort ASC";
	$db->limit = "";
	$rows = $db->select();
	echo '<select id="district_list" name="district" class="form-control" onChange="getLocation(this.value, \'location_list\', 2);" required>';
	if($id_district == 0) echo '<option value="" selected="selected">Chọn quận/huyện...</option>';
	else echo '<option value="">Chọn quận/huyện...</option>';
	if($db->RowCount > 0 && $id_city > 0) {
		foreach ($rows as $row) {
			if($row['location_menu_id'] + 0 == $id_district) {
				echo '<option selected="selected" value="' . ($row['location_menu_id'] + 0) . '">' . stripslashes($row["name"]) . '</option>';
			}
			else {
				echo '<option value="' . ($row['location_menu_id'] + 0) . '">' . stripslashes($row["name"]) . '</option>';
			}
		}
	}
	echo '</select>';
}


//----------------------------------------------------------------------------------------------------------------------
function loadLocation($id = 0) {
	global $db;
	$id_district = 0;
	$db->table = "location_menu";
	$db->condition = "is_active = 1 and location_menu_id = " . $id;
	$db->order = "sort ASC";
	$db->limit = 1;
	$rows = $db->select();
	if($db->RowCount > 0) {
		foreach($rows as $row) {
			$id_district = $row['parent']+0;
		}
	}

	$db->table = "location_menu";
	$db->condition = "is_active = 1 and parent = " . $id_district . " and category_id = 39";
	$db->order = "sort ASC";
	$db->limit = "";
	$rows = $db->select();
	echo '<select id="location_list" name="location_id" class="form-control" required>';
	if($id == 0) echo '<option value="" selected="selected">Chọn khu vực...</option>';
	else echo '<option value="">Chọn khu vực...</option>';
	if($db->RowCount > 0  && $id_district > 0) {
		foreach ($rows as $row) {
			if($row['location_menu_id'] + 0 == $id) {
				echo '<option selected="selected" value="' . ($row['location_menu_id'] + 0) . '">' . stripslashes($row["name"]) . '</option>';
			}
			else {
				echo '<option value="' . ($row['location_menu_id'] + 0) . '">' . stripslashes($row["name"]) . '</option>';
			}
		}
	}
	echo '</select>';
}

//----------------------------------------------------------------------------------------------------------------------
function geographicalRadius($id = 0) {
	global $db;
	$db->table = "location_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 40";
	$db->order = "sort ASC";
	$db->limit = "";
	$rows = $db->select();
	echo '<select id="geo_radius" name="geo_radius" class="form-control" required>';
	if($id == 0) echo '<option value="" selected="selected">Chọn vị trí theo bán kính...</option>';
	else echo '<option value="">Chọn vị trí theo bán kính...</option>';
	if($db->RowCount > 0) {
		foreach ($rows as $row) {
			if($row['location_menu_id'] + 0 == $id) {
				echo '<option selected="selected" value="' . ($row['location_menu_id'] + 0) . '">' . stripslashes($row["name"]) . '</option>';
			}
			else {
				echo '<option value="' . ($row['location_menu_id'] + 0) . '">' . stripslashes($row["name"]) . '</option>';
			}
		}
	}
	echo '</select>';
}

//----------------------------------------------------------------------------------------------------------------------
function projectGetUse(array $id) {
	global $db;
	$db->table = "others_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 47";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		$checked = '';
		foreach($rows as $row) {
			if(in_array(($row['others_menu_id']+0), $id)) $checked = 'checked';
			else $checked= '';
			echo '<label class="col-sm-6 col-xs-12 checkbox-inline-0"><input type="checkbox" name="project_use[]" value="'.($row['others_menu_id']+0).'" '.$checked.'> '.stripslashes($row['name']).' </label>';
		}
	}
}


//----------------------------------------------------------------------------------------------------------------------
function projectHot(array $id) {
	global $db;
	$db->table = "others_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 48";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		$checked = '';
		foreach($rows as $row) {
			if(in_array(($row['others_menu_id']+0), $id)) $checked = 'checked';
			else $checked= '';
			echo '<label class="checkbox-inline"><input type="checkbox" name="project_hot[]" value="'.($row['others_menu_id']+0).'" '.$checked.'> '.stripslashes($row['name']).' </label>';
		}
	}
}

//----------------------------------------------------------------------------------------------------------------------
function projectInvolve(array $id) {
	global $db;
	$db->table = "others_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 49";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		$checked = '';
		foreach($rows as $row) {
			if(in_array(($row['others_menu_id']+0), $id)) $checked = 'checked';
			else $checked= '';
			echo '<label class="col-sm-12 col-xs-12 checkbox-inline-0"><input type="checkbox" name="project_involve[]" value="'.($row['others_menu_id']+0).'" '.$checked.'> '.stripslashes($row['name']).' </label>';
		}
	}
}


//----------------------------------------------------------------------------------------------------------------------
function landType($id = 0) {
	global $db;
	$db->table = "product_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 37";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		echo '<select id="land_type" name="land_type" class="selectpicker" data-live-search="true" onchange="onchange_bsd();" required>';
		$selected = ($id == 0) ? ' selected' : '';
		echo '<option value="" disabled '.$selected.'>Chọn loại bất động sản...</option>';
		foreach($rows as $row) {
			$db->table = "product_menu";
			$db->condition = "is_active = 1 and parent = ".($row['product_menu_id']+0). " and category_id = 37";
			$db->order = "sort ASC";
			$rows_s = $db->select();
			if($db->RowCount > 0) {
				echo '<optgroup label="'.stripslashes($row['name']).'">';
				foreach($rows_s as $row_s) {
					$selected = ($row_s['product_menu_id']+0 == $id) ? ' selected' : '';
					echo '<option value="'.($row_s['product_menu_id']+0).'" '.$selected.'>'.stripslashes($row_s['name']).'</option>';
				}
				echo '</optgroup>';
			} else {
				$selected = ($row['product_menu_id']+0 == $id) ? ' selected' : '';
				echo '<option value="'.($row['product_menu_id']+0).'" '.$selected.'>'.stripslashes($row['name']).'</option>';
			}
		}
		echo '</select>';
	}
}

//----------------------------------------------------------------------------------------------------------------------
function landProject($text = '') {
	global $db;
	$list = array();
	$db->table = "prjname";
	$db->condition = "is_active = 1";
	$db->order = "sort ASC";
	$db->limit = "";
	$rows = $db->select('name');
	if($db->RowCount > 0) {
		$i = 0;
		foreach($rows as $row) {
			$list[$i] = $row['name'];
			$i++;
		}
	}
	$list = implode('","', $list);
	echo '<input class="form-control" type="text" id="project" name="project" maxlength="255" value="' . stripslashes($text) . '" data-provide="typeahead" data-items="5" data-source=\'["'. $list .'"]\' required autocomplete="off">';
}

//----------------------------------------------------------------------------------------------------------------------
function landStreet($text = '') {
	global $db;
	$list = array();
	$db->table = "street";
	$db->condition = "is_active = 1";
	$db->order = "sort ASC";
	$db->limit = "";
	$rows = $db->select('name');
	if($db->RowCount > 0) {
		$i = 0;
		foreach($rows as $row) {
			$list[$i] = $row['name'];
			$i++;
		}
	}
	$list = implode('","', $list);
	echo '<input class="form-control" type="text" id="street" name="street" maxlength="255" value="' . stripslashes($text) . '" data-provide="typeahead" data-items="5" data-source=\'["'. $list .'"]\' required autocomplete="off">';
}

//----------------------------------------------------------------------------------------------------------------------
function landRoad($id = 0) {
	global $db;
	$db->table = "road";
	$db->condition = "is_active = 1";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		echo '<select id="road" name="road" class="selectpicker" data-live-search="true" required>';
		$selected = ($id == 0) ? ' selected' : '';
		echo '<option value="" '.$selected.'>Chọn loại...</option>';
		foreach($rows as $row) {
			$selected = ($row['road_id']+0 == $id) ? ' selected' : '';
			echo '<option value="'.($row['road_id']+0).'" '.$selected.'>'.stripslashes($row['name']).'</option>';
		}
		echo '</select>';
		echo '<label for="road" class="error"></label>';
	}
}

//----------------------------------------------------------------------------------------------------------------------
function landDirection($id = 0, $name = 'direction') {
	global $db;
	$db->table = "direction";
	$db->condition = "is_active = 1";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		echo '<select id="'. $name .'" name="'. $name .'" class="selectpicker" data-live-search="true" required>';
		$selected = ($id == 0) ? ' selected' : '';
		echo '<option value="" '.$selected.'>Chọn loại...</option>';
		foreach($rows as $row) {
			$selected = ($row['direction_id']+0 == $id) ? ' selected' : '';
			echo '<option value="'.($row['direction_id']+0).'" '.$selected.'>'.stripslashes($row['name']).'</option>';
		}
		echo '</select>';
		echo '<label for="'. $name .'" class="error"></label>';
	}
}

//----------------------------------------------------------------------------------------------------------------------
function purposeUseLand(array $id) {
	global $db;
	$db->table = "others_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 42";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		$checked = '';
		foreach($rows as $row) {
			if(in_array(($row['others_menu_id']+0), $id)) $checked = 'checked';
			else $checked= '';
			echo '<label class="col-sm-6 col-xs-12 checkbox-inline-0"><input type="checkbox" class="purpose_use_land" name="purpose_use_land[]" value="'.($row['others_menu_id']+0).'" '.$checked.' required> '.stripslashes($row['name']).' </label>';
		}
		echo '<label for="purpose_use_land[]" class="error"></label>';
	}
}

//----------------------------------------------------------------------------------------------------------------------
function lawLand($id = 0) {
	global $db;
	$db->table = "others_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 43";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		$checked = '';
		foreach($rows as $row) {
			if(($row['others_menu_id']+0) == $id) $checked = 'checked';
			else $checked= '';
			echo '<label class="col-sm-6 col-xs-12 radio-inline-0"><input type="radio" class="law_land" name="law_land" value="'.($row['others_menu_id']+0).'" '.$checked.' required> '.stripslashes($row['name']).' </label>';
		}
		echo '<label for="law_land" class="error"></label>';
	}
}

//----------------------------------------------------------------------------------------------------------------------
function infrastructureLand($id = 0) {
	global $db;
	$db->table = "others_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 44";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		$checked = '';
		foreach($rows as $row) {
			if(($row['others_menu_id']+0) == $id) $checked = 'checked';
			else $checked= '';
			echo '<label class="col-sm-6 col-xs-12 radio-inline-0"><input type="radio" class="infrastructure_land" name="infrastructure_land" value="'.($row['others_menu_id']+0).'" '.$checked.'> '.stripslashes($row['name']).' </label>';
		}
	}
}


//----------------------------------------------------------------------------------------------------------------------
function typeHouseLand($id = 0) {
	global $db;
	$db->table = "others_menu";
	$db->condition = "is_active = 1 and parent = 0 and category_id = 45";
	$db->order = "sort ASC";
	$rows = $db->select();
	if($db->RowCount > 0) {
		$checked = '';
		foreach($rows as $row) {
			if(($row['others_menu_id']+0) == $id) $checked = 'checked';
			else $checked= '';
			echo '<label class="col-sm-6 col-xs-12 radio-inline-0"><input type="radio" class="type_house" name="type_house" value="'.($row['others_menu_id']+0).'" '.$checked.'> '.stripslashes($row['name']).' </label>';
		}
	}
}