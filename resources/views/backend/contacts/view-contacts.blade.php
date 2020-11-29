@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Contacts </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
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
                  <h3>Contacts List
                    @if ($count_contact<1)
                                          <a class="btn btn-success float-right btn-sm" href="{{route('contacts.add')}}">
                          <i class="fa fa-plus-circle">Add Contacts</i>
                      </a> 
                        @endif
                  </h3>
               
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                
                    <tr>
                        <th>N.</th>
                        <th>Address</th>
                        <th>Mobile Num</th>
                        <th>Email</th>
                        <th>FaceBook</th>
                        <th>YouTube</th>
                        <th>Google Plus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($all_data as $key=>$contacts)
                    <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$contacts->address}}</td>
                    <td>{{$contacts->mobile}}</td>
                    <td>{{$contacts->email}}</td>
                    <td>{{$contacts->facebook}}</td>
                    <td>{{$contacts->youtupe}}</td>
                    <td>{{$contacts->google_plus}}</td>
                    <td>
                    <a title="edit" style="margin: 2%" class="btn btn-primary float-right btn-sm" href="{{route('contacts.edit',$contacts->id)}}"><i class="fa fa-edit"></i>
                    <a title="delete" style="margin: 2%" class="btn btn-danger float-right btn-sm" href="{{route('contacts.delete',$contacts->id)}}"><i class="fa fa-trash"></i>
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
