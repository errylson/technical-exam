<div class="modal fade" id="edit-modal">
    <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title">Edit Employee</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <form action="" method="POST" id="edit-form" >
            @csrf
            @method('PUT')
                <div class="modal-body">

                    <div class="form-group">
                        <label class="form-label">First Name</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" name="first_name" id="edit-first-name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Last Name</label> <span class="text-danger">*</span>
                        <input type="text" class="form-control" name="last_name" id="edit-last-name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="edit-email">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone</label><br>
                        <input type="text" class="form-control" pattern="[0-9]{11}" maxlength="11" name="phone" id="edit-phone">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Company</label>
                        <select name="company" class="form-control" id="edit-company">
                            <option selected disabled></option>
                            @foreach($companies as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
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