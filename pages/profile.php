<?php
include('../components/head.php');
include('../components/navBar.php');
if (!isset($_SESSION['userId'])) {
    header('location:../index.php');
}
?>

    <body class="userBody d-flex justify-content-around align-items-center p-3">
    <section style=" box-shadow: 0px 5px 10px black; margin-top: 5rem;" class="profile d-flex px-5 rounded-3 bg-white">
        <?php
        $user = Display();
        ?>
        <section class="text-center me-5">
            <h1 class="my-2">My Profile</h1>
            <img style="width:10rem; height:10rem;" class="rounded-circle"
                 src="../assets/images/users pfp/<?php echo $user['image']; ?>" alt="user profile picture">
            <button class="buttonAcc my-4 btn btn-primary"><a class="userLinks" href="reservation.php">Reservations</a>
            </button>
        </section>
        <section>
            <form action="landingPage.php" class="my-3" method="POST" enctype="multipart/form-data"
                  data-parsley-validate>
                <input value="<?= $user['id']; ?>" type="hidden" name="userId">
                <div class="my-3">
                    <label class="form-label" for="firstName">First name</label>
                    <input value="<?= $user['first_name']; ?>" class="form-control" type="text" id="firstName"
                           name="firstName"
                           data-parsley-trigger="keyup" data-parsley-minlength="3" data-parsley-maxlength="20" required>
                </div>
                <div class="my-3">
                    <label class="form-label" for="lastName">Last name</label>
                    <input value="<?= $user['last_name']; ?>" class="form-control" type="text" name="lastName"
                           id="lastName"
                           data-parsley-trigger="keyup" data-parsley-minlength="3" data-parsley-maxlength="20" required>
                </div>
                <div class="my-3">
                    <label class="form-label" for="email">email address</label>
                    <input value="<?= $user['email']; ?>" class="form-control" type="email" name="email" id="email"
                           data-parsley-trigger="keyup" data-parsley-type="email" required>
                </div>
                <div class="my-3">
                    <label class="form-label" for="password">password</label>
                    <input value="<?= $user['password']; ?>" class="form-control" type="password" name="password"
                           id="password"
                           data-parsley-trigger="keyup" data-parsley-minlength="8" required>
                </div>
                <div class="my-3">
                    <label class="form-label" for="pfp">Profile picture</label>
                    <input class="form-control" type="file" name="pfp" accept=" .jpg, .png, .jpeg">
                </div>
                <button type="submit" name="update" class="buttonAcc my-4 btn btn-primary"> U P D A T E</button>
            </form>
        </section>
    </section>
    </body>

<?php
include('../components/footer.php');
?>