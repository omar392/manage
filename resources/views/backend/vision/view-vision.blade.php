@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Visions </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Visions</li>
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
                  <h3>Visions List
                  <a class="btn btn-success float-right btn-sm" href="{{route('visions.add')}}">
                          <i class="fa fa-plus-circle">Add Visions</i>
                      </a>
                  </h3>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                
                    <tr>
                        <th>N.</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($all_data as $key=>$visions)
                    <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{(!empty($visions->image))?url('upload/vision_images/'.$visions->image):url('upload/no_image.jfif')}}" width="120px" height="130px" alt="logo"></td>
                    <td style="width: 30%">{{$visions->title}}</td>
                    <td>
                    <a title="edit" style="margin: 2%" class="btn btn-primary float-right btn-sm" href="{{route('visions.edit',$visions->id)}}"><i class="fa fa-edit"></i>
                    <a title="delete" style="margin: 2%" class="btn btn-danger float-right btn-sm" href="{{route('visions.delete',$visions->id)}}"><i class="fa fa-trash"></i>
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
