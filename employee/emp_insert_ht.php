<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Management - Insert</title>
	<style>
		.ast{
			color: red;
		}
		table,td{border-collapse: collapse;}
	</style>
</head>
<body>
	<form method="post" action="emp_insert.php">
		<table border="1">
			<tr>
				<td>Attribute</td>
				<td>Value</td>
			</tr>
			<tr>
				<td>
					Employee id<span class="ast">*</span>
				</td>
				<td>
					<input type="text" name="emp_id" required>
				</td>
			</tr>
			<tr>
				<td>
					First Name<span class="ast">*</span>
				</td>
				<td>
					<input type="text" name="fname" required>
				</td>
			</tr>
			<tr>
				<td>
					Last Name<span class="ast">*</span>
				</td>
				<td>
					<input type="text" name="lname" required>
				</td>
			</tr>
			<tr>
				<td>
					House Number<span class="ast">*</span>
				</td>
				<td>
					<input type="text" name="house_no" required>
				</td>
			</tr>
			<tr>
				<td>
					Lane<span class="ast">*</span>
				</td>
				<td>
					<input type="text" name="lane" required>
				</td>
			</tr>
			<tr>
				<td>
					Area<span class="ast">*</span>
				</td>
				<td>
					<input type="text" name="area" required>
				</td>
			</tr>
			<tr>
				<td>
					City<span class="ast">*</span>
				</td>
				<td>
					<input type="text" name="city" required>
				</td>
			</tr>
			<tr>
				<td>
					Date of Birth<span class="ast">*</span>
				</td>
				<td>
					<input type="date" name="dob" required>
				</td>
			</tr>
			<tr>
				<td>
					Gender<span class="ast">*</span>
				</td>
				<td>
					<input type="text" name="gender" required>
				</td>
			</tr>
			<tr>
				<td>
					Designation<span class="ast">*</span>
				</td>
				<td>
					<input type="text" name="designation" required>
				</td>
			</tr>
			<tr>
				<td>
					Type of Salary<span class="ast">*</span>
				</td>
				<td>
					<input type="text" name="tos" required>
				</td>
			</tr>
			<tr>
				<td>
					Email
				</td>
				<td>
					<input type="text" name="email">
				</td>
			</tr>
			<tr>
				<td>
					Salary
				</td>
				<td>
					<input type="text" name="salary">
				</td>
			</tr>
			<tr>
				<td>
					Date of Termination
				</td>
				<td>
					<input type="date" name="dot">
				</td>
			</tr>
			<tr>
				<td>
					Hours Worked
				</td>
				<td>
					<input type="text" name="hrs_w">
				</td>
			</tr>
			<tr>
				<td>
					Hourly Rate
				</td>
				<td>
					<input type="text" name="hrly_rate">
				</td>
			</tr>
			<tr>
				<td>
					Floor Working
				</td>
				<td>
					<input type="text" name="floor">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Done Inserting">
				</td>
				<td>
					<input type="submit" value="Next">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
	if($_SESSION['insertion']==1)
		echo "<b>Insertion succesful</b>";
	else
		echo "<b>Error in insertion</b>";	
?>