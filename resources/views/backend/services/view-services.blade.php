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
                  <h3>Slider List
                  <a class="btn btn-success float-right btn-sm" href="{{route('services.add')}}">
                          <i class="fa fa-plus-circle">Add Services</i>
                      </a>
                  </h3>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                
                    <tr>
                        <th>N.</th>
                        <th>Short Title</th>
                        <th>Long Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($all_data as $key=>$services)
                    <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$services->short_title}}</td>
                    <td>{{$services->long_title}}</td>
                    <td>
                    <a title="edit" style="margin: 2%" class="btn btn-primary float-right btn-sm" href="{{route('services.edit',$services->id)}}"><i class="fa fa-edit"></i>
                    <a title="delete" style="margin: 2%" class="btn btn-danger float-right btn-sm" href="{{route('services.delete',$services->id)}}"><i class="fa fa-trash"></i>
                    </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
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
      
@endsection
