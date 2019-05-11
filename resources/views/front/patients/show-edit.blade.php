@extends('layouts.app')

@section('content')
 <!--Profile Details-->
 <div class="nav-icons mb-5">
    <ul class="nav nav-pills nav-justified">
       <li class="nav-item">
          <a class="nav-link active" href="profile_patient.html">Profile</a>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="rouchta.html">Rouchta</a>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="invoice.html">Billing</a>
       </li>
       <li class="nav-item">
          <a class="nav-link" href="app-history.html">Apponintment History</a>
       </li>
    </ul>
 </div>

 <div class="profile">
    <div class="container">
       <div class="row">
          <div class="col-md-4 text-center">
             <i class="fas fa-user fa-3x mb-2 profile-icon"> </i>
             <h2>Profile</h2>
          </div>
          <div class="col-md-8">
             <form action="/patients/{{$patientData->id}}" method="POST">
        				{{csrf_field()}}
        				{{method_field('PATCH')}}
                <div class="form-row">
                   <div class="form-group col-md-6">
                      <label for="inputEmail4">First Name</label>
                      <input type="text" class="form-control" id="inputEmail4"  value="{{$patientData->name}}" name="name">
                   </div>
                   <div class="form-group col-md-6">
                      <label for="inputPassword4">Last Name</label>
                      <input type="text" class="form-control" id="inputPassword4"  value="{{$patientData->name}}" name="name">
                   </div>
                   <div class="form-group col-md-6">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" id="inputAddress"  value="{{$patientData->address}}" name="address">
                   </div>
                   <div class="form-group col-md-6">
                      <label for="inputAddress">Phone Number</label>
                      <input type="number" class="form-control" id="inputAddress"
                          value="{{$patientData->mobile}}" name="mobile">
                   </div>
                </div>
                <div class="form-row">
                   <div class="form-group col-md-6">
                      <label for="inputCity">Job</label>
                      <input type="text" class="form-control" value="{{$patientData->job}}" name="job">
                   </div>
                   <div class="form-group col-md-4">
                      <label for="inputZip">Age</label>
                      <input type="text" class="form-control" id="inputZip" placeholder="Age" value="{{$patientData->age}}" name="age">
                   </div>
                </div>

                <div class="form-row">
                   <div class="form-group col-md-6">
                      <label>Gender :</label>
                      <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="gender"
                               class="custom-control-input" value="male">
                            <label class="custom-control-label" for="customRadioInline1">Male</label>
                         </div>
                         <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="gender"
                               class="custom-control-input" value="female">
                            <label class="custom-control-label" for="customRadioInline2">Female</label>
                         </div>
                   </div>
                   <div class="form-group col-md-6">
                      <label>Material Status :</label>
                      <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="material_status"
                               class="custom-control-input" value="married">
                            <label class="custom-control-label" for="customRadioInline1">Married</label>
                         </div>
                         <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="material_status"
                               class="custom-control-input" value="single">
                            <label class="custom-control-label" for="customRadioInline2">UnMarried</label>
                         </div>
                         <div class="div-action text-center">
		                     <input type="submit" name="submit" class="btn btn-lg btn-success" value="Submit">
		                     <input type="submit"  name="cancel" class="btn btn-lg btn-info" value="Cancel">
               			</div>
                   </div>

                </div>
          </div>
       </div>
    </div>
 <!--End Profile Details-->

 <!--End Profile Details-->
         <hr>
<!--Medical History-->
<!-- <div class="py-5">
  <div class="container">
     <div class="row">
        <div class="col-md-4 text-center">
              <i class="fas fa-briefcase-medical profile-icon fa-3x mb-2"></i>
           </i>
           <h2>Medical History</h2>
        </div>
        <div class="col-md-4">

              <div class="question">
                 <p class="lead">Is This The First Visit To The Dentist ?</p>
                 <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="customRadioInline1"
                       class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Yes</label>
                 </div>
                 <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="customRadioInline1"
                       class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">No</label>
                 </div>
              </div>
              <div class="question mt-2">
                 <p class="lead">Do You Suffer From Any Diseases?</p>

                 <div class="form-group">
                    <input type="text" value="" data-role="tagsinput" class="form-control" />
                 </div>

              </div>
           </div>
        <div class="col-md-4">
           <div class="question mb-1">
              <p class="lead">Do You Take A Medications ?</p>
              <div class="custom-control custom-radio custom-control-inline">
                 <input type="radio" id="customRadioInline1" name="customRadioInline1"
                    class="custom-control-input">
                 <label class="custom-control-label" for="customRadioInline1">Yes</label>

              </div>
              <div class="custom-control custom-radio custom-control-inline">
                 <input type="radio" id="customRadioInline2" name="customRadioInline1"
                    class="custom-control-input">
                 <label class="custom-control-label" for="customRadioInline2">No</label>
              </div>
              <textarea name="" id="" cols="30" rows="10" class="form-control mt-2"></textarea>

           </div>


        </div>
    
     </div>
  </div>
</div> -->
@endsection