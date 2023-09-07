@extends('master')
@section('content')
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="ml-5 text-center">Companies Edit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Companies Edit</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="container">
          <div class="">
              <form action="{{route('company.update',$company->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="{{$company->name}}" name="name" placeholder="Enter company name" id="name">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"class="form-control" placeholder="Enter Email" value="{{$company->email}}" name="email" id="email">
                    <span class="text-danger">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" class="form-control" placeholder="Enter website" name="website" value="{{$company->website}}" id="website">
                    <span class="text-danger">{{$errors->first('website')}}</span>
                </div>
                <div class="form-group">
                    <label for="">Logo</label>
                    <input type="file" class="form-control" placeholder="Select logo" name="logo" id="logo">
                    <img src="{{asset($company->logo)}}" width="100" height="100" alt="" class="src">                    
                    <span class="text-danger">{{$errors->first('logo')}}</span>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
                
          </div>
        </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    
@endsection