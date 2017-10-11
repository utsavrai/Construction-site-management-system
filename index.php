<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>CSMS</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
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
											<a href="employee/view.html">View</a>
										</li>
										<li >
											<a href="employee/insert.html">Insert</a>
										</li>
										<li >
											<a href="employee/update.html">Update</a>
										</li>
										<li >
											<a href="employee/delete.html">Delete</a>
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
											<a href="proj_sch/view.html">View</a>
										</li>
										<li >
											<a href="proj_sch/insert.html">Insert</a>
										</li>
										<li >
											<a href="proj_sch/update.html">Update</a>
										</li>
										<li >
											<a href="proj_sch/delete.html">Delete</a>
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
											<a href="res_all/view.html">View</a>
										</li>
										<li >
											<a href="res_all/insert.html">Insert</a>
										</li>
										<li >
											<a href="res_all/update.html">Update</a>
										</li>
										<li >
											<a href="res_all/delete.html">Delete</a>
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
											<a href="daily_log/view.html"">View</a>
										</li>
										<li >
											<a href="daily_log/insert.html">Insert</a>
										</li>
										<li >
											<a href="daily_log/update.html">Update</a>
										</li>
										<li >
											<a href="daily_log/delete.html">Delete</a>
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
						<img src = "logo.png">
						<div style="width: 60px;height: 60px;float: right;position: relative;padding: 35px;">
							<a href="#"><img src="home.png" style="float: right;width: 50px;height: 50px"></a>
						</div>
							<h1>Construction site management system <span></span></h1>
						</header>
						<div class="content clearfix">
							<div class="block block-40 clearfix">
								<p><a href="#" id="trigger" class="menu-trigger">Open/Close Menu</a></p>
							</div>
						</div>
						<div id = "form">
							<h2> Schedule of the day!</h2>
							<?php
								$conn = mysql_connect("localhost", "root");
								$db = mysql_select_db("construction_site");
								$date = date("Y/m/d");
								$query = "select * from proj_sched where end_d=\"".$date."\"";
								$result = mysql_query($query);
								if(mysql_num_rows($result)==0)
									echo "<b>No work is scheduled for completion on today's date</b>";
								while($row = mysql_fetch_assoc($result)){
									echo "<b>Floor:</b> ".$row['floor']."<br><b>Work:</b> ".$row['work']."<br><b>Employee type:</b> ".$row['man_d']."<br><b>Material:</b> ".$row['mat_n']."<br><b>End date:</b> ".$row['end_d']."<br><b>Manpower:</b> ".$row['man_q']."<br><b>Material Quantity:</b> ".$row['mat_q']."<br><b>Funds:</b> Rs.".$row['funds']."<br><br>";
								}
							?>
						</div>
					</div><!-- /scroller-inner -->
				</div><!-- /scroller -->

			</div><!-- /pusher -->
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/mlpushmenu.js"></script>
		<script>
			new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
		</script>
	</body>
</html>