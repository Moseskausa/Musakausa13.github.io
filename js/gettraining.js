<!doctype html>








function getSelectedtraining() {
	
	var strUser = document.getElementById("code").value;
	
	//return strUser;
	
	console.log(strUser)
	$.ajax({
		//URL:"this",
		method:"post",
		data: strUser,
		success: "true"
		
		
	})
	
    
    };

   