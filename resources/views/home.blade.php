@extends('master')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Companies</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Companies</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if (session('message'))
    <div class="alert alert-success text-center">
        {{ session('message') }}
    </div>
@endif
        <div class="text-right mb-4">
            <a href="{{route('company.create')}}"><button class="btn btn-primary">Add Company</button></a>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody> 
                    @if (count($companies) > 0)
                    @php $i=1; @endphp
                    @foreach($companies as $company)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td><a href="{{$company->website}}" target="_blank">{{$company->website}}</a></td>
                    <td><img src="{{$company->logo}}" alt="" height="100" width="100"></td>
                    <td colspan="2" class="d-flex"><a href="{{route('company.edit',$company->id)}}" class="btn btn-primary">Edit</a> &nbsp;&nbsp;
                        <form method="post" action="{{route('company.destroy',$company->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                  </tr>
                  @php $i++;  @endphp
                  @endforeach
                  @endif
                </tbody>
              </table>
                <div class="col-md-1 mr-auto ml-auto">
                    {{ $companies->links() }}
                </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
@endsection