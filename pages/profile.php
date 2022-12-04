<?php 
include('../components/head.php');
include('../components/footer.php');
?>

<body class="userBody d-flex justify-content-center align-items-center">
    
    <section style=" box-shadow: 0px 5px 10px black;" class="d-flex px-5 rounded-3 bg-white">
     <section  class=" text-center me-5">
        <h1 class="my-2">My Profile</h1>
        <img style="width:10rem; height:10rem;" class="rounded-circle" src="../assets/images/user.png" alt="user profile picture">
        <a class="userLinks d-block " href="reservation.php">Reservation History</a>
     </section>
     <section>
            <form action="" class="my-3" data-parsley-validate>
            <div class="my-3">
                    <label class="form-label" for="firstName">First name</label>
                    <input class="form-control" type="text" id="firstName" data-parsley-trigger="keyup"  data-parsley-minlength="3" data-parsley-maxlength="20"  required>
                </div>  
                </div>   
                <div class="my-3">
                    <label class="form-label" for="lastName">Last name</label>
                    <input class="form-control" type="text" id="lastName" data-parsley-trigger="keyup"  data-parsley-minlength="3" data-parsley-maxlength="20"  required>
                </div>   
                <div class="my-3">
                    <label class="form-label" for="email">email address</label>
                    <input class="form-control" type="email" id="email" data-parsley-trigger="keyup"  data-parsley-type="email"  required>
                </div>   
                <div class="my-3">
                    <label class="form-label" for="password">password</label>
                    <input class="form-control" type="password" id="password" data-parsley-trigger="keyup"  data-parsley-minlength="8" required>
                </div>      
                <button style="width: 100%;" type="submit" id="save-acc" name="save" class="buttonAcc my-4 btn btn-primary border-0" > S A V E </button>
            </form>
     </section>
    </section>


</body>