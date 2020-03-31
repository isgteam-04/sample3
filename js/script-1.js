// READ records
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
function displayRecords() {
    $.get("ajax/query.php", {}, function (data, status) {
        $(".display_content").html(data);
    });
}
function displayUserDetails() {
    $.get("ajax/UserDetails.php", {}, function (data, status) {
        $(".display_userdet").html(data);
    });
}

//function Login(theForm) {
function Login() {
	//$a = document.getElementById("username").value;
	//alert($a);
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	$.post("ajax/Login.php", {
                username: username,
				password: password
            }
			, function(data) {
				if(data=='Successfully Logged in...') {
				alert(data)};
				else if(data=='Username or Password is wrong...!!!!') {
				alert(data)};
				else{
				alert(data)};}
			);
}

function myFunction()
	{
		$a= document.getElementById("username").value;
		alert($a);
    }
	
function validate(theForm) {
        var $valid = true;
        
        var userName = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if(userName == "") 
        {
            document.getElementById("username").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }
	
function GetPolDetails(id) {
	//$("#polno").val(id);
	alert(id);
    //$("#last_name").val(Lastname);
    //$("#first_name").val(Firstname);
    // Open modal popup
    //$("#view_record_modal").modal("show");
}
	
/*$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
    displayRecords();
	displayUserDetails();
});*/