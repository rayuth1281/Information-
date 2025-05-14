<?php 
if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['position'], $_POST['id'])) {
    include "../db_conn.php";
    
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $position = $_POST['position'];  // Get position
    
    if (empty($first_name) || empty($last_name) || empty($email) || empty($position)) {
        $em = "Please fill out all fields";
        header("Location: ../update.php?id=$id&error=$em");
        exit;  // Exit to prevent further code execution
    } else {
        $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, position = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$first_name, $last_name, $email, $position, $id]);

        $sm = "Successfully updated";
        header("Location: ../index.php?success=$sm"); // Redirect to index.php
        exit;  // Exit to stop further execution
    }
}
?>
