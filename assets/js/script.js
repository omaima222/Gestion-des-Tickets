$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        margin: 20,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
});

$(document).ready(function () {
    $('#form').parsley();
});

document.querySelector("#add_match").addEventListener("click", () => {
    document.querySelector("#form").reset();

    // Open Modal
    $("#match_modal").modal('show');

    document.querySelector("#match-save-btn").style.cssText = 'display: block;';
    document.querySelector("#match-update-btn").style.cssText = 'display: none;';
});

function clearModal() {
    document.querySelector("#form").reset();
}

function editMatch(id) {
    $.ajax({
        type: "POST",
        url: 'dashboard.php',
        data: {specific_match: id},
        success: function (obj) {
            obj = JSON.parse(obj);
            document.getElementById('match-id').value = obj[0];
            document.getElementById('match-first-team').value = obj[1];
            document.getElementById('match-second-team').value = obj[2];
            document.getElementById('match-stadium').value = obj[3];
            document.getElementById('match-ticket-price').value = obj[4];
            document.getElementById('match-date').value = obj[5];
            document.getElementById('match-description').value = obj[6];
        }
    });

    $("#match_modal").modal('show');

    document.querySelector("#match-save-btn").style.cssText = 'display: none;';
    document.querySelector("#match-update-btn").style.cssText = 'display: block;';
}

function deleteItem(item, id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            if (item == 1) {
                $.ajax({
                    type: "POST",
                    url: 'dashboard.php',
                    data: {delete_match: id},
                    success: function (obj) {
                        location.reload();
                    }
                });
            } else if (item == 2) {
                $.ajax({
                    type: "POST",
                    url: 'dashboard.php',
                    data: {delete_stadium: id},
                    success: function (obj) {
                        location.reload();
                    }
                });
            } else if (item == 3) {
                $.ajax({
                    type: "POST",
                    url: 'dashboard.php',
                    data: {delete_team: id},
                    success: function (obj) {
                        location.reload();
                    }
                });
            }
        }
    });
}