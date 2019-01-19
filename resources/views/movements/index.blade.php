@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Action</td>
          <td>Amount</td>
          <td>Time</td>
        </tr>
    </thead>
    <tbody>
        @foreach($movements as $movement)
        <tr>
            <td>{{$movement->id}}</td>
            <td>{{$movement->type}}</td>
            <td>{{$movement->amounts}}</td>
            <td>{{$movement->time}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <form action="{{ route('accounts.index')}}" method="get">  
        @csrf
        @method('GET')     
        <button class="btn btn-info" type="submit">Go Back</button>
    </form>
<div>
@endsection