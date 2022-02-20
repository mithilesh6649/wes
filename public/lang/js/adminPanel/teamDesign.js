//called show teams function

window.onload = function(){
	//step-1 ajax request
	showTeams("api/team?page=1");
}


//create team 

$(document).ready(function(){
	 $(".create-team-form").submit(function(e){
	 	e.preventDefault();
	   var token = $("body").attr("token");
        
        //start random color
       var colors = ["erpbg-primary","erpbg-secondary","erpbg-success","erpbg-danger","erpbg-warning","erpbg-info" ];
       var index  = Math.floor(Math.random()*5);
       var erpbg   = colors[index];
       //end random color


	    $.ajax({
	     	 type : "POST",
          	 url : "api/team",
          	 data : {
          	 	_token :token,
          	 	team_name : $(".team-name").val(),
          	 	team_description : $(".team-description").val(),
          	 	team_creator : $(".team-creator").val(),
          	 	team_creator_role : $(".team-creator-role").val()

          	 },
          	 beforeSend:function(){
                $(".fullpage-loader").removeClass("d-none");
                $("#createTeamModal").modal('hide');
                $(".team-name").val("");
                $(".team-description").val("");
          	 },
          	 success:function(response){
          	   $(".fullpage-loader").addClass("d-none");
          	   var team_name = response.data.team_name;
          	   var team_description = response.data.team_description;
          	   var card = document.createElement("DIV");
          	   card.className = "card my-4 border-0";

          	   var card_header = document.createElement("DIV");
          	   card_header.className = "card-header "+erpbg+" text-white";
          	   card_header.innerHTML = team_name;

          	    var card_body = document.createElement("DIV");
          	   card_body.className = "card-body border border-top-0";
          	   card_body.innerHTML = team_description;

          	   $(card).append(card_header);
          	   $(card).append(card_body);
          	   $(".teams-area").append(card);

          	 },
          	 error:function(ajax,error,response){
          	 	$(".fullpage-loader").addClass("d-none");
          	 	 $("#createTeamModal").modal('hide');
          	 	var alert = document.createElement("DIV");
          	 	alert.className = "alert erpbg-warning d-flex aligns-items-center";
          	 	if(ajax.status == 500){
          	 		
          	 		$(".duplicate-teamname").removeClass("d-none");
          	 		$("[name=team_name]").addClass("animate__animated  animate__shakeX");

          	 		//remove duplicate message

          	 		$("[name=team_name]").click(function(){
          	 			alert();
          	 		});  

          	 	}


          	    if(ajax.status == 400){
          	 		alert.innerHTML = "<span class='material-icons mr-2'>error</span>"+response.notice;
          	 		$(".teams-message").append(alert);

          	 		//remove  after 3 second
                  
                    setInterval(function(){
                    	alert.remove();
                    },3000);

          	 	}

          	 }
	     });
	 });
});


//show teams

function showTeams(url){
     var token = $("body").attr("token");
   $.ajax({
   	   type:"GET",
   	   url:url,
   	   data:{
         _token:token,
         fetch_type:"pagination"
   	   },
   	   beforeSend:function(){
        $(".teams-loader").removeClass("d-none");
   	   },
   	   success:function(response){
   	   	//hide loader
   	   	$(".teams-loader").addClass("d-none");
   	   	 $(".teams-area").html("");

          //  console.log(response);
        
          
         //show pagination number
         
         var start = response.data.from;
         var end = response.data.last_page;
         var total = "Total - "+response.data.total;
         $(".total-teams").html(total);
         //create pagination loop 

         var i ;
         var ul = document.createElement("UL"); 
         ul.className = "pagination";
         for(i=start;i<=end;i++){

         var li = document.createElement("LI");
         li.className = "page-item";
          $(ul).append(li);

         var a = document.createElement("A");
         a.className = "page-link";
         a.innerHTML = i ;
         a.href = "api/team?page="+i;
         $(li).append(a);

         //get data on click

         $(a).click(function(e){
          e.preventDefault();
          var url = $(this).attr("href");
          showTeams(url);
         });
        
         }
         
         if($(".teams-pagination").html() == ""){
         	$(".teams-pagination").append(ul); 	  
         }
         else{
         	console.log($(".teams-pagination").html());
         }

   	   	 var colors = ["erpbg-primary","erpbg-secondary","erpbg-success","erpbg-danger","erpbg-warning","erpbg-info" ];
         response.data.data.forEach(function(data){
           
              var index  = Math.floor(Math.random()*5);
              var erpbg   = colors[index];


           var team_name = data.team_name;
           var team_description = data.team_description;

               var card = document.createElement("DIV");
           	   card.className = "card my-4 border-0";

          	   var card_header = document.createElement("DIV");
          	   card_header.className = "card-header "+erpbg+" text-white";
          	   card_header.innerHTML = data.team_name;

          	    var card_body = document.createElement("DIV");
          	   card_body.className = "card-body border border-top-0";
          	   card_body.innerHTML = data.team_description;

          	   $(card).append(card_header);
          	   $(card).append(card_body);
          	   $(".teams-area").append(card);

         });
        
         
         //step-2 ajax request

        if($(".show-jobroles").html() == "")
        {
        	 //request  data in ascending order
        	 showJobRoles("asc");	
        }


   	   }
   });

}


//load team name in add role

$(document).ready(function(){
$(".job-role").on('shown.bs.collapse',function () {
	 var token = $("body").attr("token");
     var all_option =  $(".select-team-name option");
     if(all_option.length == 1){
          $.ajax({
          	 type:"GET",
          	 url:"api/team",
          	 data:{
          	 	_token:token,
          	 	fetch_type:"getonlyteamname"
          	 },
          	 success:function(response){
          	 // console.log(response.data);
          	 
          	  response.data.forEach(function(data){
          	  	 var team_names = data.team_name;
                 
                 var option = document.createElement("OPTION");
                 option.innerHTML = team_names;

                 $(".select-team-name").append(option);


          	  });
          	 }
          });
     }
});
});


// insert(set) job role

$(document).ready(function(){
	$(".job-role-form").submit(function(e){
       e.preventDefault();
     var role = $(".edit-jobrole-submit-btn").attr("role");
     var id = $("[name=id]").val();
     var type = "";
     var url = "";
     if(role == "insert")
     {
        type = "POST";
        url = "api/jobrole";
     } 
     if(role == "update")
     {
     	type = "PUT";
        url = "api/jobrole/"+id;
     }     
      $.ajax({
      	  type:type,
      	  url:url,
      	  data:{
            _token : $("body").attr("token"),
            id:id,
            job_role : $("[name=job_role]").val(),
            qualifications : $("[name=qualifications]").val(),
            certifications :$("[name=certifications]").val(),
            experience : $("[name=experience]").val(),
            salary :  $("[name=salary]").val(),
            team_name : $(".select-team-name").val(),

      	  },
      	  success:function(response){
      	  	console.log(response);
             	 
             //collapse add role form
              $("#job-role form").trigger('reset'); 
             $("#job-role").collapse('hide');

            //empty data
      	  	$(".show-jobroles").html("");
      	  	//request data in descending order
      	  	showJobRoles("desc");
      	  },
      	  error:function(xhr,error,response){
              if(xhr.status == 500){
              	$(".duplicate-jobrole").removeClass("d-none");
              	$("[name=job_role]").addClass("animate__animated  animate__shakeX");
                 
              //remove duplicate message after click
 
               $("[name=job_role]").click(function(){
               	  $(".duplicate-jobrole").addClass("d-none");
               	  $("[name=job_role]").removeClass("animate__animated  animate__shakeX");
               });
               

              }
      	  }
      });


	});
});

//show job roles

 function showJobRoles(arrange_by){
	var token = $("body").attr("token");
	$.ajax({
		type:"GET",
		url:"api/jobrole",
		data:{
			_token:token,
			fetch_type:"pagination",
			arrange_by:arrange_by
		},
		beforeSend:function(){
          $(".jobroles-loader").removeClass("d-none");
		},
		success:function(response){
			//prevent from extra append
			$(".show-jobroles").html("");		

		   //hide loader
		    $(".jobroles-loader").addClass("d-none");
			//show total job roles 
			var total = "Total - "+response.data.total;
          	 $(".total-roles").html(total);

           //create table 
           var table = document.createElement("TABLE");
           table.className = "table table-bordered text-center mt-4";

           var tr_row = document.createElement("TR");
           var th_jobrole = document.createElement("TH");
           var th_salary = document.createElement("TH");
           var th_teamname = document.createElement("TH");
           var th_action = document.createElement("TH");
           
           th_jobrole.innerHTML = "Role";
           th_salary.innerHTML = "Salary";
           th_teamname.innerHTML = "Work As";
           th_action.innerHTML = "A";

           $(tr_row).append(th_jobrole);
           $(tr_row).append(th_salary);
           $(tr_row).append(th_teamname);
           $(tr_row).append(th_action);


           $(table).append(tr_row);
           $(".show-jobroles").append(table);		

			console.log(response.data.data);
			response.data.data.forEach(function(data,index){
		        var job_role = data.job_role;
		        var salary = data.salary;
		        var team_name = data.team_name;
		       
		       var tr = document.createElement("TR");
		       if(index == 0 && arrange_by == "desc")
		       {
		       	$(tr).addClass("erpbg-info animate__animated  animate__shakeX");

		       	//remove highlight effect
                
                setTimeout(function(){
                	$(tr).removeClass("erpbg-info animate__animated  animate__shakeX");
                },2000);

		       }

		       var td_jobrole = document.createElement("TD");
		       var td_salary = document.createElement("TD");
		       var td_teamname = document.createElement("TD");
		       var td_action  = document.createElement("TD");
               
               td_jobrole.innerHTML = job_role;
               td_salary.innerHTML  = salary;
               td_teamname.innerHTML= team_name;
               td_action.innerHTML = "<button class='btn p-0 edit-jobrole' data='"+JSON.stringify(data)+"'><span class='material-icons'>create</span></button>";

               $(tr).append(td_jobrole);
               $(tr).append(td_salary);
               $(tr).append(td_teamname);
               $(tr).append(td_action);

               $(table).append(tr);





			});

			//edit jobrole

			$(".edit-jobrole").each(function(){
				 $(this).click(function(){
				 	 
				 	var all_data = $(this).attr("data");
				 	var all_data = JSON.parse(all_data);
				 	console.log(all_data);
				 	//alert(all_data.id);
                  var id = all_data.id;
                  var job_role = all_data.job_role;
                  var qualifications = all_data.qualifications;
                  var certifications = all_data.certifications;
                  var experience = all_data.experience; 
                  var salary = all_data.salary;
                  var team_name = all_data.team_name;
                 
                 if($("#job-role").collapse('show'))
                 {
                   //write data to input field
                  $("[name=id]").val(id);  
                  $("[name=job_role]").val(job_role);
                  $("[name=qualifications]").val(qualifications);
                  $("[name=certifications]").val(certifications);
                  $("[name=experience]").val(experience);
                  $("[name=salary]").val(salary);
                  $("[name=team_name]").val(team_name); 
                 }
                 else{
                 	 $("#job-role").collapse('show');
                 	 //write data to input field
                   $("[name=id]").val(id);	 
                  $("[name=job_role]").val(job_role);
                   $("[name=qualifications]").val(qualifications);
                  $("[name=certifications]").val(certifications);
                  $("[name=experience]").val(experience);
                  $("[name=salary]").val(salary);
                  $("[name=team_name]").val(team_name);
                 }

                
                $(".edit-jobrole-submit-btn").html("Save Changes");

                $(".edit-jobrole-submit-btn").attr("role","update"); 
 


				 });
			});

		}
	});
} 


//show job roles in employee registration area

$(document).ready(function(){
$("#add-employee").on('shown.bs.collapse',function () {
	 var token = $("body").attr("token");
     var all_option =  $(".select-job-role option");
     if(all_option.length == 1){
          $.ajax({
          	 type:"GET",
          	 url:"api/jobrole",
          	 data:{
          	 	_token:token,
          	 	fetch_type:"get-jobrole-with-salary"
          	 },
          	 success:function(response){
          	  //console.log(response.data);
          	 
          	  response.data.forEach(function(data){
          	  	 var job_role = data.job_role;
          	  	 var salary = data.salary;
                 
                 var option = document.createElement("OPTION");
                 option.innerHTML = job_role;
                 $(option).attr("salary",salary);
                 $(".select-job-role").append(option);


          	  }); 
          	 }
          });
     }
});
});

//select salary according to job role
 
 $(document).ready(function(){
 	$(".select-job-role").on("change",function(){
 		 var option_index = this.selectedIndex;
 		    var option = $(".select-job-role option");
 		    var salary = $(option[option_index]).attr("salary");
 		    $("input[name=salary]").val(salary);
 	});
 });


 //add required attribute to worked before filed

 $(document).ready(function(){
 	$("#agree-form").on("show.bs.collapse",function(){
 		var input = $("#agree-form input");
 		$(input).each(function(e){
 		  $(this).attr("required","required");
 		   console.log(this.parentElement); 
 		});
 	});
 });


  //remove required attribute to worked before filed

 $(document).ready(function(){
 	$("#agree-form").on("hide.bs.collapse",function(){
 		var input = $("#agree-form input");
 		$(input).each(function(e){
 		  $(this).removeAttr("required");
 		   console.log(this.parentElement); 
 		});
 	});
 });

 //validate upload input from employee registration area

 $(document).ready(function(){
 	$("#add-employee input[type='file']").each(function(e){
 		$(this).on("change",function(){
 			var file = this.files[0];
 			var file_size = file.size;
 			var file_type = file.type;
      // validate file size
 		  if(file_size<3145728){
         if(file_type == "image/jpeg"||file_type == "image/jpg" || file_type == "image/png" || file_type == "image/gif" || file_type == "image/webp"){
           if($(this).next().hasClass("upload-message")){
            $(this).next().remove();
           }
         }
         else{
            if($(this).next().hasClass("upload-message")){
            $(this).next().remove();
            }
           if(!$(this).next().hasClass("upload-message")){
            $("<div class='upload-message d-flex align-items-center'><span class='material-icons text-danger' style='font-size:17px;'>error</span><span class='text-danger quicksand-font'  style='font-size:15px;'>Please  Upload Image File Only</span></div>").insertAfter(this);
     
           }
         }
      }
      else{
            if($(this).next().hasClass("upload-message")){
            $(this).next().remove();
           }
           
           if(!$(this).next().hasClass("upload-message")){
            $("<div class='upload-message d-flex align-items-center'><span class='material-icons text-danger' style='font-size:17px;'>error</span><span class='text-danger quicksand-font'  style='font-size:15px;'>Upload Limit Less Then 3mb</span></div>").insertAfter(this);
     
           }
         }

 			
 		});
 	});
 });