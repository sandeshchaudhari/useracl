@extends('layouts.master')

@section('title','reservation ')
@section('style')


@endsection


@section('content')

<div class="container" style="margin-top:100px">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Email</th>
      <th scope="col">PhoneNumber</th>
      <th scope="col">NumberOfPeople</th>
      <th scope="col">DateOfBooking</th>
      <th scope="col">TimeOfBooking</th>
      <th scope="col">TableName</th>
    </tr>
  </thead>
  <tbody>
  @if($reservations->isNotEmpty())
  @foreach ($reservations as $reservation )
    <tr>
      <th scope="row">{{ $reservation->id }}</th>
      <th scope="row">{{ $reservation->user->firstname }}</th>
      <th scope="row">{{ $reservation->user->lastname }}</th>
      <th scope="row">{{ $reservation->user->email }}</th>
      <th scope="row">{{ $reservation->user->phone_number }}</th>
      <th scope="row">{{ $reservation->no_of_people }}</th>

      <th scope="row"></th>

      <th scope="row">{{ $reservation->slot->time }}</th>
      <th scope="row">{{ $reservation->table_id }}</th>


    </tr>
      
  @endforeach

  @else
    <h4>No Reservations Available</h4>
  @endif
  </tbody>
</table>
</div>


@endsection

@section('script')



@endsection