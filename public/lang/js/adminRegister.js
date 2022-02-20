
$(document).ready(function(){
	$(".admin-form").submit(function(e){
		e.preventDefault();
        var company_slug = $(this).attr('slug');
        var company_estd = $(".company-estd").val();
        var company_password = $(".company-password").val().trim();
    
        var query = {
              query:"adminRegister",
        	  company_slug:company_slug,
        	  company_estd:company_estd,
        	  company_password:company_password
        }
//stringify mai iss liye convert karte hai kyuki btoa() only string ko encrypt karta hai object ko nahi
        query = JSON.stringify(query);
        query = btoa(query);

        $.ajax({
        	type:"PUT",
        	url:"/api/company/"+query,
        	data:{
        		_token : $("body").attr("token")
        	},
        	success:function(restt){
                window.location = "/admin";
        	},
        	error:function(xhr,error,response){
        		console.log(response);
        		alert(response);
        	}
        });



	});
})