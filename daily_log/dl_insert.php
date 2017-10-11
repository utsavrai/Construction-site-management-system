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
	$table_struct = ["floor", "date", "mat_n", "mat_q", "funds", "per_comp"];
	$values = "";
	$check_v = 0;
	for($q=0; $q!=sizeof($table_struct); $q++){
		if($_POST[$table_struct[$q]]!=""){
			if($q==0 || $q==4 || $q==5)
				$values = $check_v==0? $values.$_POST[$table_struct[$q]]: $values.", ".$_POST[$table_struct[$q]];
			else
				$values = $check_v==0? $values.'"'.$_POST[$table_struct[$q]].'"': $values.', "'.$_POST[$table_struct[$q]].'"';
			$check_v = 1;
		}
		else
			$values = $values.", NULL";
	}

	//performing insertion
	$query = "insert into daily_log values (".$values.")";
	$result = mysql_query($query);
	if($result)
		echo "Insertion succesful";
	else
		echo "Error during insertion";
?>