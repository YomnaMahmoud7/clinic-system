<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add Role</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('roles.store') }}" method="POST" id="addRoleForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <h5><b>Assign Permissions</b></h5>

                    <div class='form-group row'>
                        @foreach ($permissions as $permission)
                            <div class="col-md-4">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}">
                                <label for="permission-{{ $permission->id }}">{{ $permission->name . '[' . $permission->guard_name . ']' }}</label>
                            </div>
                        @endforeach
                    </div>
                </form>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnAddRole" area-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@push('js')

<script>
$(document).on('click', '#btnAddRole', function(e) {
  e.preventDefault();
  var data  = $('#addRoleForm').serialize();
  var url   = $('#addRoleForm').attr('action');

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
        $('#addRoleForm')[0].reset();
        $('#addRoleModal').modal('hide');
        
        var lastRow = $('#tbody tr').length;
        var tr = `
            <tr id="tr-${data.data.role.id}">
                <td>${(lastRow + 1)}</td>
                <td>${data.data.role.name}</td>
                <td>${data.data.permissions}</td>
                <td>
                    <button class="btn btn-success btn-sm" data-action="/admin/roles/${data.data.role.id}" id="btnEdit">
                        <i class="far fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" data-action="/admin/roles/${data.data.role.id}" id="btnDelete">
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
