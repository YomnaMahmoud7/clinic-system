<section id="actions" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="{{ route('advices.index') }}" class="btn btn-primary btn-block">
          <i class="fas fa-plus"></i> Add Advice
        </a>
      </div>
      <div class="col-md-3">
        <a href="{{ route('drugs.index') }}" class="btn btn-success btn-block" >
          <i class="fas fa-plus"></i> Add Medical Treatment
        </a>
      </div>
      <div class="col-md-3">
        <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
          <i class="fas fa-plus"></i> Add User
        </a>
      </div>
    </div>
  </div>
</section>
