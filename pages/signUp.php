<?php 
  include('../components/head.php');
  include('../components/navBar.php');
?>

<body class="userBody d-flex justify-content-center align-items-center  p-3"> 
    <section style="box-shadow: 0px 5px 10px black; margin-top: 5rem;" class="px-5 rounded-3 bg-white">
      <h1 class="my-2">SIGN UP</h1>
      <form action="../controller/User_controller.php" class="my-3" method="POST" enctype="multipart/form-data"  data-parsley-validate>
            <div class="my-3">
              <label class="form-label" for="pfp">Profile picture</label>
              <input class="form-control" type="file" name="pfp" accept=" .jpg, .png, .jpeg"  >
            </div>  
            <div class="my-3">
              <label class="form-label" for="firstName">First name</label>
              <input class="form-control" type="text" name="SfirstName" data-parsley-trigger="keyup"  data-parsley-minlength="3" data-parsley-maxlength="20"  required>
            </div>  
            </div>   
            <div class="my-3">
              <label class="form-label" for="lastName">Last name</label>
              <input class="form-control" type="text" name="SlastName" data-parsley-trigger="keyup"  data-parsley-minlength="3" data-parsley-maxlength="20"  required>
            </div>   
            <div class="my-3">
              <label class="form-label" for="email">email address</label>
              <input class="form-control" type="email" name="Semail" data-parsley-trigger="keyup"  data-parsley-type="email"  required>
            </div>   
            <div class="my-3">
              <label class="form-label" for="password">password</label>
              <input class="form-control" type="password" name="Spassword" data-parsley-trigger="keyup"  data-parsley-minlength="8" required>
            </div>      
            <button type="submit" id="save-acc" name="signup" class="buttonAcc my-4 btn btn-primary " > S I G N U P </button>
      </form>
    </section>
</body>

<?php
  include('../components/footer.php');
?>