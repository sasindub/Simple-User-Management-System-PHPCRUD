
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<!-- As a link -->
<nav class="navbar navbar-light bg-light shadow" style="border-bottom: 1px solid gray;">
  <div class="container">
    <span class="navbar-brand" style="font-weight: 600;" href="#">USER MANAGEMENR SYSTEM</span>
  </div>
</nav>

<div class="container">



<button class="btn btn-secondary rounded-0 mt-5" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="fa-sharp fa-solid fa-user-plus me-2"></i>Add New Users</button>

<div class="input-group mb-3 mt-3">
  <input type="text" id="search" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="srch">Search</button>
  </div>
</div>

<?php include 'tables.php'?>
<?php include 'form.php'?>
<?php include 'formUpdate.php'?>

<nav aria-label="Page navigation example" id="pagination">
  
</nav>

<input type="hidden" id="pageno" value="1"/>

</div>
    
<!-- 
bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<!-- 
font awesome  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- js file -->

<script src="js/scriptt.js"></script>

</body>
</html>