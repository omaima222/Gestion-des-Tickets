<?php
include('../components/head.php');
include('../components/navBar.php');
?>

    <header>

        <div class="header-title">
            <p>
                Exclusive Matchs, priceless moments
            </p>
        </div>

        <form action="#" class="search-form ">
            <div class="container">
                <div class="row ">
                    <div class="col">
                        <div class="form-group ">
                            <input type="text" name="search-ticket" class="form-control" id="search"
                                   placeholder="Search by matchs, teams..." required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group ">
                            <input type="date" class="form-control" name="date" placeholder="Select date"
                                   id="match-date"/>
                        </div>
                    </div>
                    <div class="col">
                        <button class="btn btn-search" type="submit">Search</button>
                    </div>

                </div>
            </div>
        </form>
    </header>

    <main>
        <section class="upcoming-match">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-3 upcoming-title">
                        <p>Upcoming Matchs</p>
                    </div>
                    <div class="col-1 view-all">
                        <a href="#">View All </a>
                    </div>
                </div>

                <div class="owl-carousel owl-theme">
                    <?php
                    foreach (get_matchs() as $match) {
                        echo "
                                <div class='item'>
                                <a href='../pages/reservation-match.php' class='card-btn'>
                                    <div class='card'>
                                        <img class='img-fluid' alt='100%x280' src='../assets/images/Rectangle 2.jpg'>
                                        <div class='card-body'>
                                            <div class='row align-items-center'>
                                                <div class='col-3'>
                                                    " . separate_date($match['date'])[1] . "<br>" . separate_date($match['date'])[0] . "
                                                </div>
                                                <div class='col-9'>
                                                    <p class='card-title'>Morocco Vs Croitia</p>
                                                    <p class='card-text'>$match[ticket_price]</p>
                                                    <p class='card-text'>
                                                        <i class='fa-solid fa-location-dot'></i>
                                                        Al Bayt Stadium
                                                    </p>
                                                </div>
                                                

                                            </div>
                                        </div>
                                    </div>
                                </a>    
                                </div>";
                    }
                    ?>
                </div>
        </section>

        <section class="teams-group mb-4">
            <div class="group">
                <img src="../assets/images/image 5.jpg" alt="group image" style="width: 100%; height: 100vh;">
            </div>
            
        </section>


        <section class="browse-teams">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-3 teams-title">
                        <p>Browse National Teams</p>
                    </div>
                    <div class="col-1 view-all">
                        <a href="#">View All </a>
                    </div>
                </div>

                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" class="indicators active" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" class="indicators" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" class="indicators" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" class="indicators" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators"
                           data-bs-slide="next">
                            <i class="fa-solid fa-circle-chevron-right fa-2x"></i>
                        </a>
                    </div>

                </div>
        </section>


        <section class="browse-teams">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-3 teams-title">
                        <p>Browse Available Stadiums</p>
                    </div>
                    <div class="col-1 view-all">
                        <a href="#">View All </a>
                    </div>
                </div>

                <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" class="indicators active" data-bs-target="#carouselExampleIndicators2"
                                data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" class="indicators" data-bs-target="#carouselExampleIndicators2"
                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="../assets/images/Rectangle 2.jpg">
                                        <div class="card-body">
                                            <div class="row ">
                                                <p class="card-title">Morocco National Team</p>
                                                <p class="card-text">Group F</p>
                                                <p class="card-text">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                    Morocco
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators2"
                           data-bs-slide="next">
                            <i class="fa-solid fa-circle-chevron-right fa-2x"></i>
                        </a>
                    </div>

                </div>
        </section>
    </main>

<?php
include('../components/footer_pages.php');
include('../components/footer.php');
?>