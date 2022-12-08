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
        <h1 class="h3 mb-0 text-gray-800">Matchs</h1>
        <button id="add_match" class="d-none d-sm-inline-block btn btn-sm shadow-sm text-white"
                style="background-color: #8A1538;"><i
                    class="fa-solid fa-plus fa-md text-white"></i> Add Match
        </button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Team 1</th>
                        <th>Team 2</th>
                        <th>Price</th>
                        <th>Stadium</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Team 1</th>
                        <th>Team 2</th>
                        <th>Price</th>
                        <th>Stadium</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach (get_matchs() as $match) {
                        echo "
                            <tr>
                                <td>$match[n_t1]</td>
                                <td>$match[n_t2]</td>
                                <td>$match[ticket_price] $</td>
                                <td>$match[n_s]</td>
                                <td>$match[date]</td>
                                <td>
                                    <div class='d-flex justify-content-around'>
                                        <i role='button' onclick='editMatch($match[id])' class='fa-solid fa-pen-to-square text-primary'></i>
                                        <i role='button' onclick='deleteMatch($match[id])' class='fa-solid fa-trash-can text-danger ms-3'></i>
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

    <div class="modal fade" id="match_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="dashboard.php" method="POST" id="form" enctype="multipart/form-data"
                      data-parsley-validate>
                    <div class="modal-header">
                        <h5 class="modal-title">Match</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="match-id" id="match-id">
                        <div class="mb-3">
                            <input type="file" class="form-control" name="match-image" id="match-image"
                                   accept="image/png, image/jpeg">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Team 1</label>
                                    <select class="form-control form-select" id="match-first-team"
                                            name="match-first-team">
                                        <option value="1">test</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Team 2</label>
                                    <select class="form-control form-select" id="match-second-team"
                                            name="match-second-team">
                                        <option value="1">test</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stadium</label>
                            <select class="form-control form-select" id="match-stadium" name="match-stadium">
                                <option value="3">test</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="match-ticket-price" id="match-ticket-price"
                                   data-parsley-trigger="keyup" min="1" step="0.01" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="datetime-local" class="form-control" name="match-date" id="match-date"
                                   data-parsley-trigger="keyup" required/>
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="5" id="match-description" name="match-description"
                                      data-parsley-pattern="[a-zA-Z0-9\s]+"
                                      data-parsley-pattern-message="Description must contain Letters & numbers only."
                                      data-parsley-trigger="keyup" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" name="update_match" class="btn btn-warning" id="match-update-btn">Update
                        </button>
                        <button type="submit" name="save_match" class="btn btn-primary" id="match-save-btn">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
include_once 'bottom_dash.php';
?>