
@extends('layout')
@section('content')
<h1> User Login </h1>
<div class="col-sm-8">
<form method="post" action="login">
    @csrf
  <div class="form-group">
    <label>Email </label>
    <input type="text" name="email" class="form-control" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Password </label>
    <input type="password" name="password" class="form-control" placeholder="Enter password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
@stop