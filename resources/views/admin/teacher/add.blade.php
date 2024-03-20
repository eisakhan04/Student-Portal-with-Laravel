@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Teacher</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
           
         
              <!-- form start -->
              <form method="Post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body" >
                  <div class="row">
                     <div class="form-group col-md-6">
                     <label >First Name <span style="color: red;">*</span></label>
                     <input type="text" class="form-control" value="{{ old('name') }}" name="name" required placeholder="First Name">
                     </div>

                     <div class="form-group col-md-6">
                        <label >Last Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" required placeholder="Last Name">
                      </div>
      
                      <div class="form-group col-md-6">
                                        <label>Gender<span style="color: red;">*</span></label>
                                        <select class="form-control" required name="gender">
                                            <option  value="">Select Gender</option>
                                            <option {{ ( old('gender' ) =='Male' ) ? 'selected' : '' }}  value="Male">Male</option>
                                            <option {{ ( old('gender' ) == 'Female') ? 'selected' : '' }}  value="Female">Female</option>
                                            <option {{ ( old('gender' ) == 'Other') ? 'selected' : '' }}  value="Other">Other</option>
                                        </select>
                                    </div>
                      
                        <div class="form-group col-md-6">
                        <label >Date of Birth <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" value="{{ old('date_of_birth') }}" name="date_of_birth" required >
                      </div>
                     
                      <div class="form-group col-md-6">
                        <label >Date of Joining <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" value="{{ old('admission_date') }}" name="admission_date" required placeholder="admission_date">
                      </div>

                      

                      <div class="form-group col-md-6">
                        <label>	Mobile Number <span style="color: red;"></span></label>
                        <input type="text" class="form-control" value="{{ old('mobile_number') }}" name="mobile_number" required placeholder="Mobile Number ">
                      </div>
                        
                      <div class="form-group col-md-6">
                        <label>Marital Status<span style="color: red;"></span></label>
                        <input type="text" class="form-control" value="{{ old('marital_status') }}" name="marital_status" required placeholder="Marital Status ">
                      </div>
                       
                      <div class="form-group col-md-6">
                        <label>Profile Pic <span style="color: red;"></span></label>
                        <input type="file" class="form-control"  name="profile_pic" >
                      </div>

                    
                      <div class="form-group col-md-6">
                             <label>Current Address <span style="color: red;"></span></label>
                             <div class="input-group">
                             <textarea class="form-control" name="address" required placeholder="">{{ old('address') }}</textarea>
                             </div>
                             </div>
 
                     
                      <div class="form-group col-md-6">
                             <label>Permanent Address <span style="color: red;"></span></label>
                             <div class="input-group">
                             <textarea class="form-control" name="permanent_address" required placeholder="">{{ old('permanent_address') }}</textarea>
                             </div>
                             </div>

                     
                      <div class="form-group col-md-6">
                             <label>Qulification <span style="color: red;"></span></label>
                             <div class="input-group">
                             <textarea class="form-control" name="qulification" required placeholder="">{{ old('qulification') }}</textarea>
                             </div>
                             </div>
                             
                       
               

                      <div class="form-group col-md-6">
                             <label>Work Experience <span style="color: red;"></span></label>
                             <div class="input-group">
                             <textarea class="form-control" name="work_experience" required placeholder="">{{ old('work_experience') }}</textarea>
                             </div>
                             </div>
                             
                             <div class="form-group col-md-6">
                             <label>Note <span style="color: red;"></span></label>
                             <div class="input-group">
                             <textarea class="form-control" name="note" required placeholder="Note">{{ old('note') }}</textarea>
                             </div>
                             </div>


                      <div class="form-group col-md-6">
                         <label >Status <span style="color: red;">*</span></label>
                         <select class="form-control" required name="status">
                         <option value="">Select Status</option>
                         <option value="Male">Active</option>
                         <option value="Female">Inactive</option>
                         
                         </select>
                        </div> 

                    </div>
                 
                  <div class="form-group">
                    <label >Email <span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" required  placeholder="Enter email">
                    <div style="color:red;">{{$errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label >Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                  </div>
             
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
           

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection