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
                               class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Male</label>
                         </div>
                         <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="gender"
                               class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Female</label>
                         </div>
                   </div>
                   <div class="form-group col-md-6">
                      <label>Material Status :</label>
                      <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="material_status"
                               class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Married</label>
                         </div>
                         <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="material_status"
                               class="custom-control-input">
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
@endsection