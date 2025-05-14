<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Room Booking Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<form id="bookingForm">
    <input type="text" id="student_id" placeholder="Student ID"><br>
    <input type="text" id="student_name" placeholder="Student Name"><br>
    <input type="email" id="email" placeholder="Email"><br>
    <input type="text" id="room_no" placeholder="Room Number"><br>
    <input type="number" id="number_of_rooms" placeholder="Number of Rooms"><br>
    <button type="submit" id="submitBtn">Submit</button>
</form>

<script>
$(document).ready(function(){
    $('#bookingForm').submit(function(e){
        e.preventDefault();
        var id = $('#id').val();
        var student_id = $('#student_id').val();
        var student_name = $('#student_name').val();
        var email = $('#email').val();
        var room_no = $('#room_no').val();
        var number_of_rooms = $('#number_of_rooms').val();

        $.ajax({
            url: 'insert_booking.php',
            method: 'POST',
            data: {
                id: id,
                student_id: student_id,
                student_name: student_name,
                email: email,
                room_no: room_no,
                number_of_rooms: number_of_rooms
            },
            success: function(response){
                alert(response);
                // Reset form fields
                $('#bookingForm')[0].reset();
            }
        });
    });
});
</script>

</body>
</html>
