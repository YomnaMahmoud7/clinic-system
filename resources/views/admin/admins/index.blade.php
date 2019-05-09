@extends('admin.layouts.app')

@section('title')
Admins
@endsection
@section('page-title')
<i class="fas fa-users"></i> Admins
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
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addAdminModal">Add Admin</button>
            <h4>Latest Admins</h4>
          </div>
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="tbody">
              <?php $i = 1; ?>
              @foreach($admins as $admin)
              <tr id="tr-{{ $admin->id }}">
                <td>{{ $i }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->type }}</td>
                <td>
                  <button class="btn btn-success btn-sm" data-action="{{ route('admins.update', ['id' => $admin->id]) }}" id="btnEdit">
                    <i class="far fa-edit"></i> Edit
                  </button>
                  <button class="btn btn-danger btn-sm" data-action="{{ route('admins.destroy', ['id' => $admin->id]) }}" id="btnDelete">
                    <i class="far fa-trash-alt"></i> Delete
                  </button>
                </td>
              </tr>
              <?php $i++ ?>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2"></td>
                <td>{{ $admins->links() }}</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@include('admin.admins.add_modal')
@include('admin.admins.edit_modal')
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