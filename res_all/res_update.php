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

	//building the condition for updation
	$table_struct = ["id", "floor", "funds", "quantity", "sources"];
	$where = "where ";
	$check_v = 0;
	for($q=0; $q!=sizeof($table_struct); $q++)
		if($_POST[$table_struct[$q]]!=""){
			if($q==1 || $q==2)
				$where = $check_v==0? $where.$table_struct[$q]."=".$_POST[$table_struct[$q]]." ": $where."and ".$table_struct[$q]."=".$_POST[$table_struct[$q]]." ";
			else
				$where = $check_v==0? $where.$table_struct[$q]."=\"".$_POST[$table_struct[$q]].'" ': $where."and ".$table_struct[$q]."=\"".$_POST[$table_struct[$q]].'" ';
			$check_v = 1;
		}

	//building the attributes to be set
	$set = "";
	$check_v = 0;
	for($q=0; $q!=sizeof($table_struct); $q++)
		if($_POST[$q]!=""){
			if($q==3 || $q==12 || $q==14 || $q==15 || $q==16)
				$set = $check_v==0? $set.$table_struct[$q]."=".$_POST[$q]: $set.", ".$table_struct[$q]."=".$_POST[$q];
			else
				$set = $check_v==0? $set.$table_struct[$q].'="'.$_POST[$q].'"': $set.", ".$table_struct[$q].'="'.$_POST[$q].'"';
			$check_v = 1;
		}

	//building query and performing updation
	$query = "update res_allot set ".$set." ".$where;
	$result = mysql_query($query);
	if($result)
		echo "Updation succesful ".mysql_affected_rows()." row(s) were updated";
	else
		echo "Error during updation";
?>