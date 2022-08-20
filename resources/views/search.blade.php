
@extends('layout')
@section('content')
<h1> Search for your Restaurant </h1>
<form action="makesearch" class="col-sm-6   navbar-left">
      <div class="form-group">
        <input type="text" name="query" class="form-control search-box">
        </div>
        <button type="submit" class="btn btn-default">Search</button>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->address}}</td>
</tr>
      @endforeach
    
  </tbody>
</table>
@stop