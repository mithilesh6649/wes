<?php
session_start();
?>

@if(!isset($_SESSION['adminAuthentication']))
  
 <script>
 	window.location = "/404";
 </script>

@else

@extends("../template.adminPanel.adminPanelTemplate") 


@section("title")
WES - Team Design
@endsection


@section("custom-css")
  <link rel="stylesheet" href="lang/css/adminPanel/teamDesign.css?cache=<?php echo time(); ?>">
@endsection


@section("custom-js")
 <script  src="lang/js/adminPanel/teamDesign.js?cache=<?php echo time(); ?>"></script>
@endsection


@section("content")
 <a href="#createTeamModal" data-toggle="modal">
<span class="material-icons create-team-icon">
add_circle
</span>
</a>
<!-- start create team model -->

 <div class="modal fade shadow-lg" id="createTeamModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 ">
      
        <!-- Modal Header -->
        <div class="modal-header erpbg-pink text-white">
          <h5 class="modal-title font-weight-bold quicksand-font ">Create Team</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
         <!-- Modal body -->
        <div class="modal-body quicksand-font" style="letter-spacing: 1px;">
          Manage your employess group by creating a team such as service team,backend team anda many more.
          <form class="create-team-form">
          	@csrf
             <label class="quicksand-font text-danger   duplicate-teamname d-none mt-4"> 
           <span class="material-icons float-left mr-1">error</span>
            Duplicate Entry
           </label>

          	 <input type="text" name="team_name" class="team-name form-control mb-4 " placeholder="Enter Team Name">
          	 <input type="hidden" name="team_creator" class="team-creator form-control my-4" required="required" value="<?php echo $_SESSION['team_creator'] ?>">
          	 <input type="hidden" name="team_creator_role" class="team-creator-role form-control my-4" required="required" value="<?php echo $_SESSION['team_role'] ?>">
          	 <textarea class="team-description form-control mb-4 " name="team_description">Describe something about team</textarea>
          	 <button class="float-right btn erpbg-pink text-white  ">Create</button>
          </form>
        </div>
        
   
        
      </div>
    </div>
  </div>

<!-- end create team model -->

<div class="row">
  <div class="col-md-6">
    <div class="card rounded-0 shadow-sm border-0 mb-4">
  <div class="card-body">
    <p class="quicksand-font">Setup job role and salary for employees</p>
    <button class="rounded-0 quicksand-font  btn erpbg-pink px-3 text-white d-flex align-items-center" data-target="#job-role" data-toggle="collapse"> 
    <span class="material-icons mr-2">post_add</span>
    Add  Role</button>
    <div class="job-role mt-4 collapse" id="job-role">
       <form class="job-role-form">
        @csrf
          <input type="hidden" name="id" class="form-control mb-4" value="0" style="width: 300px">
             
           <label class="quicksand-font text-danger d-none  duplicate-jobrole"> 
           <span class="material-icons float-left mr-1">error</span>
            Duplicate Entry
           </label>

          <input type="text" name="job_role" placeholder="Enter job Role" class="job-role form-control rounded-0 mb-4 quicksand-font" style="width: 300px" required="required">

           <input type="text" name="qualifications" placeholder="Enter Qualifications" class=" form-control rounded-0 mb-4 quicksand-font" style="width: 300px" required="required">

           <input type="text" name="certifications" placeholder="Enter Certifications" class=" form-control rounded-0 mb-4 quicksand-font" style="width: 300px" required="required">

           <input type="number" name="experience" placeholder="Enter Experience" class=" form-control rounded-0 mb-4 quicksand-font" style="width: 300px" required="required">

          <input type="number" name="salary" placeholder="Salary" class="salary form-control rounded-0 mb-4 quicksand-font" style="width: 300px" required="required">

          <select class="team-name form-control quicksand-font mb-4 rounded-0 select-team-name" style="width: 300px;" name="team_name">
            <option value="no-team">Part of any team</option>
          </select>
          
          <button class="btn erpbg-primary text-white quicksand-font rounded-0 edit-jobrole-submit-btn" type="submit" role="insert">
            Set Role
          </button>

       </form>
    </div>
  </div>
</div>
  </div>

  <div class="col-md-6">
    <div class="card rounded-0 shadow-sm border-0 mb-4">
  <div class="card-body">
    <p class="quicksand-font">Setup job role and salary for employees</p>
    <button class="rounded-0 quicksand-font  btn erpbg-primary px-3 text-white d-flex align-items-center" data-target="#add-employee" data-toggle="collapse"> 
    <span class="material-icons mr-2">group_add</span>
    Add  Employee </button>
    <div class="job-role mt-4 collapses" id="add-employee">
       <form class="add-employee-form" method="post" action="api/employee" enctype="multipart/form-data">
        @csrf

        <div class="row px-3">
           <div class="col-md-2 px-0">
             <img src="assets/images/employee-avatar.png" class="w-100">
           </div>
           <div class="col-md-10 pr-0">
             <input type="text" name="employee_name"  class="form-control rounded-0 mb-3" placeholder="Employee Name" required="required">
             <select name="job_role" class="form-control rounded-0 select-job-role">
               <option salary="0">Select Job Role</option>
             </select>
             <input type="txt" name="salary" value="0">
           </div>
        </div>

    <div class="row px-3">
        <div class="col-md-6 px-0">
            <div class="from-group my-2">
              <label class="quicksand-font"> Residential Proof</label>
              <input type="file" name="residential_proof" class="form-control rounded-0" required="required" accept="Image/*">
            </div>
        </div>
        <div class="col-md-6 pr-0"> 
             <div class="from-group my-2">
              <label class="quicksand-font">  Qualification Proof</label>
              <input type="file" name="qualification_proof" class="form-control rounded-0" required="required" accept="Image/*">
            </div>
        </div>

        <div class="col-md-6 px-0">
            <div class="from-group my-2">
              <label class="quicksand-font"> Certification Proof</label>
              <input type="file" name="certification_proof" class="form-control rounded-0" required="required" accept="Image/*" >
            </div>
        </div>
        <div class="col-md-6 pr-0"> 
             <div class="from-group my-2">
              <label class="quicksand-font"> Primary Contact </label>
              <input type="number" name="primary_contact" class="form-control rounded-0" required="required">
            </div>
        </div>

        <div class="col-md-6 px-0">
            <div class="from-group my-2">
              <label class="quicksand-font"> Secondary Contact</label>
              <input type="number" name="secondary_contact" class="form-control rounded-0" required="required">
            </div>
        </div>
        <div class="col-md-6 pr-0"> 
             <div class="from-group my-2">
              <label class="quicksand-font"> Dob</label>
              <input type="date" name="dob" class="form-control rounded-0" required="required">
            </div>
        </div>

           <div class="col-md-12 px-0"> 
             <div class="from-group my-2">
              <label class="quicksand-font">Employee Email</label>
              <input type="email" name="employee_email" class="form-control rounded-0" required="required">
            </div>
        </div>

        
      <div class="col-md-3 px-0">
            <div class="from-group my-2">
              <label class="quicksand-font">Gender</label>
              <select class="form-control" name="gender">
                <option>male</option>
                <option>female</option>
                <option>other</option>
              </select>
            </div>
        </div>
        <div class="col-md-9 pr-0"> 
             <div class="from-group my-2">
              <label class="quicksand-font">Street Address</label>
             <input type="text" name="street_address" class="form-control rounded-0" required="required">
            </div>
        </div>
     
          <div class="col-md-6 px-0">
            <div class="from-group my-2">
              <label class="quicksand-font"> City </label>
              <input type="text" name="city" class="form-control rounded-0" required="required">
            </div>
        </div>
        <div class="col-md-6 pr-0"> 
             <div class="from-group my-2">
              <label class="quicksand-font">Pincode</label>
            <input type="text" name="pincode" class="form-control rounded-0" required="required">
            </div>
        </div>

               <div class="col-md-6 px-0">
            <div class="from-group my-2">
              <label class="quicksand-font">State</label>
              <input type="text" name="state" class="form-control rounded-0" required="required">
            </div>
        </div>
        <div class="col-md-6 pr-0"> 
             <div class="from-group my-2">
              <label class="quicksand-font">Country</label>
              <input type="text" name="country" class="form-control rounded-0" required="required">
            </div>
        </div>

          <div class="col-md-12 pr-0"> 
             <div class="from-group mb-2">
            <input type="checkbox" name="agree" class="rounded-0 agree-checkbox" id="agree-checkbox" data-target="#agree-form" data-toggle="collapse">
            <label class="quicksand-font" for="agree-checkbox"> Have You Worked Anywhere Before</label>
            </div>
        </div> 
    </div>

    <div class="row px-3 collapse mt-2" id="agree-form"> 
      
      <div class="col-md-6 px-0">
        <div class="from-group mb-2">
          <label class="quicksand-font"> Company Name</label>
          <input type="text" name="company_name" class="form-control rounded-0">
        </div>
      </div>
      <div class="col-md-6 pr-0 ">
          <div class="from-group mb-2">
          <label class="quicksand-font"> Experience</label>
          <input type="number" name="experience" class="form-control rounded-0">
        </div>
      </div>

    <div class="col-md-6 px-0">
        <div class="from-group mb-2">
          <label class="quicksand-font">Salary</label>
          <input type="number" name="previous_salary" class="form-control rounded-0">
        </div>
      </div>
      <div class="col-md-6 pr-0 ">
          <div class="from-group mb-2">
          <label class="quicksand-font"> 4 Copies of salary sleep  </label>
          <input type="file" name="salary_sleep" class="form-control rounded-0" accept="Image/*">
        </div>
      </div>
   
    </div>
           
          
          <button class="btn erpbg-pink text-white quicksand-font rounded-0 edit-jobrole-submit-btn" type="submit" role="insert">
           Register
          </button>

       </form>
    </div>
  </div>
</div>
  </div>
</div>



<div class="row">
  <div class="col-md-7">
     <div class="card border-0 rounded-0 shadow-sm mb-4">
       <div class="card-body">
         <h5 class="quicksand-font font-weight-bold d-flex align-items-center justify-content-between">
          Teams
         <span class="badge badge-pill badge-danger total-teams">Total - 0</span>
         </h5>
         <div class="teams-loader d-none">
           <div class="loader"></div>
         </div>
         <div class="teams-message"></div>
         <div class="teams-area"></div>
         <div class="teams-pagination"></div>
       </div>
     </div>
  </div>
  <div class="col-md-5">
        <div class="card border-0 rounded-0 shadow-sm mb-4">
       <div class="card-body">
         <h5 class="quicksand-font font-weight-bold d-flex justify-content-between">
         Job Roles
          <span class="badge badge-pill badge-danger total-roles">Total - 0</span>
       </h5>
        <div class="jobroles-loader d-none">
           <div class="loader"></div>
         </div>
         <div class="show-jobroles"></div>
          
       </div>
     </div>
  </div>
</div>




@endsection 
@endif


