<!-- Edit Admin Modal -->
<div class="modal fade" id="editRoleModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Edit Role</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admins.store') }}" id="editRoleForm">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
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
                <button class="btn btn-primary" id="btnEditAdmin" area-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>

$(document).on('click', '#btnEdit', function(e) {
    var action = $(this).data('action');
    $('#editRoleForm')[0].reset();
    $('input[type=checkbox').attr('checked', false);

    $.ajax({
        url: action + '/edit',
        type: 'GET',
        success: function(data) {
            if (data.message == 'success') {
                $('#name').val(data.data.role.name);
                $.each(data.data.permissions, function(key, value) {
                    $('input#permission-' + value).attr('checked', 'checked');
                });

                $('#editRoleForm').attr('action', action);
                $('#editRoleModal').modal('show');
            }
        }
    });
});



$(document).on('click', '#btnEditAdmin', function(e) {
  e.preventDefault();
  var data  = $('#editRoleForm').serialize();
  var url   = $('#editRoleForm').attr('action');

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
        $('#editRoleForm')[0].reset();
        $('#editRoleModal').modal('hide');
        
        var lastRow = $('#tr-'+data.data.id).children('td:first').text();
        var tr = `
            <tr id="tr-${data.data.role.id}">
                <td>${(parseInt(lastRow))}</td>
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
        $('#tr-'+data.data.role.id).replaceWith(tr);;
        
        $('#custom-message').delay(4000).slideUp(100);
      }
    }
  });
});
</script>
@endpush