<!-- Add Role Modal -->
<div class="modal fade" id="addPermissionModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add Permission</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('permissions.store') }}" method="POST" id="addPermissionForm">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Guard Name</label>
                        <select class="form-control" name="guard_name">
                            <option value="admin">Admin</option>
                            <option value="web">Web</option>
                        </select>
                    </div>
                    @if(!$roles->isEmpty())
                        <h4>Assign Permission to Roles</h4>

                        @foreach ($roles as $role) 
                            <input type="checkbox" id="{{ $role->id }}" name="roles[]" value="{{ $role->id }}">
                            <label for="{{ $role->id }}">{{ ucfirst($role->name) }}</label>
                        @endforeach
                    @endif
                </form>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnAddPermission" area-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@push('js')

<script>
$(document).on('click', '#btnAddPermission', function(e) {
  e.preventDefault();
  var data  = $('#addPermissionForm').serialize();
  var url   = $('#addPermissionForm').attr('action');

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
        $('#addPermissionForm')[0].reset();
        $('#addPermissionModal').modal('hide');
        
        var lastRow = $('#tbody tr').length;
        var tr = `
            <tr id="tr-${data.data.id}">
                <td>${(lastRow + 1)}</td>
                <td>${data.data.name}</td>
                <td>${data.data.guard_name}</td>
                <td>
                    <button class="btn btn-success btn-sm" data-action="/admin/permissions/${data.data.id}" id="btnEdit">
                        <i class="far fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" data-action="/admin/permissions/${data.data.id}" id="btnDelete">
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
