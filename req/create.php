<?php 
if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['position'])) {
    include "../db_conn.php";
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $position = $_POST['position'];  // Get position
    
    if (empty($first_name) || empty($last_name) || empty($email) || empty($position)) {
        $em = "Please fill out all fields";
        header("Location: ../create.php?error=$em");
        exit;  // Exit to prevent further code execution
    } else {
        $sql = "INSERT INTO users(first_name, last_name, email, position) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$first_name, $last_name, $email, $position]);

        $sm = "Successfully created";
        header("Location: ../index.php?success=$sm"); // Redirect to index.php
        exit;  // Exit to stop further execution
    }
}
?>
