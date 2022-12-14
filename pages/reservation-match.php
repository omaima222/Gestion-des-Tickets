<?php
include('../components/head.php');
include('../components/navBar.php');

if (!isset($_GET['matchId']) || $_GET['matchId'] == '') {
    header('location: ../index.php');
}

$match = get_spec_match($_GET['matchId']);

if (!$match) {
    header('location: ../index.php');
}

$took = get_reservations("WHERE r.match_id = {$match[0]['id']}");
$ticket_available = $match[0]['capacity'] - count($took);

$today = date('Y-m-d h:i:s');
?>


    <main>
        <section class="information-match">
            <div class="container">
                <div class="row">
                    <div class="col-1">
                        <div class="share">
                            <ul>
                                <p>Share</p>
                                <li>
                                    <a href="#"><i class="fa-solid fa-share-nodes fa-1x"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-instagram fa-1x"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-twitter fa-1x"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-facebook fa-1x"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="match-info">
                            <div class="match-img">
                                <img src="../assets/images/match/<?= $match[0]['image'] ?>" alt="imagematch info"
                                     style="width: 100%">
                            </div>

                            <div class="row my-5">
                                <div class="col-8">
                                    <div class="description">
                                        <div class="versus-teams title mb-3">
                                            <p><?= $match[0]['n_t1'] . " VS " . $match[0]['n_t2'] ?></p>
                                        </div>
                                        <div class="stadium mb-3">
                                            <i class="fa-solid fa-location-dot me-3"></i>
                                            <span><?= $match[0]['n_s'] ?></span>
                                        </div>
                                        <div class="date mb-3">
                                            <i class="fa-regular fa-calendar-days me-3"></i>
                                            <span><?= $match[0]['date'] ?></span>
                                        </div>
                                        <div class="about-match">
                                            <?= $match[0]['description'] ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if (isset($_SESSION['userId']) && $ticket_available > 0 && $match[0]['date'] > $today): ?>
                                    <div class="col-4">
                                        <div class="ticket">
                                            <div class="ticket-price">
                                                Tickets starting at this price
                                                <div class="text-center">
                                                    $ <?= $match[0]['ticket_price'] ?>
                                                </div>
                                            </div>
                                            <form id="form" method="post" action="landingPage.php"
                                                  data-parsley-validate>
                                                <input type="hidden" name="reservation-spectator"
                                                       value="<?= $_SESSION['userId'] ?>">
                                                <input type="hidden" name="reservation-match"
                                                       value="<?= $match[0]['id'] ?>">
                                                <div class="d-none">
                                                    <label class="form-label"
                                                           for="reservation-quantity">Quantity: </label>
                                                    <input type="number" name="reservation-quantity"
                                                           id="reservation-quantity"
                                                           data-parsley-trigger="keyup" min="1" max="1" value="1"
                                                           required/>
                                                </div>
                                                <button id="reserve-btn" type="submit" name="reserve" hidden></button>
                                                <button type="button" class="btn w-100" onclick="onSubmitReserve()">
                                                    Reserve your E-Tickets
                                                </button>
                                                <p class="text-success m-0" style="font-size: 14px">
                                                    Available( <?= $ticket_available ?> )</p>
                                            </form>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="description">
                                        <div class="title mb-3">
                                            <p>Match Information</p>
                                        </div>
                                        <div class="title mb-3">
                                            <p>Description</p>
                                        </div>

                                        <div class="about-match mb-5">
                                            Lorem ipsum dolor sit amet consectetur. Venenatis diam lobortis porta
                                            vitae volutpat.
                                            Volutpat velit malesuada erat sed egestas sit arcu. Ac fermentum tellus id.
                                        </div>

                                        <select class="form-select form-select-lg mb-3"
                                                aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


<?php
include('../components/footer_pages.php');
include('../components/footer.php');

?>