<?php
//Página para mostrar las tablas de la BD y editar 2 de ellas
require 'php/verify.php'; //Verificar que se inició sesión
require '../db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap All in One Navbar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/db.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js"></script>
    <script src="js/crud.js"></script>
</head> 
<body>
<nav class="navbar navbar-expand-xl navbar-light bg-light">
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
	    <div class="navbar-nav">
			<a href="#" class="nav-item nav-link active">Tablas</a>
			<a href="ordenes.php" class="nav-item nav-link">Órdenes</a>
			<a href="consultas.php" class="nav-item nav-link">Consultas</a>
		</div>
		<div class="navbar-nav ml-auto">
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" class="avatar" alt="Avatar">
				<?php
				    echo $_SESSION['nombre'] . " ";
				    echo $_SESSION['apellido'];
				?>
				<b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="php/logout.php" class="dropdown-item">Logout</a>
				</div>
			</div>
		</div>
	</div>
</nav>

<div >
<div class="container-xl" style="width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; max-width: 90%;">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<!--<h2>Manage <b>Employees</b></h2>-->
						<select id="title" name="title" style="margin-top:2px;">
    						<option value="" selected>--Seleccione una tabla--</option>
    						<option value="clientes">clientes</option>
    						<option value="administradores">administradores</option>
						</select>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success addBtn" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover" style="min-height: 343px; display: block; overflow-x: auto;">
				<thead>
					<tr id="tableHeader">
						<th class="tbHeader"></th>
					</tr>
				</thead>
				<tbody id="tableRows">
					<tr class="tbData">
						<td></td>
					</tr>
					<tr class="tbData">
						<td></td>
					</tr>
					<tr class="tbData">
						<td></td>
					</tr>
					<tr class="tbData">
						<td></td>
					</tr>
					<tr class="tbData">
						<td></td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix">
				<ul class="pagination">
					<li class="page-item" id="prev"><a class="page-link">Previous</a></li>
					<li class="page-item" id="next"><a class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addclientesModal" class="modal fade addModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="addForm">
				<div class="modal-header">						
					<h4 class="modal-title">Añadir cliente</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>cod_usuario</label>
						<input type="text" class="form-control" name=":cod_usuario" maxlength="10" required>
					</div>
					<div class="form-group">
						<label>usuario</label>
						<input type="text" class="form-control" name=":usuario" maxlength="50" required>
					</div>
					<div class="form-group">
						<label>correo</label>
						<input type="email" class="form-control" name=":correo" maxlength="50" required>
					</div>
					<div class="form-group">
						<label>contrasena</label>
						<input type="text" class="form-control" name=":contrasena" maxlength="50" required>
					</div>
					<div class="form-group">
						<label>nombre</label>
						<input type="text" class="form-control" name=":nombre" maxlength="50" required>
					</div>
					<div class="form-group">
						<label>apellido</label>
						<input type="text" class="form-control" name=":apellido" maxlength="50" required>
					</div>
					<div class="form-group">
						<label>direccion</label>
						<textarea class="form-control" name=":direccion" maxlength="50" required></textarea>
					</div>
					<div class="form-group">
						<label>telefono</label>
						<input type="tel" class="form-control" name=":telefono" maxlength="15" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Edit Modal HTML -->
<div id="addadministradoresModal" class="modal fade addModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="addForm">
				<div class="modal-header">						
					<h4 class="modal-title">Añadir administrador</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>cod_usuario</label>
						<input type="text" class="form-control" name=":cod_usuario" maxlength="10" required>
					</div>
					<div class="form-group">
						<label>usuario</label>
						<input type="text" class="form-control" name=":usuario" maxlength="50" required>
					</div>
					<div class="form-group">
						<label>contrasena</label>
						<input type="text" class="form-control" name=":contrasena" maxlength="50" required>
					</div>
					<div class="form-group">
						<label>nombre</label>
						<input type="text" class="form-control" name=":nombre" maxlength="50" required>
					</div>
					<div class="form-group">
						<label>apellido</label>
						<input type="text" class="form-control" name=":apellido" maxlength="50" required>
					</div>
					<div class="form-group">
						<label>direccion</label>
						<textarea class="form-control" name=":direccion" maxlength="50" required></textarea>
					</div>
					<div class="form-group">
						<label>telefono</label>
						<input type="tel" class="form-control" name=":telefono" maxlength="15" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

</div>
</body>
</html>                            