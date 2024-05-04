<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VIEW PROFILE</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-4">
		<div class="d-flex justify-content-end">
			<a href="<?php echo site_url('/profile-form') ?>" class="btn btn-success mb-2">Add profile</a>
		</div>
		<?php
		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
		} 
		?>
	<div class="mt-3">
		<div class="table-responsive">
			<table class="table table-bordered" id=" profiles-list">
				<thead>
					<tr>
						<th>profile id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Photo</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if($profiles):?>
				<?php foreach($profiles as $profile):?>
					<tr>
						<td><?php echo $profile['Profile_id'];?></td>
						<td><?php echo $profile['Profile_name'];?></td>
						<td><?php echo $profile['Profile_email'];?></td>
						<td><?php echo $profile['Profile_photo'];?></td>
						<td>
							<a href="<?php echo base_url('edit-view/'.$profile['id']);?>" class="btn btn-primary btn-sm">Edit</a>
							<a href="<?php echo base_url('delete/'.$profile['id']);?>" class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>
					<?php endforeach; ?>
					<?php endif; ?>

				</tbody>
			</table>
		</div>
	</div>
	</div>
		
</body>
<lscript src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready( function() {
		$('#profiles-list').DataTable();
	});
</script>
</html>