@extends('layouts.master')

@section('title','| Codermen.com ')
@section('style')


@endsection


@section('content')

<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="col-md-12">
            <h1>Pizza Zone Online Reservation System</h1>
        </div>
    </div>
    <form>
    <div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Date</label>
                    <input type="date" class="form-control" id="reservationCalendarDate" aria-describedby="emailHelp" placeholder="Select Date">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="exampleFormControlSelect1">Select Time</label>
                    <select class="form-control" id="selectedReservationSlot">
                        @if($slots->isNotEmpty())
                            @foreach ($slots as $slot )
                                <option>{{ $slot->time }}</option>
                            @endforeach
                        @endif
                    </select>
                 </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="noOfPersons">Number of Persons</label>
                    <input type="number" class="form-control" id="noOfPersons" name="no_of_persons">
                </div>
            </div>
        </div>
        <div>
            <div class="row section-box" style="margin-top:10px;margin-bottom:10px;">
                @if($tables->isNotEmpty())
                    @foreach ($tables as $table )

                    <div class="col-md-3 text-center" style="margin-top:10px;margin-bottom:10px;">
                        <div class="description-text">
                            <p>{{ $table->id }}</p><br>
                            <p>{{ $table->size }} persons</p>

                        </div>
                    <button type="button" class="btn btn-sm btn-primary" onclick=openReservationModal({{ $table->id }},'{{ $table->size }}')>
                    Book Now
                    </button>
                </div>
                        
                    @endforeach
                @endif
            </div>
        
        </div>
    </div>
</div>
</form>
<!--Modal For Reservation -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" action="/reservation">
            {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="reservationDate">Date:<span id="reservationDate"> 05/05/2021</span></label>
                    </div>
                    <div class="col-md-6">
                         <label for="reservationDate">Date:<span id="reservationTime"> 05.00 PM</span></label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstname" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Last Name</label>
                        <input type="text" class="form-control" id="inputPassword4" name="lastname" placeholder="Last Name">
                    </div>
                     <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Phone Number</label>
                        <input type="text" class="form-control" id="inputPassword4" name="phone_number" placeholder="PhoneNumber">
                    </div>
                    <input type="hidden" name="date" id="reservedDate" value="">
                    <input type="hidden" name="slot" id="slot" value="">
                    <input type="hidden" name="table" id="tableId" value="">
                    <input type="hidden" name="size" id="noOfPeople" value="">


                </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Book Now</button>
      </div>
            </form>

    </div>
  </div>
</div>
<!--Modal For Reservation End -->

@endsection

@section('script')

<script>

{{-- var csrf_token = '<%= token_value %>';
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }); --}}


  function openReservationModal(table_id, size){
      var table_id;
      var size;
      var  reservationCalendarDate=$("#reservationCalendarDate").val();
      var  selectedReservationSlot=$("#selectedReservationSlot").val();
      var  noOfPersons=$("#noOfPersons").val();

      $("#reservedDate").val(reservationCalendarDate);
      $("#slot").val(selectedReservationSlot);
      $("#tableId").val(table_id);
      $("#noOfPeople").val(noOfPersons);



     $("#reservationDate").html(reservationCalendarDate);
     $("#reservationTime").html(selectedReservationSlot);
     $('#myModal').modal('show')
      

{{-- 
    test={
      table_id,
      size:size
    };
    $.ajax({
            type: 'POST',
            url:'/reservation',
            data: test,
            success: function(response)
            {
              


            },
            error: function (res) {
             

              if (res.status == 422) {
                  $('.errors').empty();
                  var data = res.responseJSON.error;
                  for (let i in data) {
                    $('.errors').append('<div class="alert alert-danger">'+data[i][0]+'</div>');
                  }
              }
            }
      }); --}}

  }

 


</script>

@endsection