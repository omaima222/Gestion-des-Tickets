<?php 
  include('../components/head.php');
  include('../components/navBar.php');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<body class="p-5">
    <section style=" margin-top: 5rem;" class="m-5" >
        <h1 class="m-4">E-Tickets Details</h1>
        <div class="matchTicketDetails d-flex p-4">
            <?php
                $ticket=displayTicket();
            ?>
            <img style="width:18rem; height:10rem;" src="../assets/images/match/<?=$ticket['mimage'];?>" alt="match">
            <div class="mx-5">
                <h3><?=$ticket['tname'];?> vs <?=$ticket['t2name'];?></h3>
                <h4 class="my-4"><i class="bi bi-geo-alt"></i> <?=$ticket['Sname'];?></h4>
                <h4 class="my-4"><i class="bi bi-calendar4-event"></i> <?=$ticket['reservation_date'];?></h4>
            </div>
        </div>
        <div class="ticketDetails p-4">
            <h2>Order Summary</h2>            
            <div class="my-5 d-flex justify-content-between">
                <h4>Ticket type</h4>
                <h4 class="fw-bold">_</h4>
            </div>
        </div>
        <div class="ticketDetails p-4">
            <div class="my-5 d-flex justify-content-between">
                <h4>Ticket price</h4>
                <h4 class="fw-bold"><?=$ticket['ticket_price'];?>$</h4>
            </div>
            <div class="my-5 d-flex justify-content-between">
                <h4>Service and Handling</h4>
                <h4 class="fw-bold">_</h4>
            </div>
            <div class="my-5 d-flex justify-content-between">
                <h4>Admin fee</h4>
                <h4 class="fw-bold">_</h4>
            </div> 
        </div>
        <div class=" p-4">           
            <div class="my-5 d-flex justify-content-between">
                <h4 class="fw-bold">Total</h4>
                <h4 class="fw-bold"><?=$ticket['ticket_price'];?>$</h4>
            </div>
        </div>
        <button style="width : 100%;" class=" buttonDownload btn p-3"><i class="bi bi-download"></i> &nbsp Download pdf</button>
    </section>
   

</body>