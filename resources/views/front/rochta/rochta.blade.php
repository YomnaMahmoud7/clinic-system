@extends('layouts.app')

@section('title')
Rochta
@endsection
@section('content')
<div class="action-buttons d-flex justify-content-center">
    <button type="button"  class="btn btn-info mr-1" onclick="printJS('rouchta', 'html')">
       <i class="fas fa-print"></i>
       
       Print 

    </button>

 <button type="button" class="btn btn-info btn-md mr-1" data-toggle="modal" data-target="#modal1">
       <i class="fas fa-plus"></i>
    Medical</button>

 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#modal2">
       <i class="fas fa-plus"></i>
    Advices</button>

 <div class="modal hide fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <h4>Medical Treatment</h4>
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
             <div class="table-responsive">
                <table class="table text-center">
                   <thead>
                      <tr>
                         <th scope="col">Name OF TreatMent</th>
                         <th scope="col">Action</th>

                      </tr>
                   </thead>
                   <tbody>
                      <tr>
                         <th scope="row">Example</th>
                         <td>
                            <button class="btn btn-info">
                               Add To Rouchta
                            </button> </td>

                      </tr>
                      <tr>
                         <th scope="row">Example</th>
                         <td>
                            <button class="btn btn-info">
                               Add To Rouchta
                            </button> </td>
                      </tr>
                      <tr>
                         <th scope="row">Example</th>
                         <td>
                            <button class="btn btn-info">
                               Add To Rouchta
                            </button> </td>
                      </tr>
                   </tbody>
                </table>
             </div>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
          </div>
       </div>
    </div>
 </div>
</div>



 <div class="modal hide fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <h4>Advices</h4>
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
                <div class="table-responsive">
                      <table class="table text-center">
                         <thead>
                            <tr>
                               <th scope="col">Advice</th>
                               <th scope="col">Action</th>

                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <th scope="row">Example</th>
                               <td>
                                  <button class="btn btn-info">
                                     Add To Rouchta
                                  </button> </td>

                            </tr>
                            <tr>
                               <th scope="row">Example</th>
                               <td>
                                  <button class="btn btn-info">
                                     Add To Rouchta
                                  </button> </td>
                            </tr>
                            <tr>
                               <th scope="row">Example</th>
                               <td>
                                  <button class="btn btn-info">
                                     Add To Rouchta
                                  </button> </td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
       </div>
    </div>
 </div>

<div class="rouchta p-4" id="rouchta">
<div class="container">
<div class="row">
 <div class="col-md-4 p-3 text-center">
       <i class="fas fa-tooth fa-3x text-info"></i>
    <h3 class="text-info ">Nice Dental Care</h3>
 </div>
 <div class="col-md-8 bg-primary text-white p-3">
    <div class="d-flex">
       <div class="align-self-start p-2">
             <i class="fas fa-phone-volume fa-lg"></i>
       </div>
       <div class="p-2 align-self-end">
<p>+20223103923</p>
       </div>
    </div>
    <div class="d-flex">
          <div class="align-self-start p-2">
                <i class="fas fa-map-marker fa-lg"></i>                  </div>
          <div class="align-self-end p-2">
<p>El-Maadi 14 ElBadr Tower 6th Floor - Apartmenet 601</p>
          </div>
       </div>
       <div class="d-flex">
             <div class="align-self-start p-2">
                   <i class="fas fa-envelope fa-lg"></i>                     </div>
             <div class="align-self-end p-2">
<p>nicedentalcare1@gmail.com</p>
             </div>
          </div>
 </div>
</div>
<div class="row second-section p-3">
 <div class="col-md-4">
<form action="">
<div class="form-group">
<label for="">Name</label>
 <input type="text" name="" value="" class="form-control" >

</div>
<div class="form-group">
 <label for="">Adv</label>
<textarea name="" id="" cols="30" rows="16" class="form-control"></textarea>
</div>

 </div>
 <div class="col-md-8">
       <div class="form-group">
<h3 class="font-italic">D</h3>
          <textarea name="" id="" cols="30" rows="20" class="form-control"></textarea>
          </div>
          <button class="btn btn-info btn-md float-right">Submit</button>
       </form>

 </div>
</div>
</div>
</div>

@endsection


@section('js')
 <!--Js Files -->
 <script src="js/jquery.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>


<script src="js/bootstrap.min.js"></script>

 <!-- <script defer src=" https://use.fontawesome.com/releases/v5.3.1/js/all.js "></script> -->
 <script src=" js/plugins/jquery-ui.custom.min.js "></script>
 <script
    src=" https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js ">
 </script>
 <script src="js/print.min.js"></script>
 <script src=" js/plugins/bootstrap-datepicker.min.js "></script>
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js "></script>
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js "></script>
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js ">
 </script>
 <script src=" js/script.js "></script>
 <script type=" text/javascript ">
    $(document).ready(function () {
       $(" #sidebar ").mCustomScrollbar({
          theme: " minimal "
       });

       $('#sidebarCollapse').on('click', function () {
          $('#sidebar, #content').toggleClass('active');
          $('.collapse.in').toggleClass('in');
          $('a[aria-expanded=true]').attr('aria-expanded', 'false');
       });
    });
 </script>

@endsection