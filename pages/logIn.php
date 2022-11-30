<?php 
include('../components/head.php');
include('../components/footer.php');
?>

<body class="d-flex justify-content-center align-items-center">
    
    <section style="box-shadow: 0px 5px 10px black;" class="px-5 rounded-3 bg-white">
     <h1 class="my-2">LOG IN</h1>
     <form action="" class="my-3" data-parsley-validate>
          <div class="my-3">
            <label class="form-label" for="email">email address</label>
            <input class="form-control" type="email" id="email"  data-parsley-trigger="keyup"  data-parsley-type="email" required>
          </div>   
          <div class="my-3">
            <label class="form-label" for="password">password</label>
            <input class="form-control" type="password" id="password" data-parsley-trigger="keyup"  data-parsley-minlength="8" required>
          </div>      
          <button style="width: 100%;" type="submit" id="save-acc" name="login" class=" buttonAcc my-4 btn btn-primary border-0" > L  O  G  I  N </button>
     </form>
     <h6 class="">Don’t have an account ?<span><a href="signUp.php"> Sign up</a></span></h6>
    </section>


</body>