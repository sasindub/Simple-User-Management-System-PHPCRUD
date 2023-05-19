<div class="modal" tabindex="-1" id="updatemodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHead"> Update <span id="userHead"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

      <form id="updateform" method="POST">

      <label>Name:</label>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend me-2">
            <span class="input-group-text bg-dark" id="inputGroup-sizing-sm"><i class="fa-solid fa-user text-light"></i></span>
        </div>
        <input type="text" id="uname" name="name" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ex: Jhog Bahr">
        </div>


        <label>Email: </label>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend me-2">
            <span class="input-group-text bg-dark" id="inputGroup-sizing-sm"><i class="fa-solid fa-envelope text-light"></i></span>
        </div>
        <input type="text" id="uemail" name="email" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="example@gmail.com">
        </div>


        <label>Mobile: </label>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend me-2">
            <span class="input-group-text bg-dark" id="inputGroup-sizing-sm"><i class="fa-solid fa-phone text-light"></i></span>
        </div>
        <input type="mobile" id="umobile" name="mobile" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ex: 0774186335"        >
        </div>


        <label>Address:</label>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend me-2">
            <span class="input-group-text bg-dark" id="inputGroup-sizing-sm"><i class="fa-solid fa-house text-light"></i></span>
        </div>
        <input type="address" id="uaddress" name="address" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Enter your address..">
        </div>

      

      </div>
      <div class="modal-footer">
      <button type="submit" id="sub" name="sub" class="btn btn-secondary" style="width:100%">Update</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width:100%">Close</button> 
      </div>
      </form>
    </div>
  </div>
</div>