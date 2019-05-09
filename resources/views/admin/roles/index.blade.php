@extends('admin.layouts.app')

@section('title')
Roles
@endsection
@section('page-title')
<i class="fas fa-users"></i> Roles
@endsection

@section('content')
<!-- SEARCH -->
<section id="search" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6 ml-auto">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search Users...">
          <div class="input-group-append">
            <button class="btn btn-primary">Search</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- USERS -->
<section id="users">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addRoleModal">Add Role</button>
            <h4>Latest Roles</h4>
          </div>
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="tbody">
              <?php $i = 1; ?>
              @foreach ($roles as $role)
              <tr id="tr-{{ $role->id }}">
                <td>{{ $i }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ str_replace(array('[',']','"'),' ', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                <td>
                  <button class="btn btn-success btn-sm" data-action="{{ route('roles.update', ['id' => $role->id]) }}" id="btnEdit">
                    <i class="far fa-edit"></i> Edit
                  </button>
                  <button class="btn btn-danger btn-sm" data-action="{{ route('roles.destroy', ['id' => $role->id]) }}" id="btnDelete">
                    <i class="far fa-trash-alt"></i> Delete
                  </button>
                </td>
              </tr>
              <?php $i++ ?>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@include('admin.roles.add_modal')
@include('admin.roles.edit_modal')
@endsection

@push('js')
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '#btnDelete', function(e) {
  var action = $(this).data('action');
  var msg = confirm('Are you sure?');

  if (msg) {
    $.ajax({
      url: action,
      type: 'POST',
      data: {

        _method: 'DELETE'
      },
      success: function(data) {
        if (data.message == 'success') {
          $('#tr-' + data.data).remove();
        }
      }
    });
  }
});
</script>
@endpush