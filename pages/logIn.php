<?php
include('../components/head.php');
include('../components/navBar.php');
?>

    <body class="userBody d-flex justify-content-center align-items-center">
    <section style="box-shadow: 0px 5px 10px black; margin-top: 5rem;" class="px-5 rounded-3 bg-white">
        <h1 class="my-2">LOG IN</h1>
        <form action="landingPage.php" method="POST" class="my-3" data-parsley-validate>
            <div class="my-3">
                <?php if (isset($_SESSION['errorlogin'])) { ?>
                    <div style="background-color: #f0abab;"
                         class="text-black p-2 rounded-3 text-center"><?= $_SESSION['errorlogin']; ?></div>
                <?php }
                unset($_SESSION['errorlogin']); ?>
            </div>
            <div class="my-3">
                <label class="form-label" for="email">email address</label>
                <input class="form-control" type="email" name="email" id="email" data-parsley-trigger="keyup"
                       data-parsley-type="email" required>
            </div>
            <div class="my-3">
                <label class="form-label" for="password">password</label>
                <input class="form-control" type="password" name="password" id="password" data-parsley-trigger="keyup"
                       data-parsley-minlength="8" required>
            </div>
            <button type="submit" id="save-acc" name="login" class=" buttonAcc my-4 btn btn-primary "> L O G I N
            </button>
        </form>
        <h6 class="">Don’t have an account ?<span><a class="userLinks" href="signUp.php"> Sign up</a></span></h6>
    </section>
    </body>

<?php
include('../components/footer.php');
?>