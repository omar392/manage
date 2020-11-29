@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Profile </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
     
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
        
            <div class="card">
              <div class="card-header">
                  <h3>Edit Profile
                  <a class="btn btn-success float-right btn-sm" href="{{route('profiles.view')}}">
                          <i class="fa fa-list">Your Profile</i>
                      </a>
                  </h3>
              <div class="card-body">
              <form method="POST" action="{{route('profiles.update')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="usertype">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male" {{($edit_data->gender=="Male")?"selected":""}}>Male</option>
                            <option value="Female" {{($edit_data->gender=="Female")?"selected":""}}>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                      <input type="text" name="name" value="{{$edit_data->name}}" class="form-control" >
                      <font style="color:red">
                      {{($errors->has('name'))?($errors->first('name')):''}}</font>  
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                    <input type="email" name="email" value="{{$edit_data->email}}" class="form-control">
                        <font style="color:red">
                            {{($errors->has('email'))?($errors->first('email')):''}}</font>  
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name">Mobile No.</label>
                      <input type="text" name="mobile" value="{{$edit_data->mobile}}" class="form-control" >
                      <font style="color:red">
                      {{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>  
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name">address</label>
                      <input type="text" name="address" value="{{$edit_data->address}}" class="form-control" >
                      <font style="color:red">
                      {{($errors->has('address'))?($errors->first('address')):''}}</font>  
                    </div>
                    <div class="form-group col-md-4">
                        <img style="width: 150px;hight: 160px;border: 1px solid #000;">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" value="Edit" class="btn btn-primary">
                    </div>
                </div>
              </form>
              </div>
                </div>
              </div><!-- /.card-body -->
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
    $(function () {
     
      $('#myForm').validate({
        rules: {
          usertype: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6
          },
          password2: {
            required: true,
            equalTo: #password
          },
        },
        messages: {
            usertype: {
            required: "Please select a user Role",
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          password2: {
            required: "Please confirm a password",
            equalTo: "Confirm Password doesn't Match"
          },
          terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
@endsection
