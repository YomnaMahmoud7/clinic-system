<!-- Edit Admin Modal -->
<div class="modal fade" id="editPermissionModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Edit Permission</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('permissions.store') }}" id="editPermissionForm">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Type</label>
                        <select name="guard_name" class="form-control" id="guard_name">
                            <option value="admin">Admin</option>
                            <option value="web">Web</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnEditPermission" area-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>

$(document).on('click', '#btnEdit', function(e) {
    var action = $(this).data('action');
    $('#editPermissionForm')[0].reset();
    $('input[type=checkbox').attr('checked', false);

    $.ajax({
        url: action + '/edit',
        type: 'GET',
        success: function(data) {
            if (data.message == 'success') {
                $('#name').val(data.data.name);
                if(data.data.guard_name == 'admin') {
                    $('#guard_name option[value=admin]').attr('selected', true)
                } else {
                    $('#guard_name option[value=web]').attr('selected', true)
                }

                $('#editPermissionForm').attr('action', action);
                $('#editPermissionModal').modal('show');
            }
        }
    });
});



$(document).on('click', '#btnEditPermission', function(e) {
  e.preventDefault();
  var data  = $('#editPermissionForm').serialize();
  var url   = $('#editPermissionForm').attr('action');

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
        $('#editPermissionForm')[0].reset();
        $('#editPermissionModal').modal('hide');
        
        var lastRow = $('#tr-'+data.data.id).children('td:first').text();
        var tr = `
            <tr id="tr-${data.data.id}">
                <td>${parseInt(lastRow)}</td>
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
        $('#tr-'+data.data.id).replaceWith(tr);;
        
        $('#custom-message').delay(4000).slideUp(100);
      }
    }
  });
});
</script>
@endpush