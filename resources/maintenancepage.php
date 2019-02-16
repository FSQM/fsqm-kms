<html>



<?php session_start();

if(isset($_SESSION['u_session']) && !empty($_SESSION['u_session'])){
		if($_SESSION['u_session']!="admin"){
		header ('Location: homepage.php');
	}
	
}else{
	header ('Location: index.php');
}
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="resources/css/bootstrap-theme.css" type="text/css"/>
<link href="resources/css/bootstrap.css" rel="stylesheet" type="text/css"/>

<script src="resources/js/jquery.min.js" type="text/javascript"></script>
<script src="resources/js/bootstrap.js" type="text/javascript"></script>
<script>
	function confDel(){
		var c = confirm('Do you wish to delete this User?');
		if(c == true){
			alert('Successfully deleted!');
		}else{
			return false;
		}
	}
	
</script>
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
	
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand" href="#">PLDT</a>
				</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
			<li><a href="homepage.php">Home</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Latest Fault Tickets<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="latestopenft.php">Latest Open Fault Tickets</a></li>
					<li><a href="latestclosedft.php">Latest Closed Fault Tickets</a></li>
					<li><a href="tcoft.php">Total Count of Open Fault Tickets</a></li>
					<li><a href="dsoft.php">District Summary of Open Fault Tickets</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Weekly Summary of Tickets<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="wsoft.php">Weekly Summary of Open Fault Tickets (Trending)</a></li>
					<li><a href="oftd.php">Open Fault Ticket's Details</a></li>
					<li><a href="zonerank.php">7 day Zone Ranking</a></li>
					<li><a href="sct.php">Summary of Closed Tickets</a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a href="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo "Logged in as ".$_SESSION["u_session"]."<span class=\"caret\"></span>";?></a>
		<ul class="dropdown-menu">
			<li><a href="#">User Control Panel</a></li>
			<?php
			if($_SESSION["u_session"]=="admin"){
			echo "<li><a href=\"maintenancepage.php\">User Maintenance</a></li>
				  <li><a href=\"#\">Zone Maintenance</a></li>
				  <li><a href=\"#\">Zone Head Maintenance</a></li>";}
			?>
			
		</ul>
	  </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
    </ul>
	</div>
	</div>
</nav>


<div class="container" style="background-color:whitesmoke; border:0px; border-radius:0px 0px 20px 20px;"><br><br><br>
	<h2>User Maintenance</h2>
		<p>Color Defines status</p><br>
		<ul>
			<li>Green for Administrator Level</li>
			<li>Blue for Data Managers Level</li>
			<li>Blue for Viewers Level</li>
		</ul>
		
		
		
		
		
		<table class="table table-hover table-condensed">
			<thead>
			<th>ID</th>
			<th>Username</th>
			<th>Password</th>
			<th>User Type</th>
			<th></th>
			<th></th>
			</thead>
			<tbody>
		<?php
		$con = mysqli_connect("localhost","root","password","fsqm");
		$sql = "Select * from tbl_login limit 10";
		$result = mysqli_query($con,$sql)
		 or die("Failed to query database ".mysql_error());
		 
		if(mysqli_num_rows($result)>0){
			?>
			
			<?php
			while($row = mysqli_fetch_assoc($result)){
				$y = $row["class"];
				
				if($y=="admin"){
				?>
				<tr class="success">
					<td><?php echo $row["log_id"]?></td>
					<td><?php echo $row["log_uname"]?></td>
					<td><?php  echo $row["log_pass"]?></td>
					<td><?php  echo $row["class"]?></td>
					<td></td>
					<td></td>
				</tr>
				<?php
				}else if($y=="datamgr"){
				?>
				<tr class="info">
					<td><?php  echo $row["log_id"]?></td>
					<td><?php  echo $row["log_uname"]?></td>
					<td><?php  echo $row["log_pass"]?></td>
					<td><?php  echo $row["class"]?></td>
					<td><form action="modaledituser.php?name="<?php echo $row["log_uname"]?>"&pass="<?php echo $row["log_pass"]?>"&id="<?php echo $row["log_id"]?>" method="POST">
					<input type="hidden" name="uname" value="<?php echo $row["log_uname"]?>">
					<input type="hidden" name="pass" value="<?php echo $row["log_pass"]?>">
					<input type="hidden" name="id" value="<?php echo $row["log_id"]?>">
					<input type="submit" value="EDIT" class="btn btn-warning" style="padding: 0px;">
					</form>
					</td>
					<td><form action='modaldeleteuser.php?name="<?php echo $row["log_id"]?>"' method="POST" id="mdeluser" onsubmit="return confDel()">
					<input type="hidden" name="name" value="<?php echo $row["log_id"]?>">
					<input type="submit" value="DELETE" class="btn btn-danger" style="padding:0px;">
					</form></td>
					
					
				</tr>
				<?php
				}else if($y=="user"){
				?>
					<tr class="default">
					<td><?php  echo $row["log_id"]?></td>
					<td><?php  echo $row["log_uname"]?></td>
					<td><?php  echo $row["log_pass"]?></td>
					<td><?php  echo $row["class"]?></td>
					<td><form action="modaledituser.php?name="<?php echo $row["log_uname"]?>"&pass="<?php echo $row["log_pass"]?>"&id="<?php echo $row["log_id"]?>" method="POST">
					<input type="hidden" name="uname" value="<?php echo $row["log_uname"]?>">
					<input type="hidden" name="pass" value="<?php echo $row["log_pass"]?>">
					<input type="hidden" name="id" value="<?php echo $row["log_id"]?>">
					<input type="submit" value="EDIT" class="btn btn-warning" style="padding: 0px;">
					</form>
					</td>
					<td><form action='modaldeleteuser.php?name="<?php echo $row["log_id"]?>"' method="POST" id="mdeluser" onsubmit="return confDel()">
					<input type="hidden" name="name" value="<?php echo $row["log_id"]?>">
					<input type="submit" value="DELETE" class="btn btn-danger" style="padding:0px;">
					</form></td>
					
					
				</tr>
				<?php
				}
			}?>
			</tbody>
			</table>
			<?php
		}else{
			echo "No Results Found";
		}
		
		$con->close();
		
		
		?>
		
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#madd" <?php if($_SESSION["u_session"] == "admin"){}else{echo "disabled=\"true\"";}?>"">Add User</button>
		

</div>		
	<!-------------------------------last div--------------------------->



		<div class="modal fade" id="madd" role="dialog">
			<div class="modal-dialog">			  
			    <div class="modal-content">
					<form action="modaladduser.php" method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">CLOSE&times;</button>
							<h4 class="modal-title">Add</h4>
						</div>
						<div class="modal-body">				
							<table class="table">
								<tr>
									<td>Username:</td>
									<td><input type="text" name="munameadd" required autofocus></input></td>
								</tr>
								<tr>
									<td>Password:</td>
									<td><input type="password" name="mpassadd" required></input></td>
								</tr>
								<tr>
									<td>User Type:</td>
									<td><select name="mclass">
										<option value = "user">User</option>
										<option value = "datamgr">Data Manager</option>
										<option value = "admin">Admin</option>
									</select></td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-success" value="Add"></button>
							<button type="reset" class="btn btn-danger">Clear Fields</button>
						</div>
					</form>
				</div>					
			</div>
		</div>


</body>
</html>