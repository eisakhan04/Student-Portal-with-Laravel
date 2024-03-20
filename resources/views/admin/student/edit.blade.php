@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Student</h1>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('name' , $getRecord->name) }}" name="name" required placeholder="First Name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Last Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('last_name' , $getRecord->last_name) }}" name="last_name" required placeholder="Last Name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Admission Number <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('admission_number' ,$getRecord->admission_number) }}" name="admission_number" required placeholder="Admission Number">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Roll Number </label>
                                        <input type="text" class="form-control" value="{{ old('roll_number' , $getRecord->roll_number) }}" name="roll_number" required placeholder="Roll Number">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Class<span style="color: red;">*</span></label>
                                        <select class="form-control" required name="class_id">
                                            <option value="">Select Class</option>
                                            @foreach($getClass as $value)
                                            <option  {{ ( old('class_id' , $getRecord->class_id ) == $value->id) ? 'selected' : '' }}  value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label>Gender<span style="color: red;">*</span></label>
                                        <select class="form-control" required name="gender">
                                            <option  value="">Select Gender</option>
                                            <option {{ ( old('gender' , $getRecord->gender ) =='Male' ) ? 'selected' : '' }}  value="Male">Male</option>
                                            <option {{ ( old('gender' , $getRecord->gender ) == 'Female') ? 'selected' : '' }}  value="Female">Female</option>
                                            <option {{ ( old('gender' , $getRecord->gender ) == 'Other') ? 'selected' : '' }}  value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Date of Birth <span style="color: red;">*</span></label>
                                        <input type="date" class="form-control" value="{{ old('date_of_birth' ,$getRecord->date_of_birth) }}" name="date_of_birth" required>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label> Caste </label>
                                        <input type="text" class="form-control" value="{{ old('caste' ,$getRecord->caste) }}" name="caste" required placeholder="Caste">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Religion <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('religion', $getRecord->religion) }}" name="religion" required placeholder="Religion">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label> Mobile Number <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" value="{{ old('mobile_number',$getRecord->mobile_number) }}" name="mobile_number" required placeholder="Mobile Number ">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Admission Date <span style="color: red;">*</span></label>
                                        <input type="date" class="form-control" value="{{ old('admission_date', $getRecord->admission_date) }}" name="admission_date" required placeholder="Admission Date">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Profile Pic <span style="color: red;"></span></label>
                                        <input type="file" class="form-control" name="profile_pic" >
                                        <div style="color: red;">{{ $errors->first('profile_pic') }}</div>
                                        @if(!empty($getRecord->getProfile()))
                                        <img src="{{ $getRecord->getProfile() }} " style="width:auto; height: 50px;">
                                        @endif
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label> Blood Group <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group' , $getRecord->blood_group) }}" required placeholder="Blood Group ">
                                    </div>

                                    <!-- height -->
                                    <div class="form-group col-md-6">
                                        <label>Height <span style="color: red;"></span></label>
                                        <input type="text" class="form-control" name="height" value="{{ old('height', $getRecord->height) }}" required placeholder="Height">
                                    </div>


                                    <!-- weight -->
                                    <div class="form-group col-md-6">
                                        <label> Weight<span style="color: red;"></span></label>
                                        <input type="text" class="form-control" name="weight" value="{{ old('weight' , $getRecord->weight) }}" required placeholder="  Weight ">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Status <span style="color: red;">*</span></label>
                                        <select class="form-control" required name="status">
                                            <option value="">Select Status</option>
                                            <option {{ ( old('status' , $getRecord->status ) == 0) ? 'selected' : '' }}  value="Male">Active</option>
                                            <option {{ ( old('status' , $getRecord->status ) == 1) ? 'selected' : '' }} value="Female">Inactive</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label>Email <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" name="email"  value="{{ old('email' ,$getRecord->email) }}" placeholder="Enter email">
                                    <div style="color:red;">{{$errors->first('email')}}</div>
                                </div>
                                <div class="form-group">
                                    <label>Password <span style="color: red;">*</span></label>
                                    <input type="password" class="form-control" name="password"  placeholder="Password">
                                   <p>Do you want to change password  so Pleaase add New password</p>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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