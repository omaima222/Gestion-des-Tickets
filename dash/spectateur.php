<?php
include_once 'top_dash.php';
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Reservations</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr>
                    <th>Spectateurs</th>
                    <th>Match</th>
                    <th>Quantity</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Spectateurs</th>
                    <th>Match</th>
                    <th>Quantity</th>
                    <th>Date</th>
                </tr>
                </tfoot>
                <tbody>
                <?php
                foreach (get_reservations() as $reservation) {
                    echo "
                            <tr>
                                <td>$reservation[first_name] $reservation[first_name]</td>
                                <td>$reservation[n_t1] VS $reservation[n_t2]</td>
                                <td>$reservation[quantity]</td>
                                <td>$reservation[reservation_date]</td>
                            </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include_once 'bottom_dash.php';
?>
