<?php
include "db_conn.php";
include "req/read.php";
$users = read($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Position Information</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	
</head>

<body>
	<div class="container py-5">
		<div class="d-flex justify-content-between align-items-center mb-4">
			<h2>Personal Information</h2>
			<a href="create.php" class="btn btn-primary">Create</a>
		</div>
		<?php if (isset($_GET['success'])) { ?>
			<p id="success-message" class="alert alert-success">
				<?= htmlspecialchars($_GET['success']) ?>
			</p>
		<?php } ?>

		<?php if ($users != 0) { ?>
			<div class="table-responsive">
				<table class="table table-striped table-bordered align-middle">
					<thead class="table-light">
						<tr>
							<td>ID</td>
							<td>First Name</td>
							<td>Last Name</td>
							<td>Email</td>
							<td>Position</td> <!-- Added Position Column -->
							<td>Action</td>
						</tr>

						<?php
						foreach ($users as $user) {
						?>
							<tr>
								<td><?= $user['id'] ?></td>
								<td><?= $user['first_name'] ?></td>
								<td><?= $user['last_name'] ?></td>
								<td><?= $user['email'] ?></td>
								<td><?= $user['position'] ?></td> <!-- Display Position here -->
								<td>
									<div class="d-flex justify-content-start">
										<!-- Update Button -->
										<a href="update.php?id=<?= $user['id'] ?>" class="btn btn-success btn-sm d-flex align-items-center me-2">
											<!-- Update -->
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
												<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
												<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
											</svg>
										</a>

										<!-- Delete Button with Modal Trigger -->
										<button class="btn btn-danger btn-sm d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#deleteModal"
											data-userid="<?= $user['id'] ?>" data-username="<?= $user['first_name'] . ' ' . $user['last_name'] ?>">
											<!-- Delete -->
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
												<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
												<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
											</svg>
										</button>
									</div>

								</td>
							</tr>
						<?php } ?>

						</tbody>
				</table>
			</div>
			<!-- Confirmation Modal -->
			<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							Are you sure you want to delete <strong id="user-name"></strong>?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
							<form id="deleteForm" action="req/delete.php" method="POST">
								<input type="hidden" name="id" id="user-id">
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="alert alert-danger text-center">
				ERROR: No data found in the Database.
			</div>
		<?php } ?>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		window.onload = function() {
			var successMessage = document.getElementById('success-message');

			// If there's a success message, hide it after 3 seconds
			if (successMessage) {
				setTimeout(function() {
					successMessage.style.display = 'none';
				}, 3000); // 3000 milliseconds = 3 seconds
			}
		};
	</script>
	<script>
		// JavaScript to handle modal data dynamically
		var deleteModal = document.getElementById('deleteModal');
		deleteModal.addEventListener('show.bs.modal', function(event) {
			// Extract info from data-bs-* attributes
			var button = event.relatedTarget;
			var userId = button.getAttribute('data-userid');
			var userName = button.getAttribute('data-username');

			// Update the modal's content
			var userNameElement = deleteModal.querySelector('#user-name');
			var userIdInput = deleteModal.querySelector('#user-id');

			userNameElement.textContent = userName;
			userIdInput.value = userId;
		});
	</script>
</body>

</html>