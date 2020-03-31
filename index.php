<?php 
    require_once("functions/function.php");
    get_header();
?>
<body>
<!-- Content Section -->
<div class="container">
	<header>
		<div class="header-img" style="background-image: url('photos/design/header_wcbiglogo.png'); ">
		</div>
	</header>
	
	<section id="mainBody">
		<div id="leftDiv">
			<div class="alert alert-warning">
				<form action="ajax/Login.php" method="post" name="login_form" id="login_form" onSubmit="return validate(this); autocomplete="off">
					<a><img src="photos/Icons/24X24/lock.ico"></a>
					<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please Input Details</h4>
					<h6><?php
						if(isset($_SESSION["errorMessage"])) {
					?>
					<div class="message"><?php  echo $_SESSION["errorMessage"]; ?></div>
					<?php 
						unset($_SESSION["errorMessage"]);} 
					?>
					<br>
					<input type="text" name="username" id="username" class="form-control input-sm" required placeholder="Username" oninvalid="this.setCustomValidity('Please fill out username.')" oninput="this.setCustomValidity('')" autofocus>
					<br>
					<input type="password" name="password" id="password" class="form-control input-sm" required placeholder="Password" oninvalid="this.setCustomValidity('Please fill out password.')" oninput="this.setCustomValidity('')" autofocus>
					</h6>
					<div align="right">
					<button style="font-size: 85%;" type="reset" id="Reset" class="btn btn-primary btn-xs">Clear</button>
					<button style="font-size: 85%;" id="LoginButton" class="btn btn-primary btn-xs" onclick="Login()">Log In</button>
					</div>
				 </form>
			</div>
			<div align="right">
				<p style="font-size: 70%; padding-right: 10px;"><a  href="#">Forgot your Username?</a> <a  href="#">Forgot Password?</a></p>
			</div>
		</div>
	</section>
	
	<div class="clear"></div>
	<footer style="background-image: url('photos/design/footer.png'); ">© 2020 Country Bankers Insurance Group. All rights reserved.</footer>
</div>
<!-- /Content Section -->
<?php 
    get_footer();
?>