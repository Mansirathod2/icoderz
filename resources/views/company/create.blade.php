@extends('master')
@section('content')
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="ml-5 text-center">Companies Add</h1>
              
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Companies Add</li>
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
              <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter company name" id="name">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text"class="form-control" placeholder="Enter Email" value="{{old('email')}}" name="email" id="email">
                    <span class="text-danger">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group">
                    <label for="">Website</label>
                    <input type="text" class="form-control" placeholder="Enter website" value="{{old('website')}}" name="website" id="website">
                    <span class="text-danger">{{$errors->first('website')}}</span>
                </div>
                <div class="form-group">
                    <label for="">Logo</label>
                    <input type="file" class="form-control" placeholder="Select logo" name="logo" id="logo">
                    <span class="text-danger">{{$errors->first('logo')}}</span> 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                
          </div>
        </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    
@endsection