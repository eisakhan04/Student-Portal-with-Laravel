@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher List (Total : {{ $getRecord->total() }} )</h1>
          </div>
          <div class="col-sm-6 " style="text-align:right;">
            <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Add New Teacher</a>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
            <!-- general form elements -->
            <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Search Teacher</h3>
              <!-- form start -->
              <form method="get" action="">
               
                <div class="card-body" >
               
              </div>
                  <div class="row">

                  <div class="form-group col-md-3">
                  <label >Name</label>
                    <input type="text" class="form-control" name="name"  value="{{ Request::get('name') }}" placeholder="Enter Name">
                  </div>
                  <div class="form-group col-md-3">
                    <label >Email </label>
                    <input type="text" class="form-control" name="email"  value="{{ Request::get('email') }}"  placeholder="Enter email"> 
                  </div>
                  <div class="form-group col-md-3">
                   <button class="btn btn-primary" type="submit" style="margin-top: 30px;" >Search</button>
                   <a href="{{ url('admin\parent\list')  }}" class="btn btn-success"  style="margin-top: 30px;" >Reset</a>
                  </div>
                  </div>
                </div>
          
              </form>
            </div>
           
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-12">
          @include('_message')
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Teacher List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 "style= "overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Date of Joining</th>
                      <th>Mobile Number</th>
                      <th>Marital Status</th>
                      <th>Current Address</th>
                      <th>Permanent Address</th>
                      <th>Qulification</th>
                      <th>Work Experience</th>
                      <th>Note</th>
                      <th>Status</th>
                      <th >Created Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($getRecord as $value)
                   <tr>
                      <td>{{$value->id}}</td>
                      <td>
                        @if(!empty($value->getprofile()))
                        <img src="{{ $value->getprofile() }}" style="height: 50px; width: 50px; border-radius: 50px;">
                        @endif
                       </td>
                        <td>{{$value->name}}    {{$value->last_name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->gender}}</td>
                        <td>
                             @if(!empty($value->date_of_birth))
                               {{ date('d/m/Y', strtotime($value->date_of_birth)) }}
                              @endif
                          </td>
                          <td>
                              @if(!empty($value->admission_date))
                                {{ date('d/m/Y', strtotime($value->admission_date)) }}
                              @endif  

                           </td>
                        <td>{{$value->mobile_number}}</td>
                        <td>{{$value->marital_status}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->permanent_address}}</td>
                        <td>{{$value->qulification}}</td>
                        <td>{{$value->work_experience}} </td>
                        <td>{{$value->note}}</td>

                        <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                        <td>  {{ date('d/m/Y H:i A', strtotime($value->created_at)) }}</td>
                    
                        <td style="min-width: 150px;" >
                      <a href="{{ url('admin/teacher/edit/'.$value->id) }}" class="btn btn-primary ">Edit</a>
                      <a href="{{ url('admin/teacher/delete/'.$value->id) }}" class="btn btn-danger ">Delete</a>
                      <a href="{{ url('admin/teacher/my-student/'.$value->id) }}" class="btn btn-primary btn-sm ">My Student</a>
                      </td>
                   </tr>
                   @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float:right">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection