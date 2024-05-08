<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title><?= $title ?></title>
</head>

<body>

	<!--navBar-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">LOGO</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">User Status</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Roles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Users</a>
					</li>


				</ul>
				<form class="d-flex">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>
	<!-- END NavBar-->

	<!--container-->
	<div class="container">
		<h3><?= $title ?></h3>
		<button type="button" class="btn btn-primary" onclick="newUserStatus()" style="font-size: 0.5rem;">ADD</button>
		<div class="table-responsive mx-auto">
			<table class="table table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($userStatus) : ?>
						<?php foreach ($userStatus as $obj) : ?>
							<tr>
								<td><?= $obj['User_status_id'] ?></td>
								<td><?= $obj['User_status_name'] ?></td>
								<td><?= $obj['User_status_description'] ?></td>
								<td>
									<div class="btn-group" role="group" aria-label="Basic mixed styles example">
										<button type="button" class="btn btn-success" style="font-size: 0.5rem;">SHOW</button>
										<button type="button" class="btn btn-warning" style="font-size: 0.5rem;">EDIT</button>
										<button type="button" class="btn btn-danger" style="font-size: 0.5rem;">DELETE</button>
									</div>
								</td>

							</tr>
						<?php endforeach ?>
					<?php endif ?>

				</tbody>
				<tfoot>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col">Actions</th>
					</tr>

				</tfoot>
			</table>
		</div>
	</div>
	<!--END container-->

	<!--MODAL-->
	<div class="modal fade" id="my-modal" tabindex="-1" aria-labelledby="my-modalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="my-modalLabel"><?= $title ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<!--FORM-->
					<form id="my-form">
						<div class="form-floating mb-3">
							<input type="text" class="form-control" id="User_status_name" name="User_status_name" placeholder="Name">
							<label for="User_status_name">Name</label>
						</div>
						<div class="form-floating mb-3">
							<input type="text" class="form-control" id="User_status_description" name="User_status_description" placeholder="Description">
							<label for="User_status_description">Description</label>
						</div>						
					</form>
					<!--END FORM-->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" form="my-form" class="btn btn-primary">Send Data</button>
				</div>
			</div>
		</div>
	</div>
	<!--END MODAL-->


	<!--JS BOOTSTRAP-->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
	<!--JS PUBLIC/assets/js/system/main.js-->
    <script src="../assets/js/system/main.js"></script>

	<script>
		function newUserStatus(){
			showModal();

		}
	</script>
</body>

</html>