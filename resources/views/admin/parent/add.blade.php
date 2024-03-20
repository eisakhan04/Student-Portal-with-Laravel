@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Parent</h1>
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
                                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" required placeholder="First Name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Last Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" required placeholder="Last Name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Gender<span style="color: red;">*</span></label>
                                        <select class="form-control" required name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label> Occupation </label>
                                        <input type="text" class="form-control" value="{{ old('occupation') }}" name="occupation" required placeholder="Occupation">
                                        <div style="color:red;">{{$errors->first('occupation')}}</div>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label> Mobile Number <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('mobile_number') }}" name="mobile_number" required placeholder="Mobile Number ">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label> Address </label>
                                        <input type="text" class="form-control" value="{{ old('address') }}" name="address" required placeholder="address">
                                        <div style="color:red;">{{$errors->first('address')}}</div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>Profile Pic <span style="color: red;"></span></label>
                                        <input type="file" class="form-control" name="profile_pic">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Status <span style="color: red;">*</span></label>
                                        <select class="form-control" required name="status">
                                            <option value="">Select Status</option>
                                            <option value="Male">Active</option>
                                            <option value="Female">Inactive</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label>Email <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" name="email" required placeholder="Enter email">
                                    <div style="color:red;">{{$errors->first('email')}}</div>
                                </div>
                                <div class="form-group">
                                    <label>Password <span style="color: red;">*</span></label>
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