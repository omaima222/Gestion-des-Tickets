<?php
include('../components/head.php');
include('../components/navBar.php');
if (!isset($_SESSION['userId'])) {
    header('location:../index.php');
}
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


    <body class="userBody d-block ">
    <div style="margin-top: 3rem;" class="p-4">
        <h1 class="text-white py-2 ">My Reservation History</h1>
        <table class="reservTable table ">
            <thead>
            <tr>
                <th scope="col">Match</th>
                <th scope="col">Reservation Date</th>
                <th scope="col">Ticket Price</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $rsrvs = DisplayReservations();
            foreach ($rsrvs as $rsrv) { ?>
                <tr>
                    <th scope="row"><?= $rsrv['tname']; ?> vs <?= $rsrv['t2name']; ?></th>
                    <td><?= $rsrv['reservation_date']; ?></td>
                    <td><?= $rsrv['ticket_price']; ?>$</td>
                    <td>
                        <button class="buttonDownload p-2"><a class="userLinks"
                                                              href="ticket.php?TicketId=<?= $rsrv['id']; ?>"><i
                                        class="bi bi-exclamation-circle"></i> &nbsp Ticket Details</a></button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </body>

<?php
include('../components/footer.php');
?>