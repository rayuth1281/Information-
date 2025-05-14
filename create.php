<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP CRUD Project - Create</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card shadow">
					<div class="card-header bg-primary text-white text-center">
						<h3>Create New User</h3>
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
						<form action="req/create.php" method="POST">
							<div class="mb-3">
								<label for="first_name" class="form-label">First Name</label>
								<input type="text" class="form-control" name="first_name" required>
							</div>
							<div class="mb-3">
								<label for="last_name" class="form-label">Last Name</label>
								<input type="text" class="form-control" name="last_name" required>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" name="email" required>
							</div>
							<div class="mb-3">
								<label for="position" class="form-label">Position</label>
								<select name="position" class="form-select" required>
									<option value="student">Student</option>
									<option value="teacher">Teacher</option>
									<option value="officer">Officer</option>
									<option value="programmer">Programmer</option>
									<option value="developer">Developer</option>
									<option value="designer">Designer</option>
								</select>
							</div>

							<div class="d-flex justify-content-between">
								<a href="index.php" class="btn btn-secondary">Back</a>
								<button type="submit" class="btn btn-success">Create</button>
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