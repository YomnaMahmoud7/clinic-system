<!-- Edit Drug Modal -->
<div class="modal fade" id="editDrugModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Edit Drug</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('drugs.store') }}" id="editDrugForm">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Medical Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" />
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description"  class="form-control" name="description" ></textarea>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnEditDrug" area-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>

$(document).on('click', '#btnEdit', function(e) {
    var action = $(this).data('action');
    $('#editDrugForm')[0].reset();

    $.ajax({
        url: action + '/edit',
        type: 'GET',
        success: function(data) {
            if (data.message == 'success') {
                $('#name').val(data.data.name);
                   $('#description').val(data.data.description);
                $('#editDrugForm').attr('action', action);
                $('#editDrugModal').modal('show');
            }
        }
    });
});



$(document).on('click', '#btnEditDrug', function(e) {
  e.preventDefault();
  var data  = $('#editDrugForm').serialize();
  var url   = $('#editDrugForm').attr('action');

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
        $('#editDrugForm')[0].reset();
        $('#editDrugModal').modal('hide');
        
        var lastRow = $('#tr-'+data.data.id).children('td:first').text();
        var tr = `
            <tr id="tr-${data.data.id}">
                <td>${parseInt(lastRow)}</td>
                <td>${data.data.name}</td>
                  <td>${data.data.description}</td>
               
                <td>
                    <button class="btn btn-secondry btn-sm" data-action="/admin/drugs/${data.data.id}" id="btnEdit">
                        <i class="far fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-secondry btn-sm" data-action="/admin/drugs/${data.data.id}" id="btnDelete">
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