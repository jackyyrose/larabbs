@extends('layouts.app')

@section('content')
<div class="card ">
  <div class="card-header">
      <h5>Initiate a payment:</h5>
  </div>
  <div class="card-body">
      @include('shared._messages')
      <form method="POST" action="{{ route('payments.store') }}">
          {{ csrf_field() }}
          <div class="form-group">
              <label for="payee_id">To Id: </label>
              <input type="text" name="payee_id" class="form-control" value="{{ $payee ? $payee->user_id : '' }}">
          </div>
          <div class="form-group">
              <label >Company Name: </label>
              <input type="text"  class="form-control" value="{{ $payee ? $payee->company_name : ''}}">
          </div>
          <div class="form-group">
              <label for="amount">Amount: </label>
              <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" value="0">
              @error('amount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="form-group">

              <input type="radio" id="bpa0" name="binded_payment_account_id" value="0" checked>
              <label for="bpa0">Use Platform Balance (Balance: {{Auth::user()->balance}}) </label><br>
              <input type="radio" id="bpa1" name="binded_payment_account_id" value="1" disabled>
              <label for="bpa1">Creait Card</label><br>
              <input type="radio" id="bpa2" name="binded_payment_account_id" value="2" disabled>
              <label for="bpa2">Online Banking</label><br>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
@endsection
