@extends('layouts.app')


@section('content')
<div class="apponintment m-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="d-flex">
          <div class="p-2 align-self-start"> <i class="far fa-star"></i>
          </div>
          <div class="p-1 align-self-end">
            <p class="lead font-weight-bold">New Reservation</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 ">
        <!-- Button to Open the Modal -->
        <div class="d-flex float-right">
          <div class="p-2 align-self-start">
            <button type="button" class="btn btn-reversation" data-toggle="modal" data-target="#myModal">Add Apponintment</button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">New Reversation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    
                    <form class="form-horizontal" role="form" id="addform" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter Full name" name="fullname">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Mobile Phone</label>
                        <input type="number" class="form-control" placeholder="Phone Number" name="phone">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Date</label>
                        <input type="date" class="form-control" placeholder="Enter Date" name="date">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Reason</label>
                        <input type="text" name="reason" class="form-control" placeholder="Enter Reason">
                      </div>
                      <div class="form-group"> <span>Status</span>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                          <label class="form-check-label" for="inlineRadio1">New Reversation</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                          <label class="form-check-label" for="inlineRadio2">Follow Up</label>
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-info" id="add">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- Modal footer -->
                  <!-- <div class="modal-footer">
                              <button type="button" class="btn btn-secondary"
                                 data-dismiss="modal">Close</button>
                           </div> --></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>
      <!--Apponintment Div-->
      <!--calender view -->
      <section class="calender-view justify-content-center">
        <div class="container">
          <div class="row">
            <div class="tile">
              <div class="col-md-12">
                <div id="calendar"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--end calander view -->


@endsection

@section('js')


 <script type="text/javascript">
  // $(document).on('click','#create_modal_reservation',function(){
  //   $('#create').modal('show');
  //   $('.form-horizontal').show();
  //   $('.modal-title').text('Add Appointment');

  // });

  

  $('#add').click(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });

    $.ajax({
      type:"POST",
      url : "<?php echo url('addreservation'); ?>",
      data: {
        '_token': CSRF_TOKEN,
        'patient_id': $('input[name=patient_id]').val()
      },
      dataType:"json",
      success:function(data){
        
        if((data.errors)){
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.title);
          $('.error').text(data.errors.body);
          
        }else{
          // $('.error').remove();
          // $('#table').append("<tr class='post" + data.id + "'>"+
          // "<td>" + data.id + "</td>"+
          // "<td>" + data.patient_id + "</td>"+
          // "<td>" + data.created_at + "</td>"+
          // "<td>" + data.patient_id + "</td>"+
          // "<td>" + data.created_at + "</td>"+
          // "<td>" + data.patient_id + "</td>"+
          // "<td>" + data.created_at + "</td>"+
          // "</tr>");
        }

      }
    });
  });

  /*****************************Try 1*****************************************/

  //  $(document).ready(function(){
    
  //   $('#addform').on('submit',function(e){
  //     e.preventDefault();

  //     $.ajax({
  //     type: "POST",
  //     url :"/addreservation",
  //     data:$('#addform').serialize(),
  //     success: function(response){
  //       console.log(response);
  //       console.log("right");
  //      // $('add-reservation-modal').modal('hide');
  //      alert("Data Saved");
  //     },
  //     error: function(error){
  //       console.log(error);
  //       console.log("false");
  //     }

  //     });

  //   });


  // });

</script>
@endsection




    



