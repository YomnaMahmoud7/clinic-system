<!-- Add Advice Modal -->
<div class="modal fade" id="addAdviceModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add Advice</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('advices.store') }}" id="addAdviceForm">
                    @csrf
                    
                   
                          <div class="form-group row">
                            <label for="advice" class="col-md-4 col-form-label text-md-right">Advice</label>

                            <div class="col-md-6">
                                <textarea id="advice"  class="form-control" name="advice" ></textarea>
                            </div>
                        </div>
                         
                   
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btnAddAdvice" area-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
$(document).on('click', '#btnAddAdvice', function(e) {
  e.preventDefault();
  var data  = $('#addAdviceForm').serialize();
  var url   = $('#addAdviceForm').attr('action');

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
        $('#addAdviceForm')[0].reset();
        $('#addAdviceModal').modal('hide');
        
        var lastRow = $('#tbody tr').length;
        var tr = `
            <tr id="tr-${data.data.id}">
                <td>${(lastRow + 1)}</td>
                <td>${data.data.advice}</td>
                <td>
                    <button class="btn btn-secondary btn-sm" data-id="${data.data.id}" id="btnEdit">
                        <i class="far fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-secondary btn-sm" data-id="${data.data.id}" id="btnDelete">
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
$(document).on('click', '#btnAddAdvice', function(e) {
  e.preventDefault();
  var data  = $('#addAdviceForm').serialize();
  var url   = $('#addAdviceForm').attr('action');

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
        $('#addAdviceForm')[0].reset();
        $('#addAdviceModal').modal('hide');
        
        var lastRow = $('#tbody tr').length;
        var tr = `
            <tr id="tr-${data.data.id}">
                <td>${(lastRow + 1)}</td>
                <td>${data.data.advice}</td>
                <td>
                    <button class="btn btn-secondary btn-sm" data-id="${data.data.id}" id="btnEdit">
                        <i class="far fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-secondary btn-sm" data-id="${data.data.id}" id="btnDelete">
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
