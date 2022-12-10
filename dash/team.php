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
        <h1 class="h3 mb-0 text-gray-800">Teams</h1>
        <a href="#team_modal" onclick="clearModal()" data-bs-toggle="modal" class="d-none d-sm-inline-block btn btn-sm shadow-sm text-white" style="background-color: #8A1538;"><i
                    class="fa-solid fa-plus fa-md text-white"></i> Add Team</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Groupe</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Groupe</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach (get_teams() as $team) {
                        echo "
                            <tr>
                                <td><img class='rounded' src='../assets/images/team/$team[logo]' style='height: 30px'></td>
                                <td>$team[name]</td>
                                <td>$team[groupe]</td>
                                <td><img class='rounded' src='../assets/images/team/$team[image]' style='height: 30px'></td>
                                <td>
                                    <div class='d-flex justify-content-around'>
                                        <i role='button' onclick='deleteItem(3,$team[id])' class='fa-solid fa-trash-can text-danger ms-3'></i>
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

    <div class="modal fade" id="team_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="dashboard.php" method="POST" id="form" enctype="multipart/form-data" data-parsley-validate>
                    <div class="modal-header">
                        <h5 class="modal-title">Teams</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="team-id" id="team-id">
                        
                        <div class="mb-3">
                            <label class="form-label">Logo</label>
                            <input type="file" class="form-control" name="team-logo" id="team-logo" accept="image/png, image/jpeg" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="team-image" id="team-image" accept="image/png, image/jpeg" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="team-name" id="team-name"
                                   data-parsley-pattern="[a-zA-Z0-9\s]+"
                                   data-parsley-pattern-message="Name must contain Letters & numbers only."
                                   data-parsley-trigger="keyup" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Group</label>
                            <select class="form-control form-select" id="team-group"
                                    name="team-group">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" name="save_team" class="btn btn-primary" id="team-save-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
include_once 'bottom_dash.php';
?>
