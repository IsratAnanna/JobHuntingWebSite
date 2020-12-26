<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 

<?php
		if(!isset($_GET["rid"]))
		{
				
			 header("location:index.php");
		}
		else {
				$curdate=date("Y/m/d");
				include ('db.php');
				$id = $_GET['cid'];
				
				
				$sql ="Select * from candidateinfo where id = '$id'";
				$re = mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($re))
				{
					$title = $row['Title'];
					$fname = $row['Fname'];
					$lname = $row['Lname'];
					$email = $row['Email'];
					$nation = $row['Nationality'];
					$country = $row['Passport_Country'];
					$phone = $row['Phone_no'];
					$passport = $row['Passport_no'];
					$nid = $row['NID'];
					$area = $row['Preffered area'];
					$experience = $row['Experience'];
					$skill = $row['Skill'];
					
				
				}
	}
		
			?> 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator	</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <link href="assets/css/font-awesome.css" rel="stylesheet" />
  
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />

    <link href="assets/css/custom-styles.css" rel="stylesheet" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    
                </li>
                
            </ul>
        </nav>
   
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                   
					<li>
                        <a class="active-menu" href="candidateinfo.php"><i class="fa fa-bar-chart-o"></i> Applied Candidates</a>
                    </li>
                    
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                    
					</ul>

            </div>

        </nav>
        
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Candidates<small>	<?php echo  $curdate; ?> </small>
                        </h1>
                    </div>
					
					
					<div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Apply Confirmation
                        </div>
                        <div class="panel-body">
							
							<div class="table-responsive">
                                <table class="table">
                                    <tr>
                                            <th>DESCRIPTION</th>
                                            <th>INFORMATION</th>
                                            
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <th><?php echo $title.$fname.$lname; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Email</th>
                                            <th><?php echo $email; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Nationality </th>
                                            <th><?php echo $nation; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Country </th>
                                            <th><?php echo $country;  ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Phone No </th>
                                            <th><?php echo $phone; ?></th>
                                            
                                        </tr>
										
										<tr>
                                            <th>Passport_No </th>
                                            <th><?php echo $passport; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>NID </th>
                                            <th><?php echo $nid; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Area</th>
                                            <th><?php echo $area; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Experience </th>
                                            <th><?php echo $experience; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Skill </th>
                                            <th><?php echo $skill; ?></th>
                                            
                                        </tr>
                                            <th>Status Level</th>
                                            <th><?php echo $stat; ?></th>
                                            
                                        </tr>
                                   
                                </table>
                            </div>
                        
					
							
                        </div>
                        <div class="panel-footer">
                            <form method="post">
										<div class="form-group">
														<label>Select the Confirmation</label>
														<select name="conf"class="form-control">
															<option value selected>	</option>
															<option value="Conform">Confirm</option>
															
															
														</select>
										 </div>
							<input type="submit" name="co" value="Conform" class="btn btn-success">
							
							</form>
                        </div>
                    </div>
					</div>
					
					<?php
						$rsql ="select * from jobav";
						$rre= mysqli_query($con,$rsql);
						$r =0 ;
						$sc =0;
						$gh = 0;
						$sr = 0;
						$dr = 0;
						$qr = 0;
						$mr = 0;
						$nr = 0;
						$kr = 0;
						
						while($rrow=mysqli_fetch_array($rre))
						{
							$r = $r + 1;
							$s = $rrow['post'];
							$p = $rrow['jobstat'];
							if($s=="Software Developer" )
							{
								$sc = $sc+ 1;
							}
							
							if($s=="Database Administrator")
							{
								$gh = $gh + 1;
							}
							if($s=="Computer Hardware Engineering" )
							{
								$sr = $sr + 1;
							}
							if($s=="Web Development" )
							{
								$dr = $dr + 1;
							}
							if($s=="Computer System Analysis" )
							{
								$qr = $qr + 1;
							}
							if($s=="Computer Network Architect" )
							{
								$mr = $mr + 1;
							}
							if($s=="Information Security Analysis" )
							{
								$nr = $nr + 1;
							}
							if($s=="Computer and Information Research Scientists" )
							{
								$kr = $kr + 1;
							}
							
						
						}
						?>
						
						
							
					<div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Available Job Details
                        </div>
                        <div class="panel-body">
						<table width="200px">
							
							<tr>
								<td><b>Software Developer	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									$f1 =$sc - $csc;
									if($f1 <=0 )
									{	$f1 = "NO";
										echo $f1;
									}
									else{
											echo $f1;
									}
								
								
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Database Administrator</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								$f2 =  $gh -$cgh;
								if($f2 <=0 )
									{	$f2 = "NO";
										echo $f2;
									}
									else{
											echo $f2;
									}

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Computer Hardware Engineering </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php
								$f3 =$sr - $csr;
								if($f3 <=0 )
									{	$f3 = "NO";
										echo $f3;
									}
									else{
											echo $f3;
									}

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Web Development</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								
								$f4 =$dr - $cdr; 
								if($f4 <=0 )
									{	$f4 = "NO";
										echo $f4;
									}
									else{
											echo $f4;
									}
								?> </button></td> 
							</tr>
							
							
							<tr>
								<td><b>Computer System Analysis</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								
								$f5 =$qr - $cqr; 
								if($f5 <=0 )
									{	$f5 = "NO";
										echo $f5;
									}
									else{
											echo $f5;
									}
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Computer Network Architect</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								
								$f6 =$mr - $cmr; 
								if($f6 <=0 )
									{	$f6 = "NO";
										echo $f6;
									}
									else{
											echo $f6;
									}
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Information Security Analysis</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								
								$f7 =$nr - $cnr; 
								if($f7 <=0 )
									{	$f7 = "NO";
										echo $f7;
									}
									else{
											echo $f7;
									}
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Computer and Information Research Scientists</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								
								$f8 =$kr - $ckr; 
								if($f8 <=0 )
									{	$f8 = "NO";
										echo $f8;
									}
									else{
											echo $f8;
									}
								?> </button></td> 
							</tr>
							
							<tr>
								<td><b>Total Jobs	</b> </td>
								<td> <button type="button" class="btn btn-danger btn-circle"><?php 
								
								$f9 =$r-$cr; 
								if($f9 <=0 )
									{	$f9 = "NO";
										echo $f9;
									}
									else{
											echo $f9;
									}
								 ?> </button></td> 
							</tr>
						</table>
						
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
                </div>
               
                </div>
               
         </div>
            
        </div>
       
    </div>
   
    <script src="assets/js/jquery-1.10.2.js"></script>
   
    <script src="assets/js/bootstrap.min.js"></script>
    
    <script src="assets/js/jquery.metisMenu.js"></script>
    
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>

    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>

<?php
						if(isset($_POST['co']))
						{	
							$st = $_POST['conf'];
							
							 
							
							if($st=="Confirm")
							{
									$urb = "UPDATE `candidateinfo` SET `stat`='$jobstat' WHERE id = '$id'";
									
								if($f1=="NO" )
								{
									echo "<script type='text/javascript'> alert('Sorry! Not Available! ')</script>";
								}
								else if($f2 =="NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Not Available!')</script>";
										
									}
									else if ($f3 == "NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Not Available!')</script>";
									}
										else if($f4=="NO")
										{
										echo "<script type='text/javascript'> alert('Sorry! Not Available!')</script>";
										}
										else if($f5=="NO")
										{
										echo "<script type='text/javascript'> alert('Sorry! Not Available!')</script>";
										}
										else if($f6=="NO")
										{
										echo "<script type='text/javascript'> alert('Sorry! Not Available!')</script>";
										}
										else if($f7=="NO")
										{
										echo "<script type='text/javascript'> alert('Sorry! Not Available!')</script>";
										}
										else if($f8=="NO")
										{
										echo "<script type='text/javascript'> alert('Sorry! Not Available!')</script>";
										}
										
														if(mysqli_query($con,$psql))
														{	$notav="NotAvailable";
															$rpsql = "UPDATE `candidateinfo` SET `jobstat`='$notav',`can_id`='$id' where post ='$pjob' , company='$comp' , location='$loc' , salary='$sal' ";
															if(mysqli_query($con,$rpsql))
															{
															echo "Information Received!";
															echo "<script type='text/javascript'> window.location='candidateinfo.php'</script>";
															}
															
															
														}
												
											}
									
							}	
							
							
						?>