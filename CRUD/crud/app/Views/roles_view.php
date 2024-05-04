<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	<h1>Roles view</h1>
	
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>

    <?php if($roles):?>
		<?php foreach($roles as $role):?>
			<tr>
				<td><?= $role['Roles_id'] ?></td>
				<td><?= $role['Roles_name'] ?></td>
				<td><?= $role['Roles_description'] ?></td>
				<td>
				<div class="btn-group" role="group" aria-label="Basic mixed styles example">
				<button type="button" class="btn btn-success">ver</button>
				<button type="button" class="btn btn-warning">editar</button>
				<button type="button" class="btn btn-danger"><a href="<?php echo base_url('delete-role/'.$role['Roles_id']);?>" class="btn btn-danger btn-sm">Eliiminar</a></button>
				
  
  
</div>
				</td>
			</tr>

			<?php endforeach;?>
	<?php endif; ?>
	

  </tbody>
</table>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>