@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Make movement
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('movements.store', ['account_id' => $account_id]) }}">
        @csrf
        @method('POST')
        <div class="form-group">
              <label for="amounts">Amount :</label>
              <input type="double" class="form-control" name="amounts"/>
        </div>
        <div class="form-group">
              <label for="type">Type :</label>
              <select name="type"/>
                <option value"deposit">Deposit</option>
                <option value"withdraw">Withdraw</option>
              </select>
        </div>      
          <button type="submit" class="btn btn-primary">Acccept</button>
      </form>
  </div>
</div>
@endsection