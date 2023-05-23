<div class="modal fade" id="edit-modal">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Edit Company</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <form action="" method="POST" id="edit-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="modal-body">

                    <div class="form-group">
                        <label class="form-label">Name</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="edit-email">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Website URL</label> 
                        <input type="text" class="form-control" name="website_url" id="edit-website-url">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Logo</label>&nbsp;
                        <small><i> (If you wish to change the company logo, please upload a new image)</i></small>
                            <br>
                        <input type="file" name="file" accept="image/png, image/gif, image/jpeg">
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to save the changes?')">Save Changes</button>
                </div>
            </form>
          </div>
    </div>
</div>