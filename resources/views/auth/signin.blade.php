@extends('dashboard')
  
@section('content')
<div id="bg"></div>

<form action="{{ route('login.post') }}" method="POST">  
    @csrf
<div class="form-field">
    <input type="email" name= "email" placeholder="Email / Username" id="email" value="{{old('email')}}">
  </div>
  
  <div class="form-field">
    <input type="password" placeholder="Password" name="password" id="password" value="{{old('passwped')}}">                        
 </div>
  
  <div class="form-field">
    <button class="btn btn-primary" type="submit">Log in</button>
  </div>
</form>

@endsection
