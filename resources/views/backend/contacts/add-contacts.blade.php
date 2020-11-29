@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Services </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Services</li>
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
                  <h3> Services List
                  <a class="btn btn-success float-right btn-sm" href="{{route('sliders.view')}}">
                          <i class="fa fa-list">Your Logo</i>
                      </a>
                  </h3>
              <div class="card-body">
              <form method="POST" action="{{route('contacts.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group col-md-12">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control" id="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address">Email</label>
                        <input type="email" name="email" class="form-control" id="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address">FaceBook Account</label>
                        <input type="text" name="facebook" class="form-control" id="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address">YouTube</label>
                        <input type="text" name="youtupe" class="form-control" id="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address">Google Plus </label>
                        <input type="text" name="google_plus" class="form-control" id="">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" value="Submit" class="btn btn-primary">
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
