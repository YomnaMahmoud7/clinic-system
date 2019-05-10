@extends('layouts.app')

@section('content')

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
                <td><a href="patients/{{$patientData->id}}" class="text-info">{{ $patientData->name }}</a></td>
                <td>{{ $patientData->age }}</td>                
                <td>{{ $patientData->created_at }}</td>
                <td>{{ $patientData->job }}</td>
                <td>{{ $patientData->mobile }}</td>
                <td>{{ $patientData->id }}</td>
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