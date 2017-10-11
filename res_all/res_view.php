<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<script src="../js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">

				<!-- mp-menu -->
				<nav id="mp-menu" class="mp-menu">
					<div class="mp-level">
						<h2 class="icon icon-world">All Categories</h2>
						<ul>
							<li >
								<a  href="#">Employee</a>
								<div class="mp-level">
									<h2 >Employee</h2>
									<ul>
										<li>
											<a href="../employee/view.html">View</a>
										</li>
										<li >
											<a href="../employee/insert.html">Insert</a>
										</li>
										<li >
											<a href="../employee/update.html">Update</a>
										</li>
										<li >
											<a href="../employee/delete.html">Delete</a>
										</li>
									</ul>
								</div>
							</li>

							<li >
								<a  href="#">Projected Schedule</a>
								<div class="mp-level">
									<h2 >Projected Schedule</h2>
									<ul>
										<li>
											<a href="../proj_sch/view.html">View</a>
										</li>
										<li >
											<a href="../proj_sch/insert.html">Insert</a>
										</li>
										<li >
											<a href="../proj_sch/update.html">Update</a>
										</li>
										<li >
											<a href="../proj_sch/delete.html">Delete</a>
										</li>
									</ul>
								</div>
							</li>

							<li >
								<a  href="#">Resource Allotment</a>
								<div class="mp-level">
									<h2 >Resource Allotment</h2>
									<ul>
										<li>
											<a href="view.html">View</a>
										</li>
										<li >
											<a href="insert.html">Insert</a>
										</li>
										<li >
											<a href="update.html">Update</a>
										</li>
										<li >
											<a href="delete.html">Delete</a>
										</li>
									</ul>
								</div>
							</li>

							<li >
								<a  href="#">Daily log</a>
								<div class="mp-level">
									<h2 >Daily log</h2>
									<ul>
										<li >
											<a href="../daily_log/view.html"">View</a>
										</li>
										<li >
											<a href="../daily_log/insert.html">Insert</a>
										</li>
										<li >
											<a href="../daily_log/update.html">Update</a>
										</li>
										<li >
											<a href="../daily_log/delete.html">Delete</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</nav>
				<!-- /mp-menu -->

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<!-- Top Navigation -->
						<header class="codrops-header">
						<img src = "../logo.png">
						<div style="width: 60px;height: 60px;float: right;position: relative;padding: 35px;">
							<a href="../index.php"><img src="../home.png" style="float: right;width: 50px;height: 50px"></a>
						</div>
							<h1>Construction site management system <span></span></h1>
						</header>
						<div class="content clearfix">
							<div class="block block-40 clearfix">
								<p><a href="#" id="trigger" class="menu-trigger">Open/Close Menu</a></p>
							</div>
						</div>
						<div id="form">
						<p>
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

								//building the condition for view part
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

								//building the selection part
								$select = "select ";
								$check_v = 0;
								for($q=0; $q!=sizeof($table_struct); $q++)
									if(isset($_POST[$q])){
										$select = $check_v==0? $select.$table_struct[$q]: $select.", ".$table_struct[$q];
										$check_v = 1;
									}

								//final query and result generation
								$query = strlen($where)==6? $select." from res_allot ": $select." from res_allot ".$where;
								$result = mysql_query($query);
								while($row = mysql_fetch_assoc($result)){
									for($q=0; $q!=17; $q++)
										if(isset($_POST[$q]))
												echo "<b>".$table_struct[$q].": </b>".$row[$table_struct[$q]]."<br>";	
										echo "<br>";			
								}
							?>
							</p>
						</div>
					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		</div><!-- /container -->
		<script src="../js/classie.js"></script>
		<script src="../js/mlpushmenu.js"></script>
		<script>
			new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
		</script>
	</body>
</html>