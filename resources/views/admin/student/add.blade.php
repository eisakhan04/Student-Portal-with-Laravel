@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Student</h1>
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
                        <label >Admission Number <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{ old('admission_number') }}" name="admission_number" required placeholder="Admission Number">
                      </div>

                      <div class="form-group col-md-6">
                        <label >Roll Number </label>
                        <input type="text" class="form-control" value="{{ old('roll_number') }}" name="roll_number" required placeholder="Roll Number">
                      </div>  


                       <div class="form-group col-md-6">
                         <label >Class<span style="color: red;">*</span></label>
                         <select class="form-control" required name="class_id">
                            
                         <option value="">Select Class</option>
                         @foreach($getClass as $value)
                         <option {{ ( old('class_id') == $value->id) ? 'selected' : '' }}  value="{{$value->id}}">{{$value->name}}</option>
                         @endforeach
                         </select>
                        </div> 


                         
                        <div class="form-group col-md-6">
                         <label >Gender<span style="color: red;">*</span></label>
                         <select class="form-control" required name="gender">
                         <option  value="">Select Gender</option>
                         <option  value="Male">Male</option>
                         <option  value="Female">Female</option>
                         <option  value="Other">Other</option>
                         </select>
                        </div> 
                      
                        <div class="form-group col-md-6">
                        <label >Date of Birth <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" value="{{ old('date_of_birth') }}" name="date_of_birth" required >
                      </div>


                      <div class="form-group col-md-6">
                        <label> Caste </label>
                        <input type="text" class="form-control" value="{{ old('caste') }}" name="caste" required placeholder="Caste">
                      </div>
                         
                      <div class="form-group col-md-6">
                        <label>Religion <span style="color: red;"></span></label>
                        <input type="text" class="form-control" value="{{ old('religion') }}" name="religion" required placeholder="Religion">
                      </div>

                      <div class="form-group col-md-6">
                        <label>	Mobile Number <span style="color: red;"></span></label>
                        <input type="text" class="form-control" value="{{ old('mobile_number') }}" name="mobile_number" required placeholder="Mobile Number ">
                      </div>

                      <div class="form-group col-md-6">
                        <label>Admission Date <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" value="{{ old('admission_date') }}" name="admission_date" required placeholder="Admission Date">
                      </div>

                      <div class="form-group col-md-6">
                        <label>Profile Pic <span style="color: red;"></span></label>
                        <input type="file" class="form-control"  name="profile_pic" >
                      </div>

                      
                      <div class="form-group col-md-6">
                        <label>	Blood Group <span style="color: red;"></span></label>
                        <input type="text" class="form-control"  name="blood_group" value="{{ old('blood_group') }}" required  placeholder="Blood Group " >
                      </div>

                      <!-- height -->
                      <div class="form-group col-md-6">
                        <label>Height <span style="color: red;"></span></label>
                        <input type="text" class="form-control"  name="height" value="{{ old('height') }}" required  placeholder="Height" >
                      </div>


                      <!-- weight -->
                      <div class="form-group col-md-6">
                        <label>	Weight<span style="color: red;"></span></label>
                        <input type="text" class="form-control"  name="weight" value="{{ old('weight') }}"  required  placeholder="  Weight " >
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