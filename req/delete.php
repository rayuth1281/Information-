<?php
if (isset($_POST['id'])) {
    include "../db_conn.php";

    $id = $_POST['id'];
    
    // Ensure the ID is valid
    if (!empty($id)) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        $sm = "User successfully deleted";
        header("Location: ../index.php?success=$sm");
        exit;  // Exit to stop further code execution
    } else {
        $em = "Invalid ID";
        header("Location: ../index.php?error=$em");
        exit;
    }
}
?>
