<?php
	//Establishing connection with database
	$conn = mysql_connect("localhost", "root");
	if(!$conn){
		echo "Error while establishing connection with database";
		exit();
	}
	$db = mysql_select_db("construction_site");
	if(!$db){
		echo "Error while selection appropriate database";
		exit();
	}

	//building insertion query
	$table_struct = ["emp_id", "fname", "lname", "house_no", "lane", "area", "city", "dob", "gender", "designation", "tos", "email", "salary", "dot", "hrs_w", "hrly_rate", "floor_w"];
	$values = "";
	$check_v = 0;
	for($q=0; $q!=sizeof($table_struct); $q++){
		if($_POST[$table_struct[$q]]!=""){
			if($q==3 || $q==12 || $q==14 || $q==15 || $q==16)
				$values = $check_v==0? $values.$_POST[$table_struct[$q]]: $values.", ".$_POST[$table_struct[$q]];
			else
				$values = $check_v==0? $values.'"'.$_POST[$table_struct[$q]].'"': $values.', "'.$_POST[$table_struct[$q]].'"';
			$check_v = 1;
		}
		else
			$values = $values.", NULL";
	}

	//performing insertion
	$query = "insert into emp_details values (".$values.")";
	$result = mysql_query($query);
	if($result)
		echo "Insertion succesful";
	else
		echo "Error during insertion";
?>