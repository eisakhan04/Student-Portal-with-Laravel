@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

          <h1>Class List (Total : {{ $getRecord->total() }} )</h1>
        </div>
        <div class="col-sm-6 " style="text-align:right;">
          <a href="{{ url('admin/class/add') }}" class="btn btn-primary">Add New Class</a>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- general form elements -->
  <div class="card ">
    <div class="card-header">
      <h3 class="card-title">Search Class</h3>
      <!-- form start -->
      <form method="get" action="">

        <div class="card-body">

        </div>
        <div class="row">

          <div class="form-group col-md-3">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Enter Name">
          </div>
          <div class="form-group col-md-3">
            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
            <a href="{{ url('admin\class\list')  }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
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
            <h3 class="card-title">Class List </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Created By</th>
                  <th>Created Date</th>
                  <th>Action</th>
                </tr>

              </thead>
              <tbody>
                @foreach($getRecord as $value)
                <tr>
                  <td>{{ $value->id }}</td>
                  <td>{{ $value->name }}</td>
                  <td>
                    @if ($value->status == 0)
                    Active
                    @else
                    Inactive
                    @endif
                  </td>
                  <td>{{ $value->created_by_name }}</td>
                  <td>{{date('d-m-Y H:i A' , strtotime($value->created_at))  }}</td>
                  <td>
                      <a href="{{ url('admin/class/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                      <a href="{{ url('admin/class/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
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