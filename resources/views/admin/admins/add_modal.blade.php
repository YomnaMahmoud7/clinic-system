<!-- Add Admin Modal -->
<div class="modal fade" id="addAdminModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add Admin</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admins.store') }}" id="addAdminForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Type</label>
                        <select name="type" class="form-control">
                            <option value="super">Super Admin</option>
                            <option value="normal">Normal Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnAddAdmin" area-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
$(document).on('click', '#btnAddAdmin', function(e) {
  e.preventDefault();
  var data  = $('#addAdminForm').serialize();
  var url   = $('#addAdminForm').attr('action');

  $.ajax({
    url: url,
    type: 'POST',
    data: data,
    error: function(data) {
        $('#custom-message').show();
        $('#custom-message ul').empty();
        $('#custom-message').addClass('custom-message-error');

        $.each(data.responseJSON.errors, function(key, value) {
            if (Array.isArray(value)) {
                $.each(value, function(k, v) {
                    $('#custom-message ul').append('<li>' + v + '</li>');
                });
            } else {
                $('#custom-message ul').append('<li>' + value + '</li>');
            }
        })
    },
    success: function(data) {
      if (data.data != '') {
        $('#custom-message').show();
        $('#custom-message ul').empty();
        $('#custom-message').addClass('custom-message-success');
        $('#custom-message ul').append('<li>' + data.message + '</li>');
        $('#addAdminForm')[0].reset();
        $('#addAdminModal').modal('hide');
        
        var lastRow = $('#tbody tr').length;
        var tr = `
            <tr id="tr-${data.data.id}">
                <td>${(lastRow + 1)}</td>
                <td>${data.data.name}</td>
                <td>${data.data.email}</td>
                <td>${data.data.type}</td>
                <td>
                    <button class="btn btn-success btn-sm" data-id="${data.data.id}" id="btnEdit">
                        <i class="far fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" data-id="${data.data.id}" id="btnDelete">
                        <i class="far fa-trash-alt"></i> Delete
                    </button>
                </td>
            </tr>
        `;
        $('#tbody').append(tr);
        
        $('#custom-message').delay(4000).slideUp(100);
      }
    }
  });
});
</script>
@endsection

@push('js')

<script>
$(document).on('click', '#btnAddAdmin', function(e) {
  e.preventDefault();
  var data  = $('#addAdminForm').serialize();
  var url   = $('#addAdminForm').attr('action');

  $.ajax({
    url: url,
    type: 'POST',
    data: data,
    error: function(data) {
        $('#custom-message').show();
        $('#custom-message ul').empty();
        $('#custom-message').addClass('custom-message-error');

        $.each(data.responseJSON.errors, function(key, value) {
            if (Array.isArray(value)) {
                $.each(value, function(k, v) {
                    $('#custom-message ul').append('<li>' + v + '</li>');
                });
            } else {
                $('#custom-message ul').append('<li>' + value + '</li>');
            }
        })
    },
    success: function(data) {
      if (data.data != '') {
        $('#custom-message').show();
        $('#custom-message ul').empty();
        $('#custom-message').addClass('custom-message-success');
        $('#custom-message ul').append('<li>' + data.message + '</li>');
        $('#addAdminForm')[0].reset();
        $('#addAdminModal').modal('hide');
        
        var lastRow = $('#tbody tr').length;
        var tr = `
            <tr id="tr-${data.data.id}">
                <td>${(lastRow + 1)}</td>
                <td>${data.data.name}</td>
                <td>${data.data.email}</td>
                <td>${data.data.type}</td>
                <td>
                    <button class="btn btn-success btn-sm" data-id="${data.data.id}" id="btnEdit">
                        <i class="far fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" data-id="${data.data.id}" id="btnDelete">
                        <i class="far fa-trash-alt"></i> Delete
                    </button>
                </td>
            </tr>
        `;
        $('#tbody').append(tr);
        
        $('#custom-message').delay(4000).slideUp(100);
      }
    }
  });
});
</script>
@endpush
