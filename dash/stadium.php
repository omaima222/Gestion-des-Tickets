<?php
include_once 'top_dash.php';
?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stadiums</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm text-white" style="background-color: #8A1538;"><i
                    class="fa-solid fa-plus fa-md text-white"></i> Add Stadium</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Capacity</th>
                        <th>Address</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Capacity</th>
                        <th>Address</th>
                        <th>Image</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td>AL Bayt Stadium</td>
                        <td>60.000</td>
                        <td>Near Al Khor</td>
                        <td><img src="Capture.PNG" alt="" style="height: 30px;"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
include_once 'bottom_dash.php';
?>
