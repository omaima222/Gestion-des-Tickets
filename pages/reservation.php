<?php 
include('../components/head.php');
include('../components/navBar.php');


?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


<body class="userBody d-block ">

<div style="margin-top: 3rem;" class="p-4 ">
    <h1 class="text-white py-2 ">My Reservation History</h1>
    <table class="reservTable table">
        <thead>
            <tr>
            <th scope="col">Match</th>
            <th scope="col">Date</th>
            <th scope="col">Price</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">team vs team</th>
            <td>00-00-000 00-00</td>
            <td>000.000$</td>
            <td><button class="buttonDownload p-2"><i class="bi bi-download"></i> &nbsp Download</button></td>
            </tr>
        </tbody>
    </table>
</div>
</body>
<?php
include('../components/footer.php');
?>