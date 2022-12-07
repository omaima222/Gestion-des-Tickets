<?php
    include('../components/head.php');

?>
    
        <?php
            include('../components/navBar.php');
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
                                <img src="../assets/images/match-info.jpg" alt="imagematch info ">
                            </div>

                            <div class="row my-5">
                                <div class="col-8">
                                    <div class="description">
                                        <div class="versus-teams title mb-3">
                                            <p>Morocco vs Canada </p>
                                        </div>
                                        <div class="stadium mb-3">
                                            <i class="fa-solid fa-location-dot me-3"></i>
                                            <span>Al Thumama Stadium</span>
                                        </div>
                                        <div class="date mb-3">
                                             <i class="fa-regular fa-calendar-days me-3"></i>
                                            <span>December 01, 2022 · 20.00 </span>
                                        </div>
                                        <div class="about-match">
                                            Lorem ipsum dolor sit amet consectetur. Venenatis diam lobortis porta 
                                            vitae volutpat. 
                                            Volutpat velit malesuada erat sed egestas sit arcu. Ac fermentum tellus id.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="ticket">
                                        <div class="ticket-price">
                                            Tickets starting at this price
                                            <div class="text-center">
                                                $ 220
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn">
                                            Reserve your  E-Tickets
                                        </button>
                                    </div>
                                </div>
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

                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
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