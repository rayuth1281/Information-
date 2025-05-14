<?php
include "db_conn.php";
include "req/read.php";
if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $user = readById($conn, $id);
?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>PHP CRUD Project - Update</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      </head>

      <body>
            <div class="container py-5">
                  <div class="row justify-content-center">
                        <div class="col-md-6">
                              <div class="card shadow">
                                    <div class="card-header bg-primary text-white text-center">
                                          <h3>Update User</h3>
                                    </div>
                                    <div class="card-body">
                                          <?php if (isset($_GET['error'])) { ?>
                                                <div class="alert alert-danger text-center">
                                                      <?= htmlspecialchars($_GET['error']) ?>
                                                </div>
                                          <?php } ?>
                                          <?php if (isset($_GET['success'])) { ?>
                                                <div class="alert alert-success text-center">
                                                      <?= htmlspecialchars($_GET['success']) ?>
                                                </div>
                                          <?php } ?>
                                          <form action="req/update.php" method="POST">
                                                <div class="mb-3">
                                                      <label for="first_name" class="form-label">First Name</label>
                                                      <input type="text" class="form-control" name="first_name" value="<?= $user['first_name'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                      <label for="last_name" class="form-label">Last Name</label>
                                                      <input type="text" class="form-control" name="last_name" value="<?= $user['last_name'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                      <label for="email" class="form-label">Email</label>
                                                      <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                      <label for="position" class="form-label">Position</label>
                                                      <select name="position" class="form-select" required>
                                                            <option value="student" <?= $user['position'] == 'student' ? 'selected' : '' ?>>Student</option>
                                                            <option value="teacher" <?= $user['position'] == 'teacher' ? 'selected' : '' ?>>Teacher</option>
                                                            <option value="officer" <?= $user['position'] == 'officer' ? 'selected' : '' ?>>Officer</option>
                                                            <option value="programmer" <?= $user['position'] == 'programmer' ? 'selected' : '' ?>>Programmer</option>
                                                            <option value="developer" <?= $user['position'] == 'developer' ? 'selected' : '' ?>>Developer</option>
                                                            <option value="designer" <?= $user['position'] == 'designer' ? 'selected' : '' ?>>Designer</option>
                                                      </select>
                                                </div>
                                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                <div class="d-flex justify-content-between">
                                                      <a href="index.php" class="btn btn-secondary">Back</a>
                                                      <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                          </form>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      </body>

      </html>
<?php } else {
      header("Location: index.php");
} ?>