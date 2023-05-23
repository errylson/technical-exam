<div class="modal fade" id="add-modal">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Add New Company</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <form action="/companies/store" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                          <label class="form-label">Name</label> <span class="text-danger">*</span>
                          <input type="text" class="form-control" name="name" required>
                      </div>
                      <div class="form-group">
                          <label class="form-label">Email</label>
                          <input type="email" class="form-control" name="email" >
                      </div>
                      <div class="form-group">
                          <label class="form-label">Website URL</label>
                          <input type="text" class="form-control" name="website_url">
                      </div>
                      <div class="form-group">
                          <label class="form-label">Logo</label><br>
                          <input type="file" name="file" accept="image/png, image/gif, image/jpeg">
                      </div>
                </div>
                <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Save Company</button>
                </div>
            </form>
          </div>
    </div>
</div>