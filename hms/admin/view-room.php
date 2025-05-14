<?php
include('functions.php');
$obj = new Operations();

include 'header.php'?>

<?php require_once 'sidebar.php'?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>View Rooms</h2>
                        </div>

                        <form style="margin: auto;">
                            <select name="department" class="form-control">
                                <option value="0">Select Department</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </form>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#ID</th>
                                            <th>Department [Boys / Girl]</th>
                                            <th>Room Number</th>
                                            <th>Number of Student</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('select[name="department"]').change(function() {
            var department = $(this).val();

            $.ajax({
                url: 'fetch-rooms.php', // File to handle AJAX request
                method: 'POST',
                data: {
                    department: department
                },
                dataType: 'json',
                success: function(response) {
                    // Empty the table body
                    $('#table-1 tbody').empty();

                    // Check if response is not empty
                    if (response.length > 0) {
                        // Append rows for each room
                        $.each(response, function(index, room) {
                            $('#table-1 tbody').append(`
                                <tr class="text-center">
                                    <td>#${room.id}</td>
                                    <td>${room.department}</td>
                                    <td>${room.room_no}</td>
                                    <td>${room.student_num}</td>
                                    <td>
                                        <a href="edit-room.php?mode=edit&id=${room.id}" class="btn btn-primary">Edit Room</a>
                                        <a href="delete-room.php?id=${room.id}" class="btn btn-danger btn_dengars">Delete Room</a>
                                    </td>
                                </tr>
                            `);
                        });
                    } else {
                        // If response is empty, show a message
                        $('#table-1 tbody').append(`
                            <tr>
                                <td colspan="5" class="text-center">No data available</td>
                            </tr>
                        `);
                    }
                },
                error: function(xhr, status, error) {
                    // Log error to console
                    console.error(xhr.responseText);
                    // Show error message on the table
                    $('#table-1 tbody').html('<tr><td colspan="5" class="text-center">An error occurred while fetching data</td></tr>');
                }
            });
        });
    });
</script>
<?php require_once 'footer.php'; ?>

<!-- JavaScript/jQuery -->

