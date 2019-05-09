<!-- Edit Admin Modal -->
<div class="modal fade" id="editAdminModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Edit Admin</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admins.store') }}" id="editAdminForm">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Type</label>
                        <select name="type" class="form-control" id="type">
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
                <button class="btn btn-primary" id="btnEditAdmin" area-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>

$(document).on('click', '#btnEdit', function(e) {
    var action = $(this).data('action');
    $('#editAdminForm')[0].reset();

    $.ajax({
        url: action + '/edit',
        type: 'GET',
        success: function(data) {
            if (data.message == 'success') {
                $('#name').val(data.data.name);
                $('#email').val(data.data.email);
                if(data.data.type == 'normal') {
                    $('#type option[value=normal]').attr('selected', true)
                } else {
                    $('#type option[value=super]').attr('selected', true)
                }
                $('#editAdminForm').attr('action', action);
                $('#editAdminModal').modal('show');
            }
        }
    });
});



$(document).on('click', '#btnEditAdmin', function(e) {
  e.preventDefault();
  var data  = $('#editAdminForm').serialize();
  var url   = $('#editAdminForm').attr('action');

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
        $('#editAdminForm')[0].reset();
        $('#editAdminModal').modal('hide');
        
        var lastRow = $('#tr-'+data.data.id).children('td:first').text();
        var tr = `
            <tr id="tr-${data.data.id}">
                <td>${parseInt(lastRow)}</td>
                <td>${data.data.name}</td>
                <td>${data.data.email}</td>
                <td>${data.data.type}</td>
                <td>
                    <button class="btn btn-success btn-sm" data-action="/admin/admins/${data.data.id}" id="btnEdit">
                        <i class="far fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" data-action="/admin/admins/${data.data.id}" id="btnDelete">
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