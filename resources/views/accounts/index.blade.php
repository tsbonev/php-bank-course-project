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
          <td>User id</td>
          <td>Amount</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($accounts as $account)
        <tr>
            <td>{{$account->id}}</td>
            <td>{{$account->user_id}}</td>
            <td>{{$account->amount}}</td>
            <td>
            <form action="{{ route('movements.create') }}" method="get">  
            <input type="hidden" value="{{$account->id}}" name="account_id" /> 
                @csrf
                @method('GET')     
            <button class="btn btn-secondary" type="submit">Make Movement</button>
            </form>
            </td>
            <td>
            <form action="{{ route('movements.index') }}" method="get">
            <input type="hidden" value="{{$account->id}}" name="account_id" />  
                @csrf
                @method('GET')     
            <button class="btn btn-primary" type="submit">Show Movements</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <form action="{{ route('accounts.create')}}" method="get">  
        @csrf
        @method('GET')     
        <button class="btn btn-success" type="submit">Create new account</button>
    </form>
<div>
@endsection