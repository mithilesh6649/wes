@extends("template.default")


@section("title")
 Eigerlab
@endsection


@section("custom-css")
<link rel="stylesheet" href="lang/css/welcome.css?cache=<?php echo time() ?>">
@endsection

@section("custom-js")
<script src="lang/js/welcome.js"></script>
@endsection 


@section("content")
 
 
 <div class="container bg-white shadow-lg my-4">
     <div class="row">
         <div class="col-md-6 p-0 welcome-image"> 
             
         </div>
         <div class="col-md-6 py-5 overflow-hidden">
             <div class="branding">
                 <h1>WES</h1>
                 <p>WES   SOLUTIONS</p>
             </div>

            <div class="welcome-form p-4">
                <form class="signup-from" autocomplete="off" action="/api/company" method="post">
                    @csrf
                     <!-- start step 1 -->
                    <div class="step-1 overflow-hidden  " >
                    
                


                     <div class="form-group mb-4 overflow-hidden">
                    <label class="d-none">Company name</label>
                    <input type="text" name="company_name" class="form-control welcome-form-input rounded-0 required company-name" placeholder="COMPANY NAME" maxlength="80" value="Products">
                    </div>

                        <div class="form-group mb-4 overflow-hidden">
                    <label class="d-none">Company slug</label>
                    <input type="text" name="company_slug" class="form-control welcome-form-input rounded-0   company-slug" placeholder="COMPANY SLUG" maxlength="80"  >
                    </div>


                  <div  class=" form-group mb-4 overflow-hidden">
                  <label class="d-none">Erp Url</label>
                  <input type="url" name="erp_url" class="form-control welcome-form-input rounded-0 erp-url" placeholder="ERP URL"  >
                </div>

                          <div  class=" form-group mb-4 overflow-hidden">
                  <label class="d-none">Password</label>
                  <input type="text" name="password" class="form-control welcome-form-input rounded-0 password" placeholder="PASSWORD"  >
                </div>


             
              


                <div class="form-group mb-4 overflow-hidden">
                    <label class="d-none">Tagline</label>
                    <input type="text" name="tagline" class="form-control welcome-form-input rounded-0" placeholder="TAGLINE" maxlength="95" value="Best products">
                </div>
                
                <div class="form-group mb-4 overflow-hidden">
                    <label class="d-none">Website</label>
                    <input type="website" name="website" class="form-control welcome-form-input rounded-0 url"  maxlength="95" placeholder="WEBSITE">
                </div>

                <div class="form-group mb-4 overflow-hidden">
                    <label class="d-none">Email</label>
                    <input type="email" name="company_email" class="form-control welcome-form-input rounded-0 required" placeholder="EMAIL ID" maxlength="85"  value="mithileshkumar6649@gmail.com" >
                </div>

                <div class="form-group mb-4 overflow-hidden">
                    <label class="d-none">Founder</label>
                    <input type="text" name="founder" class="form-control welcome-form-input rounded-0 required" placeholder="FOUNDER" maxlength="80" value="mithileshkumar">
                </div>

                <div class="form-group mb-4 overflow-hidden">
                    <label class="d-none">Founder email</label>
                    <input type="email" name="founder_email" class="form-control welcome-form-input rounded-0 required" placeholder="FOUNDER EMAIL ID" maxlength="95" value="mithileshkumar7651@gmail.com">
                </div>

                   <div class="form-group">
                    <button type="submit" class="btn float-right next-btn step-1-next-btn ">
                    NEXT<i class="fa fa-angle-double-right ml-2"></i>
                 </button>
                 </div>
                  

                    </div>
                    <!-- end step 1 -->
                     <!--start step 2-->
                 <div class="step-2 d-none  ">
                    <div class="form-group overflow-hidden">
                        <label class="d-none">Contact number</label>
                        <input type="number" name="contact_number" class="form-control welcome-form-input rounded-0 required" placeholder="CONTACT NUMBER" maxlength="15">
                    </div>
                    <div class="form-group overflow-hidden">
                        <label class="d-none">Street address</label>
                        <input type="text" name="street_address" class="form-control welcome-form-input rounded-0 required" placeholder="STREET ADDRESS">
                    </div>
                        <div class="form-group overflow-hidden">
                        <label class="d-none">City</label>
                        <input type="text" name="city" class="form-control welcome-form-input rounded-0 required" placeholder="CITY" maxlength="80">
                    </div>

                        <div class="form-group overflow-hidden">
                        <label class="d-none">State</label>
                        <input type="text" name="state" class="form-control welcome-form-input rounded-0 required" placeholder="STATE" maxlength="80">
                       </div>

                        <div class="form-group overflow-hidden">
                        <label class="d-none">Country</label>
                        <input type="text" name="country" class="form-control welcome-form-input rounded-0 required" placeholder="COUNTRY" maxlength="80">
                        </div>

                        <div class="form-group overflow-hidden">
                        <label class="d-none">Pincode</label>
                        <input type="number" name="pincode" class="form-control welcome-form-input rounded-0 required" placeholder="PINCODE" maxlength="15">
                        </div>

                        <div class="form-group">
                       
                       <button type="submit" class="btn float-left back-btn step-2-back-btn ">
                      <i class="fa fa-angle-double-left ">
                      BACK</i>
                       </button>


                       <button type="submit" class="btn float-right next-btn step-2-next-btn ">
                      NEXT<i class="fa fa-angle-double-right ml-2"></i>
                       </button>
                        </div>
                 </div>
                <!--end step 2-->
                 <!--start step 3 -->
                <div class="step-3 d-none">
                    <div class="form-group overflow-hidden mb-4">
                    <label class="d-none">GSTIN</label>
                    <input type="text" name="gstin" placeholder="GSTIN" class="form-control welcome-form-input rounded-0" maxlength="20">
                    </div>

                    <div class="form-group overflow-hidden mb-4">
                    <label class="d-none">Office starts at</label>
                    <input type="time" name="office_starts_at" class="form-control welcome-form-input rounded-0 required" value="12:00">
                    </div>

                     <div class="form-group overflow-hidden mb-4">
                    <label class="d-none">Office ends at</label>
                    <input type="time" name="office_ends_at" class="form-control welcome-form-input rounded-0 required" value="06:00">
                    </div>

                    <div class="form-group overflow-hidden mb-4">
                    <label class="d-none">Established in</label>
                    <input type="date" name="company_estd" class="form-control welcome-form-input rounded-0 required" value="03/04/2021">
                    </div>

                    <div class="form-group overflow-hidden mb-4">
                    <label class="d-none">Facebook page url</label>
                    <input type="url" name="facebook_url" placeholder="FACEBOOK PAGE URL" class="form-control welcome-form-input rounded-0 url ">
                    </div>

                    <div class="form-group overflow-hidden mb-4">
                    <label class="d-none">Twitter url</label>
                    <input type="url" name="twitter_url" placeholder="TWITTER PAGE URL" class="form-control welcome-form-input rounded-0 url">
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn float-left back-btn step-3-back-btn ">
                      <i class="fa fa-angle-double-left ">
                      BACK</i>
                      </button>
                      <button type="submit" class="btn float-right next-btn step-3-next-btn ">
                      NEXT<i class="fa fa-angle-double-right ml-2"></i>
                       </button>
                        </div>
                    
                </div>
                <!-- end step 3 -->

                <!-- start step 4 -->
                 <div class="step-4 d-none">
                    <div class="form-group overflow-hidden mb-4">
                        <label class="d-none">What's app number</label>
                      <input type="number" name="whats_app" class="form-control welcome-form-input rounded-0" placeholder="WHAT'S APP NUMBER" maxlength="15">
                    </div>

                    <div class="form-group overflow-hidden mb-5">
                    <label>Category</label>
                     <select name="category" class="form-control required">
                        <option>Education</option>
                     </select>
                     
                    </div>
                    
                     <div class="form-group">
                      <button type="submit" class="btn float-left back-btn step-4-back-btn ">
                      <i class="fa fa-angle-double-left ">
                      BACK</i>
                      </button>
                      <button type="submit" class="btn float-right submit-btn rounded-0" >
                      SUBMIT
                       </button>
                        </div>
                    

                 </div>
                <!-- end step 4 --> 
                </form>
            </div>

         </div>
     </div>
 </div>

@endsection