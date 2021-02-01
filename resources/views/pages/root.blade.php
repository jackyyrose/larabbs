@extends('layouts.app')
@section('title','Home Page')
@section('content')
  @guest
    <h4>You have not signed in yet. Please log in or sign up a new account.</h4>
  @else
    <h4>Here is your payment history:</h4>
    @include('shared.payments')
    <hr />
    <h4>Try to pay to a business:</h4>
    @include('shared.businesses')
  @endguest
@stop
