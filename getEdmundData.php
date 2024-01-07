<?php 
//error_reporting(E_ALL); ini_set('display_errors', TRUE); ini_set('display_startup_errors', TRUE);
	require_once("includes/config.inc.php"); 
	if(!empty($_REQUEST['makenicename']) && !empty($_REQUEST['modelnicename'])) {
		
		$sql = mysql_query("select id from endmunds_car_basic_info where make_nicename='".$_REQUEST['makenicename']."' and model_nicename='".$_REQUEST['modelnicename']."' and year_year='".$_REQUEST['modelyear']."' limit 1") ;
		$row_info = mysql_fetch_assoc ($sql);
		
		
		if(empty($row_info)) {
		
			$modelsStr = file_get_contents("https://api.edmunds.com/api/vehicle/v2/".rawurlencode($_REQUEST['makenicename'])."/".rawurlencode($_REQUEST['modelnicename'])."/".$_REQUEST['modelyear']."/styles?state=new&view=full&fmt=json&api_key=rs5hb8wwnhm3us3mhq9auj2p");
			 
			// exit;
			
			$newCarMakesArr = json_decode($modelsStr);
			
			if(!empty($newCarMakesArr)) {
				foreach($newCarMakesArr->styles as $newCarMakesAr) {
					
					$tmp_exterior_color_arr = array();
					$tmp_interior_color_arr = array();
					
					
					if($newCarMakesAr->colors[0]->category == 'Interior') {
						if(!empty($newCarMakesAr->colors[0]->options)) {
							$interior_color_arr = array();
							foreach($newCarMakesAr->colors[0]->options as $color) {
								
								if(!empty($color->colorChips->primary->hex)) {
									if(!in_array($color->colorChips->primary->hex,$tmp_interior_color_arr)) {
										$tmp_interior_color_arr[] = $color->colorChips->primary->hex;
										$interior_color_arr[] = $color->colorChips->primary->hex.'#'.current(explode("/", $color->name));			
									}
								}
								
								if(!in_array($color->fabricTypes[0]->value,$interior_fabric_arr)) {
									$interior_fabric_arr[] = $color->fabricTypes[0]->value;	
								}
							}	
						}
					}
					
					else if($newCarMakesAr->colors[0]->category == 'Exterior') {
						if(!empty($newCarMakesAr->colors[0]->options)) {
							$exterior_color_arr = array();
							foreach($newCarMakesAr->colors[0]->options as $color) {
								if(!empty($color->colorChips->primary->hex)) {
									if(!in_array($color->colorChips->primary->hex,$tmp_exterior_color_arr)) {
										$tmp_exterior_color_arr[] = $color->colorChips->primary->hex;
										$exterior_color_arr[] = $color->colorChips->primary->hex.'#'.current(explode("/", $color->name));			
									}
								}
							}	
						}
					}
					
					if($newCarMakesAr->colors[1]->category == 'Interior') {
						if(!empty($newCarMakesAr->colors[1]->options)) {
							$interior_color_arr = array();
							foreach($newCarMakesAr->colors[1]->options as $color) {
								
								if(!empty($color->colorChips->primary->hex)) {
									if(!in_array($color->colorChips->primary->hex,$tmp_interior_color_arr)) {
										$tmp_interior_color_arr[] = $color->colorChips->primary->hex;
										$interior_color_arr[] = $color->colorChips->primary->hex.'#'.current(explode("/", $color->name));			
									}
								}
								
								if(!in_array($color->fabricTypes[0]->value,$interior_fabric_arr)) {
									$interior_fabric_arr[] = $color->fabricTypes[0]->value;	
								}	
							}	
						}
					}
					
					else if($newCarMakesAr->colors[1]->category == 'Exterior') {
						if(!empty($newCarMakesAr->colors[1]->options)) {
							$exterior_color_arr = array();
							foreach($newCarMakesAr->colors[1]->options as $color) {
								if(!empty($color->colorChips->primary->hex)) {
									if(!in_array($color->colorChips->primary->hex,$tmp_exterior_color_arr)) {
										$tmp_exterior_color_arr[] = $color->colorChips->primary->hex;
										$exterior_color_arr[] = $color->colorChips->primary->hex.'#'.current(explode("/", $color->name));		
									}
								}
							}	
						}
					}
					
					/*mysql_query("INSERT INTO `tmp_con_selections` (`id`, `user_session_id`, `make`, `model`, `year`, `styleid`, `name`, `engine`, `transmission`, `year`, `drivenWheels`, `numOfDoors`, `interior_color`, `exterior_color`, `body_type`, `trim`, `interior_fabric`, `opt_interior`, `opt_exterior`, `opt_additional_fees`, `opt_mechanical`, `opt_safety`, `opt_package`, `created`) VALUES (NULL, '".session_id()."', '".$_GET['makenicename']."', '".$_GET['modelnicename']."', '".$_GET['modelyear']."', '".$newCarMakesAr->id."', '".$newCarMakesAr->name."', '".$newCarMakesAr->engine->name."', '".$newCarMakesAr->transmission->numberOfSpeeds." speed ".$newCarMakesAr->transmission->transmissionType."', '".$newCarMakesAr->year->year."', '".$newCarMakesAr->drivenWheels."', '".$newCarMakesAr->numOfDoors."', '".implode("##",$interior_color_arr)."', '".implode("##",$exterior_color_arr)."', '".$newCarMakesAr->submodel->body."', '".$newCarMakesAr->trim."', '".implode("##",$interior_fabric_arr)."', '".implode("##",$opt_interior_arr)."', '".implode("##",$opt_exterior_arr)."', '".implode("##",$opt_additional_fees_arr)."', '".implode("##",$opt_mechanical_arr)."', '".implode("##",$opt_safety_arr)."', '".implode("##",$opt_package_arr)."', '".time()."')");*/
					
					mysql_query("INSERT INTO `endmunds_car_basic_info` set id='',
																	`make_id`='".$newCarMakesAr->make->id."',
																	`make_name`='".$newCarMakesAr->make->name."',
																	`make_nicename`='".$newCarMakesAr->make->niceName."',
																	`make_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->make))."',
																	`model_id`='".$newCarMakesAr->model->id."',
																	`model_name`='".$newCarMakesAr->model->name."',
																	`model_nicename`='".$newCarMakesAr->model->niceName."',
																	`model_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->model))."',
																	`engine_id`='".$newCarMakesAr->engine->id."',
																	`engine_name`='".$newCarMakesAr->engine->name."',
																	`engine_equipmentType`='".$newCarMakesAr->engine->equipmentType."',
																	`engine_compressionRatio`='".$newCarMakesAr->engine->compressionRatio."',
																	`engine_cylinder`='".$newCarMakesAr->engine->cylinder."',
																	`engine_size`='".$newCarMakesAr->engine->size."',
																	`engine_displacement`='".$newCarMakesAr->engine->displacement."',
																	`engine_configuration`='".$newCarMakesAr->engine->configuration."',
																	`engine_fuelType`='".$newCarMakesAr->engine->fuelType."',
																	`engine_horsepower`='".$newCarMakesAr->engine->horsepower."',
																	`engine_torque`='".$newCarMakesAr->engine->torque."',
																	`engine_totalValves`='".$newCarMakesAr->engine->totalValves."',
																	`engine_manufacturerEngineCode`='".$newCarMakesAr->engine->manufacturerEngineCode."',
																	`engine_type`='".$newCarMakesAr->engine->type."',
																	`engine_code`='".$newCarMakesAr->engine->code."',
																	`engine_compressorType`='".$newCarMakesAr->engine->compressorType."',
																	`engine_rpm_horsepower`='".$newCarMakesAr->engine->rpm->horsepower."',
																	`engine_rpm_torque`='".$newCarMakesAr->engine->rpm->torque."',
																	`engine_valve_timing`='".$newCarMakesAr->engine->valve->timing."',
																	`engine_valve_gear`='".$newCarMakesAr->engine->valve->gear."',
																	`engine_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->engine))."',
																	`transmission_id`='".$newCarMakesAr->transmission->id."',
																	`transmission_name`='".$newCarMakesAr->transmission->name."',
																	`transmission_equipmentType`='".$newCarMakesAr->transmission->equipmentType."',
																	`transmission_automaticType`='".$newCarMakesAr->transmission->automaticType."',
																	`transmission_transmissionType`='".$newCarMakesAr->transmission->transmissionType."',
																	`transmission_numberOfSpeeds`='".$newCarMakesAr->transmission->numberOfSpeeds."',
																	`transmission_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->transmission))."',
																	`drivenWheels`='".$newCarMakesAr->drivenWheels."',
																	`numOfDoors`='".$newCarMakesAr->numOfDoors."',
																	`manufacturerCode`='".$newCarMakesAr->manufacturerCode."',
																	`price_baseMSRP`='".$newCarMakesAr->price->baseMSRP."',
																	`price_baseInvoice`='".$newCarMakesAr->price->baseInvoice."',
																	`price_deliveryCharges`='".$newCarMakesAr->price->deliveryCharges."',
																	`price_estimateTmv`='".$newCarMakesAr->price->estimateTmv."',
																	`price_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->price))."',
																	`categories_market`='".$newCarMakesAr->categories->market."',
																	`categories_EPAClass`='".$newCarMakesAr->categories->EPAClass."',
																	`categories_vehicleSize`='".$newCarMakesAr->categories->vehicleSize."',
																	`categories_primaryBodyType`='".$newCarMakesAr->categories->primaryBodyType."',
																	`categories_vehicleStyle`='".$newCarMakesAr->categories->vehicleStyle."',
																	`categories_vehicleType`='".$newCarMakesAr->categories->vehicleType."',
																	`categories_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->categories))."',
																	`styleid`='".$newCarMakesAr->id."',
																	`name`='".$newCarMakesAr->name."',
																	`year_id`='".$newCarMakesAr->year->id."',
																	`year_year`='".$newCarMakesAr->year->year."',
																	`year_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->year))."',
																	`submodel_body`='".$newCarMakesAr->submodel->body."',
																	`submodel_modelName`='".$newCarMakesAr->submodel->modelName."',
																	`submodel_niceName`='".$newCarMakesAr->submodel->niceName."',
																	`submodel_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->submodel))."',
																	`trim`='".$newCarMakesAr->trim."',
																	`states_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->states))."',
																	`squishVins_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->squishVins))."',
																	`MPG_highway`='".$newCarMakesAr->MPG->highway."',
																	`MPG_city`='".$newCarMakesAr->MPG->city."',
																	`MPG_json`='".mysql_real_escape_string(json_encode($newCarMakesAr->MPG))."',
																	`interior_color`='".implode("##",$interior_color_arr)."',
																	`exterior_color`='".implode("##",$exterior_color_arr)."',
																	`body_type`='".$newCarMakesAr->submodel->body."',
																	`interior_fabric`='".implode("##",$interior_fabric_arr)."',
																	`opt_interior`='".implode("##",$opt_interior_arr)."',
																	`opt_exterior`='".implode("##",$opt_exterior_arr)."',
																	`opt_additional_fees`='".implode("##",$opt_additional_fees_arr)."',
																	`opt_mechanical`='".implode("##",$opt_mechanical_arr)."',
																	`opt_safety`='".implode("##",$opt_safety_arr)."',
																	`opt_package`='".implode("##",$opt_package_arr)."',
																	`total_edmunds_data`='".mysql_real_escape_string($modelsStr)."',
																	`created`='".time()."'");
					
					
					$main_inserted_id = mysql_insert_id();
					
					
					$opt_interior_arr = array();
					$opt_exterior_arr = array();
					$opt_additional_fees_arr = array();
					$opt_mechanical_arr = array();
					$opt_safety_arr = array();
					$opt_package_arr = array();
					
					$interior_fabric_arr = array();
					
					if(!empty($newCarMakesAr->options)) {
						foreach($newCarMakesAr->options as $option) {
							if($option->category == 'Interior') {
								if(!empty($option->options)) {
									foreach($option->options as $optionvar) {
										if(!in_array($optionvar->name,$opt_interior_arr)) {
											$opt_interior_arr[] = $optionvar->name;
											
											mysql_query("INSERT INTO `endmunds_car_options` (`id`, `endmunds_car_basic_info_id`,  `category`, `styleid`, `trim`, `opt_interior`, `opt_exterior`, `opt_additional_fees`, `opt_mechanical`, `opt_safety`, `opt_package`, `created`) VALUES (NULL, '".$main_inserted_id."', '".$option->category."', '".$newCarMakesAr->id."', '".$newCarMakesAr->trim."', '".$optionvar->name."', '', '', '', '', '', '".time()."')");
											
										}
									}
								}
							}
						}
						
						
						foreach($newCarMakesAr->options as $option) {
							if($option->category == 'Exterior') {
								if(!empty($option->options)) {
									foreach($option->options as $optionvar) {
										if(!in_array($optionvar->name,$opt_exterior_arr)) {
											$opt_exterior_arr[] = $optionvar->name;
											
											mysql_query("INSERT INTO `endmunds_car_options` (`id`, `endmunds_car_basic_info_id`, `category`, `styleid`, `trim`, `opt_interior`, `opt_exterior`, `opt_additional_fees`, `opt_mechanical`, `opt_safety`, `opt_package`, `created`) VALUES (NULL, '".$main_inserted_id."', '".$option->category."', '".$newCarMakesAr->id."', '".$newCarMakesAr->trim."', '', '".$optionvar->name."', '', '', '', '', '".time()."')");
										}
									}
								}
							}
						}
						
						
						foreach($newCarMakesAr->options as $option) {
							if($option->category == 'Additional Fees') {
								if(!empty($option->options)) {
									foreach($option->options as $optionvar) {
										if(!in_array($optionvar->name,$opt_additional_fees_arr)) {
											$opt_additional_fees_arr[] = $optionvar->name;
											
											mysql_query("INSERT INTO `endmunds_car_options` (`id`, `endmunds_car_basic_info_id`, `category`, `styleid`, `trim`, `opt_interior`, `opt_exterior`, `opt_additional_fees`, `opt_mechanical`, `opt_safety`, `opt_package`, `created`) VALUES (NULL, '".$main_inserted_id."', '".$option->category."', '".$newCarMakesAr->id."', '".$newCarMakesAr->trim."', '', '', '".$optionvar->name."', '', '', '', '".time()."')");
										}
									}
								}
							}
						}
						
						
						foreach($newCarMakesAr->options as $option) {
							if($option->category == 'Mechanical') {
								if(!empty($option->options)) {
									foreach($option->options as $optionvar) {
										if(!in_array($optionvar->name,$opt_mechanical_arr)) {
											$opt_mechanical_arr[] = $optionvar->name;
											
											mysql_query("INSERT INTO `endmunds_car_options` (`id`, `endmunds_car_basic_info_id`, `category`, `styleid`, `trim`, `opt_interior`, `opt_exterior`, `opt_additional_fees`, `opt_mechanical`, `opt_safety`, `opt_package`, `created`) VALUES (NULL, '".$main_inserted_id."', '".$option->category."', '".$newCarMakesAr->id."', '".$newCarMakesAr->trim."', '', '', '', '".$optionvar->name."', '', '', '".time()."')");
										}
									}
								}
							}
						}
						
						
						foreach($newCarMakesAr->options as $option) {
							if($option->category == 'Safety') {
								if(!empty($option->options)) {
									foreach($option->options as $optionvar) {
										if(!in_array($optionvar->name,$opt_safety_arr)) {
											$opt_safety_arr[] = $optionvar->name;
											
											mysql_query("INSERT INTO `endmunds_car_options` (`id`, `endmunds_car_basic_info_id`, `category`, `styleid`, `trim`, `opt_interior`, `opt_exterior`, `opt_additional_fees`, `opt_mechanical`, `opt_safety`, `opt_package`, `created`) VALUES (NULL, '".$main_inserted_id."', '".$option->category."', '".$newCarMakesAr->id."', '".$newCarMakesAr->trim."', '', '', '', '', '".$optionvar->name."', '', '".time()."')");
										}
									}
								}
							}
						}
						
						foreach($newCarMakesAr->options as $option) {
							if($option->category == 'Package') {
								if(!empty($option->options)) {
									foreach($option->options as $optionvar) {
										if(!in_array($optionvar->name,$opt_package_arr)) {
											$opt_package_arr[] = $optionvar->name;
											
											mysql_query("INSERT INTO `endmunds_car_options` (`id`, `endmunds_car_basic_info_id`, `category`, `styleid`, `trim`, `opt_interior`, `opt_exterior`, `opt_additional_fees`, `opt_mechanical`, `opt_safety`, `opt_package`, `created`) VALUES (NULL, '".$main_inserted_id."', '".$option->category."', '".$newCarMakesAr->id."', '".$newCarMakesAr->trim."', '', '', '', '', '', '".$optionvar->name."', '".time()."')");
										}
									}
								}
							}
						}
							
					}
					
				
				}	
			}
			
		}
		
		/*$sql = "SELECT distinct engine FROM `tmp_con_selections` where user_session_id='".session_id()."' order by engine asc";
		$result = mysql_query($sql);
		$distinct_engine_arr = array();
		while($row = mysql_fetch_assoc($result)) {
			$distinct_engine_arr[] = $row;
		}
		
		
		$sql = "SELECT distinct transmission FROM `tmp_con_selections` where user_session_id='".session_id()."' order by transmission asc";
		$result = mysql_query($sql);
		$distinct_transmission_arr = array();
		while($row = mysql_fetch_assoc($result)) {
			$distinct_transmission_arr[] = $row;
		}
		
		
		$sql = "SELECT distinct drivenWheels FROM `tmp_con_selections` where user_session_id='".session_id()."' order by drivenWheels asc";
		$result = mysql_query($sql);
		$distinct_drivenWheels_arr = array();
		while($row = mysql_fetch_assoc($result)) {
			$distinct_drivenWheels_arr[] = $row;
		}
		
		
		$sql = "SELECT distinct numOfDoors FROM `tmp_con_selections` where user_session_id='".session_id()."' order by numOfDoors asc";
		$result = mysql_query($sql);
		$distinct_doors_arr = array();
		while($row = mysql_fetch_assoc($result)) {
			$distinct_doors_arr[] = $row;
		}
		
		
		$sql = "SELECT distinct body_type FROM `tmp_con_selections` where user_session_id='".session_id()."' order by body_type asc";
		$result = mysql_query($sql);
		$distinct_body_arr = array();
		while($row = mysql_fetch_assoc($result)) {
			$distinct_body_arr[] = $row;
		}
		
		
		$sql = "SELECT distinct trim FROM `tmp_con_selections` where user_session_id='".session_id()."' order by trim asc";
		$result = mysql_query($sql);
		$distinct_trim_arr = array();
		while($row = mysql_fetch_assoc($result)) {
			$distinct_trim_arr[] = $row;
		}*/
		
	}
	/*print_r($newCarMakesArr);
	exit;*/
	
	/*print_r($interior_color_arr);
				exit;*/
	
	
	/*$sql = "SELECT * FROM `tmp_con_selections` where user_session_id='".session_id()."' order by name asc";
	$result = mysql_query($sql);
	$carsLists = array();
	while($row = mysql_fetch_assoc($result)) {
		$carsLists[] = $row;
	}
	
	$ex_color_arr = array();
	if(!empty($carsLists)) {
		//print_r($carsLists);
		//exit;
		foreach($carsLists as $carsList) {
			$tmp_ex_arr = explode("##",$carsList['exterior_color']);
			if(!empty($tmp_ex_arr)) {
				foreach($tmp_ex_arr as $tmp_ex_ar) {
					if(!empty($tmp_ex_ar)) {
						if(!in_array(strtok($tmp_ex_ar, '#'),$tmp_ex_color_arr))	{
							$tmp_ex_color_arr[] = strtok($tmp_ex_ar, '#');
							$ex_color_arr[] = $tmp_ex_ar;	
						}
					}
				}	
			}
		}
	}
	
	//strtok($mystring, '/')
	
	$in_color_arr = array();
	if(!empty($carsLists)) {
		foreach($carsLists as $carsList) {
			$tmp_in_arr = explode("##",$carsList['interior_color']);
			if(!empty($tmp_in_arr)) {
				foreach($tmp_in_arr as $tmp_in_ar) {
					if(!empty($tmp_in_ar)) {
						if(!in_array(strtok($tmp_in_ar, '#'),$tmp_in_color_arr))	{
							$tmp_in_color_arr[] = strtok($tmp_in_ar, '#');
							$in_color_arr[] = $tmp_in_ar;	
						}
					}
					
				}	
			}
		}
	}
	
	
	
	$distinct_interior_fabric_arr = array();
	if(!empty($carsLists)) {
		foreach($carsLists as $carsList) {
			$tmp_ex_arr = explode("##",$carsList['interior_fabric']);
			if(!empty($tmp_ex_arr)) {
				foreach($tmp_ex_arr as $tmp_ex_ar) {
					if(!in_array($tmp_ex_ar,$distinct_interior_fabric_arr))	{
						$distinct_interior_fabric_arr[] = $tmp_ex_ar;	
					}
				}	
			}
		}
	}
	
	
	
	$distinct_opt_interior_arr = array();
	if(!empty($carsLists)) {
		foreach($carsLists as $carsList) {
			if(!empty($carsList['opt_interior'])) {
				$tmp_ex_arr = explode("##",$carsList['opt_interior']);
				if(!empty($tmp_ex_arr)) {
					foreach($tmp_ex_arr as $tmp_ex_ar) {
						if(!in_array($tmp_ex_ar,$distinct_opt_interior_arr))	{
							$distinct_opt_interior_arr[] = $tmp_ex_ar;	
						}
					}	
				}
			}
		}
	}
	
	
	
	$distinct_opt_exterior_arr = array();
	if(!empty($carsLists)) {
		foreach($carsLists as $carsList) {
			if(!empty($carsList['opt_exterior'])) {
				$tmp_ex_arr = explode("##",$carsList['opt_exterior']);
				if(!empty($tmp_ex_arr)) {
					foreach($tmp_ex_arr as $tmp_ex_ar) {
						if(!in_array($tmp_ex_ar,$distinct_opt_exterior_arr))	{
							$distinct_opt_exterior_arr[] = $tmp_ex_ar;	
						}
					}	
				}
			}
		}
	}
	
	
	
	$distinct_opt_additional_fees_arr = array();
	if(!empty($carsLists)) {
		foreach($carsLists as $carsList) {
			if(!empty($carsList['opt_additional_fees'])) {
				$tmp_ex_arr = explode("##",$carsList['opt_additional_fees']);
				if(!empty($tmp_ex_arr)) {
					foreach($tmp_ex_arr as $tmp_ex_ar) {
						if(!in_array($tmp_ex_ar,$distinct_opt_additional_fees_arr))	{
							$distinct_opt_additional_fees_arr[] = $tmp_ex_ar;	
						}
					}	
				}
			}
		}
	}
	
	
	$distinct_opt_mechanical_arr = array();
	if(!empty($carsLists)) {
		foreach($carsLists as $carsList) {
			if(!empty($carsList['opt_mechanical'])) {
				$tmp_ex_arr = explode("##",$carsList['opt_mechanical']);
				if(!empty($tmp_ex_arr)) {
					foreach($tmp_ex_arr as $tmp_ex_ar) {
						if(!in_array($tmp_ex_ar,$distinct_opt_mechanical_arr))	{
							$distinct_opt_mechanical_arr[] = $tmp_ex_ar;	
						}
					}	
				}
			}
		}
	}
	
	
	$distinct_opt_safety_arr = array();
	if(!empty($carsLists)) {
		foreach($carsLists as $carsList) {
			if(!empty($carsList['opt_safety'])) {
				$tmp_ex_arr = explode("##",$carsList['opt_safety']);
				if(!empty($tmp_ex_arr)) {
					foreach($tmp_ex_arr as $tmp_ex_ar) {
						if(!in_array($tmp_ex_ar,$distinct_opt_safety_arr))	{
							$distinct_opt_safety_arr[] = $tmp_ex_ar;	
						}
					}	
				}
			}
		}
	}
	
	
	$distinct_opt_package_arr = array();
	if(!empty($carsLists)) {
		foreach($carsLists as $carsList) {
			if(!empty($carsList['opt_package'])) {
				$tmp_ex_arr = explode("##",$carsList['opt_package']);
				if(!empty($tmp_ex_arr)) {
					foreach($tmp_ex_arr as $tmp_ex_ar) {
						if(!in_array($tmp_ex_ar,$distinct_opt_package_arr))	{
							$distinct_opt_package_arr[] = $tmp_ex_ar;	
						}
					}	
				}
			}
		}
	}*/
	
	
	
	/*print_r($ex_color_arr);
	exit;*/
?>

<?php echo '<br/>Data insertion done from Edmunds'; ?><br/>
<a href="<?php echo site_url ?>">Go to Homepage</a>
</body>
</html>