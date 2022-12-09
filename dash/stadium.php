<?php
include_once 'top_dash.php';
?>
<?php if (isset($_SESSION['message'])): ?>
    <div class="d-flex justify-content-center">
        <div class="alert alert-secondary alert-dismissible fade show mt-5 w-75">
            <strong>Message : </strong>
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php endif ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stadiums</h1>
        <a href="#stadium_modal" onclick="clearModal()" data-bs-toggle="modal" class="d-none d-sm-inline-block btn btn-sm shadow-sm text-white" style="background-color: #8A1538;"><i
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
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Capacity</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach (get_stadiums() as $stadium) {
                        echo "
                            <tr>
                                <td>$stadium[name]</td>
                                <td>$stadium[capacity]</td>
                                <td>$stadium[address]</td>
                                <td>$stadium[image]</td>
                                <td>
                                    <div class='d-flex justify-content-around'>
                                        <i role='button' onclick='deleteItem(2,$stadium[id])' class='fa-solid fa-trash-can text-danger ms-3'></i>
                                    </div>
                                </td>
                            </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="stadium_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="dashboard.php" method="POST" id="form" enctype="multipart/form-data" data-parsley-validate>
                    <div class="modal-header">
                        <h5 class="modal-title">Stadium</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="stadium-id" id="stadium-id">
                        <div class="mb-3">
                            <input type="file" class="form-control" name="stadium-image" id="stadium-image" accept="image/png, image/jpeg">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="stadium-name" id="stadium-name"
                                   data-parsley-pattern="[a-zA-Z0-9\s]+"
                                   data-parsley-pattern-message="Name must contain Letters & numbers only."
                                   data-parsley-trigger="keyup" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Capacity</label>
                            <input type="number" class="form-control" name="stadium-capacity" id="stadium-capacity"
                                   data-parsley-trigger="keyup" min="1" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="stadium-address" id="stadium-address"
                                   data-parsley-pattern="[a-zA-Z0-9\s]+"
                                   data-parsley-pattern-message="Address must contain Letters & numbers only."
                                   data-parsley-trigger="keyup" required/>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" name="save_stadium" class="btn btn-primary" id="stadium-save-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
include_once 'bottom_dash.php';
?>
