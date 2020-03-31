// READ records
function displayRecords(id, qtp) {
	var lname = ""; 
	var fname = "";
	switch (qtp) {
		case 3: case 5:
			lname = id;
			id = 0;
			break;
		default:
			lname = $("#lname").val(); 
			fname = $("#fname").val(); 
			break;
	}

    $.post("ajax/DisplayRec.php", { id: id , qtp: qtp , lname: lname , fname: fname  })
	.done(function(data, status) {
		var data = data.replace('Connection established.<br />', '');
		switch(qtp) {
			case 7:
				$(".display_mylist").html("");
				$(".display_mylistcontent").html("");
				$(".display_mylist").html(data);
				break;
			case 5:
				$(".display_mylistcontent").html("");
				$(".display_mylistcontent").html(data);
				break;
			default:
				$(".display_content").html(data);
				
		}
    });
}

function GetPolDetails(polno, code) {
	$.post("ajax/ModalDet.php", { polno: polno, code: code })
	.done(function(data, status) {
		data = data.replace('Connection established.<br />', '');
		dataLoad = data.replace(data.split('<div',1)),'';
		$(".display_modalInfo").html(dataLoad.replace('undefined',''));
		dataParse = data.split('<div',1);
		//alert("Data Loaded: " + data);
		//alert("Data Loaded: " + dataParse);
		var polinfo = JSON.parse(dataParse);
		// Assing existing values to the modal popup fields
		$("#insured").val(polinfo.fullname);
		$("#status").val(polinfo.statusdisplay);
		$("#polno").val(polno);
		$("#age").val(polinfo.age);
		$("#plan").val(polinfo.displayname);
		$("#effdate").val(polinfo.poldate);
		$("#dur").val(polinfo.dur);
		$("#termdate").val(polinfo.termdate);
		$("#prem").val(polinfo.modalprem);
		$("#dob").val(polinfo.birthdate);
		
		switch(polinfo.categoryid){
			case 1:
				document.getElementById('lbldur').innerHTML = 'UNIT (s)';
				break;
			case 2:
				document.getElementById('lblpolno').innerHTML = 'DCHS NO.';
				document.getElementById('lbldur').innerHTML = 'TERM OF LOAN';
				document.getElementById('lblprem').innerHTML = 'PREMIUM';
				$("#polno").val(polinfo.polno);
				break;
			case 3:
				document.getElementById('lbldur').innerHTML = 'DURATION';
				break;
			case 4:
				document.getElementById('lblpolno').innerHTML = 'POLICY NO.';
				document.getElementById('lbldur').innerHTML = 'TERM OF INS.';
				break;
			case 5:
				document.getElementById('lbldur').innerHTML = 'COVERAGE TERM';
				break;
			case 6:
				document.getElementById('lbldur').innerHTML = 'DURATION';
				break;
			default:
				document.getElementById('lbldur').innerHTML = 'UNIT (s)';
		}
		
    });
	$.post("ajax/ModalPrem.php", { polno: polno, code: code })
	.done(function(data, status) {
		data = data.replace('Connection established.<br />', '');
		dataLoad = data.replace(data.split('<div',1)),'';
		$(".display_modalPrem").html(dataLoad.replace('undefined',''));
	});
	$.post("ajax/ModalLoan.php", { polno: polno, code: code })
	.done(function(data, status) {
		data = data.replace('Connection established.<br />', '');
		dataLoad = data.replace(data.split('<div',1)),'';
		$(".display_modalLoan").html(dataLoad.replace('undefined',''));
	});
    // Open modal popup
    $("#view_record_modal").modal("show");
}

function display() {
	var SearchTxt = $("#SearchTxt").val();
	var name = SearchTxt
	var dob = $("#Dob").val();
	var chkdob = document.getElementById("fancy-checkbox-default");
	selectElement = $("#sel1").val();
	
	if (selectElement == "Name") {
		if (chkdob.checked == true){
			qtp = 6
			if(isNaN(dob) == false  || dob == ''){
				alert("Invalid Birthdate");
				return;
			}
		} 
		else {
			qtp = 2
		}
		$.post("ajax/SearchSubmit.php", { name: name, qtp: qtp, dob: dob })
		.done(function(data, status) {
			var data = data.replace('Connection established.<br />', '');
			$(".display_list").html(data);
			$(".display_content").html("");
		});
	}
	
	if (selectElement == "Master") {
		qtp = 4
		$.post("ajax/SearchSubmit.php", { name: name, qtp: qtp, dob: dob })
		.done(function(data, status) {
			var data = data.replace('Connection established.<br />', '');
			$(".display_list").html(data);
			$(".display_content").html("");
		});
	}
	
	if (selectElement == "Sel") {
		alert("Please select filter type.");
	}
}

function displayClients() {
	var lname = $("#lname").val(); 
	var fname = $("#fname").val(); 
	var name = $("#SearchTxt").val() + '|' + lname + '|' + fname;
	var dob = $("#Dob").val();
	var chkdob = document.getElementById("fancy-checkbox-default");
	selectElement = $("#sel1").val();
	
	if (selectElement == "Name") {
		if (chkdob.checked == true){
			qtp = 9
			if(isNaN(dob) == false  || dob == ''){
				alert("Invalid Birthdate");
				return;
			}
		} 
		else {
			qtp = 8
		}
	}
	
	if (selectElement == "Master") {
		qtp = 10
	}
	
	if (selectElement == "Sel") {
		alert("Please select filter type.");
	}
	
	$(".display_mylist").html("");
	$(".display_mylistcontent").html("");
	 $.post("ajax/DisplayRec.php", { id: 0 , qtp: qtp , lname: name , fname: dob })
	.done(function(data, status) {
		var data = data.replace('Connection established.<br />', '');
		switch(qtp) {
			case 10:
				$(".display_mylist").html(data);
				break;
			case 8: case 9:
				$(".display_mylistcontent").html(data);
				break;
				
		}
    });
}