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
                                                    <p class='card-title'>$match[n_t1] Vs $match[n_t2]</p>
                                                    <p class='card-text'>$ $match[ticket_price]</p>
                                                    <p class='card-text'>
                                                        <i class='fa-solid fa-location-dot'></i>
                                                        $match[n_s]
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
                <div class="owl-carousel owl-theme">
                    <?php
                    foreach (get_teams() as $team) {
                        echo "
                             <div class='card'>
                                <img class='img-fluid' alt='100%x280' src='../assets/images/Rectangle 2.jpg'>
                                <div class='card-body'>
                                    <div class='row '>
                                        <p class='card-title'>$team[name] National Team</p>
                                        <p class='card-text'>Group $team[groupe]</p>
                                        <p class='card-text'>
                                            <i class='fa-solid fa-location-dot'></i>
                                            $team[name]
                                        </p>
                                    </div>
                                </div>
                            </div>";
                    }
                    ?>
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

                <div class="owl-carousel owl-theme">
                    <?php
                    foreach (get_stadiums() as $stadium) {
                        echo "
                             <div class='card'>
                                <img class='img-fluid' alt='100%x280' src='../assets/images/Rectangle 2.jpg'>
                                <div class='card-body'>
                                    <div class='row '>
                                        <p class='card-title'>$stadium[name]</p>
                                        <p class='card-text'>Capacity: $stadium[capacity]</p>
                                        <p class='card-text'>
                                            <i class='fa-solid fa-location-dot'></i>
                                            $stadium[address]
                                        </p>
                                    </div>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
        </section>
    </main>

<?php
include('../components/footer_pages.php');
include('../components/footer.php');
?>