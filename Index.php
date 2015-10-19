<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Clemson Account Creation PHP</title>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/IndexStyles.css" />
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css" />

	<script type="text/javascript" src="JS/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="JS/bootstrap.min.js"></script>	
</head>
<body>
	<div class="container">
		<div class="row">
			<div id="ClemsonLogo"></div>
			<div id="SectionContainer">
				<h4 id="Section">
					Account Creation
				</h4>
			</div>
		</div>
		<div class="row ColorBar">
			<div class="col-md-6">
				<h3 class="FormLabel">Instructions</h3>
				<p>
					For complete access to the site please create an account
					using the corresponding legal information requested.
					
				</p>
			</div>
			<div class="col-md-6 Border">
				<div id='formContainer'>
					<h3 class='FormLabel'>Personal Information</h3>
					<form method="post" action="index.php">
						<table>
							<tr>
								<td>First Name</td>
								<td><input type='text' name='firstname' class='TextInput'/></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><input type='text' name='lastname' class='TextInput'/></td>
							</tr>
							<tr>
								<td>Email Address</td>
								<td><input type='text' name='emailaddress' class='TextInput'/></td>
							</tr>
							<tr>
								<td colspan='2'><input type='submit' name='submit' id='btnSubmit'/></td>
							</tr>
							<tr>
								<td colspan="2"><label id="lblErrorMsg"></label></td>
							</tr>
						</table>
					</form>
				</div>
				<div>
					<?php
						if(isset($_POST['submit'])){
							processData();
						}
						
						function processData(){
							$flag = false;
							
							$firstName = $_POST['firstname'];
							
							if(strlen($firstName) == 0){
								$flag = true;
							}
							
							$lastName = $_POST['lastname'];
							
							if(strlen($lastName) == 0){
								$flag = true;
							}
							
							$emailAddress = $_POST['emailaddress'];
							
							if(strlen($emailAddress) == 0){
								$flag = true;
							}
							
							if($flag == false){
								openlog('php', LOG_CONS | LOG_NDELAY | LOG_PID, LOG_USER | LOG_PERROR);
								syslog(LOG_ERR, 'Error!');
								syslog(LOG_INFO, "$firstName $lastName $emailAddress");
								closelog();
								
								echo "<style type='text/css'>#formContainer{display:none;}</style>";
								echo"
										<h3 class='FormLabel'>SUCCESS!</h3>
										Thank you for creating an account $firstName $lastName!
										A confirmation email has been sent to $emailAddress.
										Once you receive this email please follow the instructions
										provided to active your new account.
										
										<h6>This page will refresh in 10 seconds...</h6>
									";
								header( "refresh:10;url=index.php" );
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>