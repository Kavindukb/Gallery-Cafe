<?php include('config/constants.php'); ?> 

<?php
date_default_timezone_set('Asia/Dhaka');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit data'])) {
        // Sanitize and validate inputs
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $time = mysqli_real_escape_string($conn, $_POST['time']);
        $guests = mysqli_real_escape_string($conn, $_POST['guests']);

        // Prepare an SQL statement
        $stmt = $conn->prepare("INSERT INTO `bookinginfo` (`name`, `email`, `phone`, `date`, `time`, `guests`) VALUES (?, ?, ?, ?, ?, ?)");
        $res_submit_data = mysqli_query($conn, $submit_data);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>
                    alert('Booking Successful!'); 
                    window.location.href='reservation.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Failed to Book'); 
                    window.location.href='reservation.php';
                  </script>";
        }

        // Close the statement
        $stmt->close();
    }
}
?>
