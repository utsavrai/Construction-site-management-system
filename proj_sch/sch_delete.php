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
?>
<?php
	if($_POST['floor']!="" && $_POST['mat_id']=="")
	{
		$b = $_POST['floor'];
		$sql = "delete from res_allot where floor = $b";
	}
	else if($_POST['floor']=="" && $_POST['mat_id']!="")
	{
		
		$a = $_POST['mat_id'];
		//$b = "$_POST['floor']";
		$sql = "delete from res_allot where id='$a'";
	}
	else if($_POST['floor']!="" && $_POST['mat_id']!="")
	{
		$a =  $_POST['mat_id'];
		$b = $_POST['floor'];
		$sql = "delete from res_allot where id='$a' and  floor= $b";
	}
	$result = mysql_query($sql);
	if($result)
	{
		echo "Successful.";
	}
	else
	{
		echo "unsucessful.";
	}
?>
<?php
	//building the condition
	$table_struct = ["floor", "work", "man_d", "mat_n", "end_d", "man_q", "mat_q", "funds","mat_id"];
	$where = "where ";
	$check_v = 0;
	for($q=0; $q!=sizeof($table_struct); $q++)
		if($_POST[$table_struct[$q]]!=""){
			if($q==4){
				$given_date = strtotime($_POST[$table_struct[$q]]);
				$given_date = date("Y-m-d", $given_date);
				$where = $check_v==0? $where.$table_struct[$q]."=\"".$given_date.'" ': $where."and ".$table_struct[$q]."=\"".$given_date.'" ';
			}
			else if($q==0 || $q==5 || $q==7)
				$where = $check_v==0? $where.$table_struct[$q]."=".$_POST[$table_struct[$q]]." ": $where."and ".$table_struct[$q]."=".$_POST[$table_struct[$q]]." ";
			else
				$where = $check_v==0? $where.$table_struct[$q]."=\"".$_POST[$table_struct[$q]].'" ': $where."and ".$table_struct[$q]."=\"".$_POST[$table_struct[$q]].'" ';
			$check_v = 1;
		}

	//performing deletion
	$query = "delete from proj_sched ".$where;
	$result = mysql_query($query);
	if($result)
		echo "Deletion succesful ".mysql_affected_rows()." row(s) were deleted succesfully";
	else
		echo "Error in deletion";
?>
