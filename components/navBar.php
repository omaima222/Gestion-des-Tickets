<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <div class="container">
    <a class="navbar-brand me-5" href="#">YouTickets.com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item px-2 ">
          <a class="nav-link active" aria-current="page" href="../pages/landingPage.php">Home</a>
        </li>
        <li class="nav-item px-2 ">
          <a class="nav-link text-black" href="#">About</a>
        </li>
        <li class="nav-item px-2 ">
          <a class="nav-link text-black" href="#">News</a>
        </li>
        <li class="nav-item px-2 ">
          <a class="nav-link text-black" href="#">Teams</a>
        </li>
        <li class="nav-item px-2 ">
          <a class="nav-link text-black" href="#">Contact</a>
        </li>
        
      </ul>
      <form class="d-flex">
        <?php
        if(isset($_SESSION['userId'])){
          $users=Display();
        ?>
        <h6 class="d-flex align-self-center" >Welcome  <?= $users['first_name'];?> </h6>
        <div class="mx-3 dropdown">
          <img style="width:3rem; height:3rem;" class="dropdown-toggle rounded-circle" role="button" data-bs-toggle="dropdown" aria-expanded="false" src="../assets/images/users pfp/<?php echo $users['image'];?>" alt="user pfp">
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../pages/profile.php?updateId=<?= $users['id'];?>">Edit profile</a></li>
            <li><button class="dropdown-item" name="logout" type="submit" >Log out</button></li>
            <li><button class="dropdown-item" name="deleteAcc"  type="submit" onclick="return confirm('do you really want to delete your account?')" >Delete account</button></li>
          </ul>
        </div>
        <?php }else{ ?>        
        <button class="btn btn-login px-3" type="submit"><a class="userLinks" href="../pages/logIn.php">Log In</a></button>
        <button class="btn btn-signup ms-3 px-3" type="submit"><a class="userLinks text-white" href="../pages/signUp.php">Sign Up</a></button>
        <?php }?>        
        
      </form>
    </div>
  </div>
</nav>