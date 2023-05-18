<div class="modal" tabindex="-1" id="addmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHead"> <i class="fa-sharp fa-solid fa-user-plus me-2"></i> Add Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

      <form id="addform" method="POST">

      <label>Name:</label>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend me-2">
            <span class="input-group-text bg-dark" id="inputGroup-sizing-sm"><i class="fa-solid fa-user text-light"></i></span>
        </div>
        <input type="text" id="name" name="name" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ex: Jhog Bahr">
        </div>


        <label>Email: </label>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend me-2">
            <span class="input-group-text bg-dark" id="inputGroup-sizing-sm"><i class="fa-solid fa-envelope text-light"></i></span>
        </div>
        <input type="text" id="email" name="email" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="example@gmail.com">
        </div>


        <label>Mobile: </label>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend me-2">
            <span class="input-group-text bg-dark" id="inputGroup-sizing-sm"><i class="fa-solid fa-phone text-light"></i></span>
        </div>
        <input type="mobile" id="mobile" name="mobile" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ex: 0774186335"        >
        </div>


        <label>Address:</label>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend me-2">
            <span class="input-group-text bg-dark" id="inputGroup-sizing-sm"><i class="fa-solid fa-house text-light"></i></span>
        </div>
        <input type="address" id="address" name="address" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Enter your address..">
        </div>

      

      </div>
      <div class="modal-footer">
      <button type="submit" id="sub" name="sub" class="btn btn-secondary" style="width:100%">Submit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width:100%">Close</button> 
      </div>
      </form>
    </div>
  </div>
</div>