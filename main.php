<?php 
    require_once("functions/function.php");
    get_header();
?>
<?php
include("ajax/functions_login.php");
include("ajax/url.php");
if(isset($_SESSION["username"])) {
	if(isLoginSessionExpired()) {
		//header("Location: http://localhost/cbig_centralDb/ajax/logout.php?session_expired=1");
		$url = $url . "ajax/logout.php?session_expired=1";
		header("Location:$url");
	}
}
?>

<body>
<script type="text/javascript" src="js/date_time.js"></script>
<!-- Content Section -->
<div class="container">
	<header>
		<div class="header-img" style="background-image: url('photos/design/header_wcbiglogo.png'); "/>
	</header>
	<div style="width:100%; height:200%; overflow-y:auto;">
	<section id="mainBody">
		<?php 
		  if($_SESSION['logged']==true)
			{ 
				//$data1 = "Welcome ";
				//$data2 = $_SESSION["fullname"];
				//$result = $data1 . ' ' . $data2;
				//$result = ucwords(strtolower($result));
				date_default_timezone_set('Asia/Manila');
				$day = "Today is " . date("l");
				$date = " " . date("m/d/yy");
				$time = " " . date("h:i:s a");
				$fullname = $_SESSION["fullname"];
				$lastname = strtoupper($_SESSION["lastname"]);
				$firstname = strtoupper($_SESSION["firstname"]);
			}
		?>
		<div id="welcomeSec">
			<span id="date_time"></span>
			<script type="text/javascript">window.onload = date_time('date_time');</script>(Manila Time)
			<br>
			<p>Click here to <a href="ajax/logout.php" tite="Logout">Logout.</a></p>
		</div>
		<div id="ObjExplorer">
			
			<ul class="nav nav-pills nav-stacked">
			<li class="active" align="left"><a href="">Menu</a></li>
			<li><a href="ajax/MyInsurance.php" method="post">My Accounts</a></li>
			<li><a href="ajax/MyClients.php">My Client's Accounts</a></li>
			<li><a href="ajax/SearchMod.php" method="post">Search Module</a></li>
			</ul>		
		
		</div>
		<div id="ObjDetails">
			<p style="font-weight: bold;"><font color="#8a6d3b">Welcome <?php echo ucwords(strtolower($fullname)) ?> </font></p>
			<input type="hidden" id="lname" value=<?php echo $lastname; ?>>
			<input type="hidden" id="fname" value=<?php echo $firstname; ?>>
			<div id="hr"></div>
			
			<!-- Search Module -->
			<?php
				if(isset($_SESSION["search"])) {
			?>
			<?php echo $_SESSION["search"]; ?>
			<?php 
				unset($_SESSION["search"]);} 
			?>
			
			<!-- List of My Clients -->
			<?php
				if(isset($_SESSION["myins"])) {
			?>
			<?php 	$_SESSION["lastname"]=$lastname;
					$_SESSION["firstname"]=$firstname;
					echo $_SESSION["myins"]; ?>
			<?php 
				unset($_SESSION["myins"]);} 
			?>
			
			<!-- List of Clients -->
			<div class="display_list"></div>
			
			<!-- List of Policies -->
			<div class="display_content"></div>
			
		</div>
	</section>
	</div>
	<div class="clear"></div>
	
	<!-- Bootstrap Modals -->
	<!-- Modal - View Information -->
	<div class="modal fade" id="view_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<!-- <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Policy Details</h4>
				</div> -->
				
				<div class="panel panel-warning">
					<!-- Default panel contents -->
					<button type="button" class="close" style="padding-right: 35px; padding-top: 10px;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="panel-heading"><h4>Policy Details</h4></div>
					<div class="panel-body">
				
						<div class="modal-body">
						
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#home">Policy Information</a></li>
								<li><a data-toggle="tab" href="#premium">Premium</a></li>
								<li><a data-toggle="tab" href="#loan">Loans</a></li>
								<li><a data-toggle="tab" href="#ri">Reinsurance</a></li>
								<li><a data-toggle="tab" href="#claims">Claims</a></li>
								<li><a data-toggle="tab" href="#personal">Personal Info</a></li>
							</ul>
							
							<div class="tab-content">
								<div id="home" class="tab-pane fade in active">
									<!-- Modal Info Details -->
									<div class="display_modalInfo"></div>
									<br><br>
								</div>
								
								<div id="premium" class="tab-pane fade">
									<!-- Modal Premium Details -->
									<div class="display_modalPrem"></div>
								</div>
								
								<div id="loan" class="tab-pane fade">
									<!-- Modal Loan Details -->
									<div class="display_modalLoan"></div>
								</div>
								
								<div id="ri" class="tab-pane fade">
									<h3>Reinsurance</h3>
								</div>
								
								<div id="claims" class="tab-pane fade">
									<h3>Claims</h3>
								</div>
								
								<div id="personal" class="tab-pane fade">
									<h3>Personal Info</h3>
								</div>
							</div>

						</div>
					
					</div>
					<!-- <div class="panel-footer">Panel Footer</div> -->
				</div>
				
				<!-- <div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
				</div> -->
				
			</div>
		</div>
	</div>
	<!-- End of Bootstrap Modal -->
	
	<footer style="background-image: url('photos/design/footer.png'); ">© 2020 Country Bankers Insurance Group. All rights reserved.</footer>
</div>
<!-- /Content Section -->
<?php 
    get_footer();
?>