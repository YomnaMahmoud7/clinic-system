@extends('layouts.app')

@section('content')
<div class="dash-content">
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="widget p-2">
                <div class="d-flex text-center">
                    <div class="pr-2 pl-2 align-self-start">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="pr-5 align-self-center">
                        <h4>Apponintment</h4>
                    </div>

                    <div class="align-self-end">
                        <p class="num-app"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget">
                <div class="d-flex text-center">
                    <div class="pr-2 pl-2 align-self-start">
                        <i class="fas fa-users"></i> </div>
                    <div class="pr-5 align-self-center">
                        <h4>All Patients</h4>
                    </div>

                    <div class=" align-self-end">
                        <p class="num_user"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget">
                <div class="d-flex text-center">
                    <div class="pr-2 pl-2 align-self-start">
                        <i class="fas fa-file-invoice-dollar"></i> </div>
                    <div class="pr-5 align-self-center">
                        <h4>Inovices</h4>
                    </div>

                    <div class=" align-self-end">
                        <p class="num-invo"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--End Widget-->

<!--Start All Patients Table-->   
<div class="patients-table">
  <div class="container">
    <div class="patients-title text-center">
      <h2> Patients</h2>
    </div>
    <div class="table-responsive">

    <table class="table table-hover">
        <thead class="thead">
          <tr>
            <th scope="col" class='text-muted'>#ID</th>
            <th scope="col" class='text-muted'>Name</th>
            <th scope="col" class='text-muted'>Gender</th>
            <th scope="col" class='text-muted'>FollowUp</th>
            <th scope="col" class='text-muted'>Phone Number</th>
            <th scope="col" class='text-muted'>Status</th>
            <th scope="col" class='text-muted'>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <th scope="row">1</th>
            <td>
                <a href="patientdetial" class="text-info"></a>
            </td> 
            <td>Male</td>
            <td>5/5/2019</td>
            <td>0125456457</td>
            <td>New Reversation</td>
            <td>
                <a href="profile_patient.html" class="btn btn-info mr-1 btn-md">Edit</a>
                <a href="" class="btn btn-danger  btn-md">Delete</a>
            </td>
          </tr> -->
            @foreach($patientData as $patientData)
              <tr class="odd gradeX">
                <td><a href="patients/{{$patientData->id}}" class="text-info">{{ $patientData->id }}</a></td>
                <td>{{ $patientData->name }}</td>                
                <td>{{ $patientData->gender }}</td>
                <td>{{ $patientData->created_at }}</td>
                <td>{{ $patientData->mobile }}</td>

                @foreach($patientData->reservations as $reservation)
                  <td>{{ $reservation->status }}</td>
                @endforeach
                
                <td>{{ $patientData->created_at }}</td>
                                
                
                <td>
	                <a href="patients/{{$patientData->id}}" class="btn btn-info mr-1 btn-md">Edit</a>

	                <form action="patients/{{$patientData->id}}" method="POST">
        						{{csrf_field()}}
        						{{method_field('DELETE')}}
						      <button name="softDelete" class="btn btn-danger btn-md" >Delete</button>
					       </form>

	                
            	</td>
              </tr>
               @endforeach
          <!-- <tr>
              <th scope="row">2</th>
              <td>
                  <a href="patientdetial" class="text-info">Mark</a>
              </td>              <td>Male</td>
              <td>5/5/2019</td>
              <td>0125456457</td>
              <td>New Reversation</td>
              <td>
                <a href="profile_patient.html" class="btn btn-info mr-1 btn-md">Edit</a>
                  <a href="" class="btn btn-danger  btn-md">Delete</a>
              </td>
          </tr>
          <tr>
              <th scope="row">3</th>
              <td>
                  <a href="patientdetial" class="text-info">Mark</a>
              </td>         
                   <td>Male</td>
              <td>5/5/2019</td>
              <td>0125456457</td>
              <td>New Reversation</td>
              <td>
                <a href="profile_patient.html" class="btn btn-info mr-1 btn-md">Edit</a>
                  <a href="" class="btn btn-danger  btn-md">Delete</a>
              </td>
          </tr>
          <tr>
              <th scope="row">3</th>
              <td>
                  <a href="patientdetial" class="text-info">Mark</a>
              </td>
              <td>Male</td>
              <td>5/5/2019</td>
              <td>0125456457</td>
              <td>New Reversation</td>
              <td>
                  <a href="" class="btn btn-info mr-1 btn-md">Edit</a>
                  <a href="" class="btn btn-danger  btn-md">Delete</a>
              </td>
          </tr>
          <tr>
              <th scope="row">3</th>
              <td>
                  <a href="patientdetial" class="text-info">Mark</a>
              </td>              <td>Male</td>
              <td>5/5/2019</td>
              <td>0125456457</td>
              <td>New Reversation</td>
              <td>
                  <a href="" class="btn btn-info mr-1 btn-md">Edit</a>
                  <a href="" class="btn btn-danger  btn-md">Delete</a>
              </td>
          </tr> -->
        </tbody>
      </table>
      
    </div>  
    <!--Pagination-->
    <nav aria-label="Page navigation example" class="float-right">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
  </div>
</div> 
<!--End All Patients Table--> 
@endsection