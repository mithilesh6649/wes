/**********************************************/
  $this->response = Team::limit(3)->get();
       if(count($this->response) != 0){
           foreach ($this->response  as $this->data) {
               array_push($this->allData,$this->data);
           }

           return response(array("data"=>$this->allData),200)->header("Content-Type","application/json");
       }
       else{
        return response(array("notice"=>"Data Not Found !"),404)->header("Content-Type","application/json");
       }
/**********************************************/

-----------------------------------------------------------------------
 						Chapter -31 Laravel job roles
-----------------------------------------------------------------------


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
          	 	fetch_type:"all",
          	 },
          	 success:function(res){
          	  console.log(res);
          	 }
          });
     }
});
});

............................
 public function index(Request $request)
    {
       if($request['fetch_type'] == "pagination"){       
           $this->response = Team::paginate(3);
           if(count($this->response) != 0){
               return response(array("data"=>$this->response),200)->header("Content-Type","application/json");
           }
           else{
            return response(array("notice"=>"Data Not Found !"),404)->header("Content-Type","application/json");
           }
       }

       if($request['fetch_type'] == "gtonlyteamname"){
             $this->response =  Team::get(['team_name','team_description']);
             if(count($this->response) != 0){
                return response(array("data"=>$this->response),200)->header('Content-Type','application/json');
             }
             else{
                 return response(array("data"=>"Data not found"),404)->header('Content-Type','application/json');
             }
       }
    }

    .................................................................
     public function store(Request $request)
    {
        print_r($_POST);
        print_r( $request->input('job_role') );
    }
    ..................................................
    $this->response =  $request->all();
        print_r($this->response);
   ..........................................
     public function index(Request $request)
    {
       return  $request->all();
    }

...............................
Note-------- forEach() only array mai lagta hai 
...........................      

    public function store(Request $request)
    {
return $request->all();
      //   $this->response =  Jobrole::create($request->all());

     }
 ..................................   

//Konw option selected index
 $(document).ready(function(){
 	$(".select-job-role").on("change",function(){
 		 var option_index = this.selectedIndex;
 		 alert(option_index);
 	});
 });

 ................ 

 //know uploaded file details

  $(document).ready(function(){
 	$("#add-employee input[type='file']").each(function(e){
 		$(this).on("change",function(){
 			console.log(this.files);
 		});
 	});
 });

 ---------------------------------------------------------