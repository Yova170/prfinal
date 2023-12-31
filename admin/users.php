<?php
//Página para mostrar las tablas de la BD y editar 2 de ellas
//require 'php/verify.php'; //Verificar que se inició sesión
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
    <link href="css/users.css" rel="stylesheet">
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
				    //echo $_SESSION['nombre'] . " ";
				    //echo $_SESSION['apellido'];
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
<div class="container">
    <div class="container-fluid p-0">
		<h1 class="h3 mb-3"><br></h1>
		<div class="row">
			<div class="col-xl-8">
				<div class="card">
					<div class="card-header pb-0">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">Usuarios online</h5>
					</div>
					<div class="card-body">
						<table class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Company</th>
									<th>Email</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Garrett Winters</td>
									<td>Good Guys</td>
									<td>garrett@winters.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Ashton Cox</td>
									<td>Levitz Furniture</td>
									<td>ashton@cox.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Sonya Frost</td>
									<td>Child World</td>
									<td>sonya@frost.com</td>
									<td><span class="badge bg-danger">Deleted</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Jena Gaines</td>
									<td>Helping Hand</td>
									<td>jena@gaines.com</td>
									<td><span class="badge bg-warning">Inactive</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Charde Marshall</td>
									<td>Price Savers</td>
									<td>charde@marshall.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Haley Kennedy</td>
									<td>Helping Hand</td>
									<td>haley@kennedy.com</td>
									<td><span class="badge bg-danger">Deleted</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar2.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Tatyana Fitzpatrick</td>
									<td>Good Guys</td>
									<td>tatyana@fitzpatrick.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Michael Silva</td>
									<td>Red Robin Stores</td>
									<td>michael@silva.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Angelica Ramos</td>
									<td>The Wiz</td>
									<td>angelica@ramos.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar4.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Jennifer Chang</td>
									<td>Helping Hand</td>
									<td>jennifer@chang.com</td>
									<td><span class="badge bg-warning">Inactive</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar4.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Brenden Wagner</td>
									<td>The Wiz</td>
									<td>brenden@wagner.com</td>
									<td><span class="badge bg-warning">Inactive</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar4.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Fiona Green</td>
									<td>The Sample</td>
									<td>fiona@green.com</td>
									<td><span class="badge bg-warning">Inactive</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar5.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Prescott Bartlett</td>
									<td>The Sample</td>
									<td>prescott@bartlett.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar5.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Gavin Cortez</td>
									<td>Red Robin Stores</td>
									<td>gavin@cortez.com</td>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
								<tr>
									<td><img src="https://bootdey.com/img/Content/avatar/avatar5.png" width="32" height="32" class="rounded-circle my-n1" alt="Avatar"></td>
									<td>Howard Hatfield</td>
									<td>Price Savers</td>
									<td>howard@hatfield.com</td>
									<td><span class="badge bg-warning">Inactive</span></td>
								</tr>
							</tbody>
						</table>
						<div class="d-flex justify-content-center">
                <ul class="pagination mt-3 mb-0">
                  <li class="disabled page-item"><a href="#" class="page-link">‹</a></li>
                  <li class="active page-item"><a href="#" class="page-link">1</a></li>
                  <li class="page-item"><a href="#" class="page-link">2</a></li>
                  <li class="page-item"><a href="#" class="page-link">3</a></li>
                  <li class="page-item"><a href="#" class="page-link">4</a></li>
                  <li class="page-item"><a href="#" class="page-link">5</a></li>
                  <li class="page-item"><a href="#" class="page-link">›</a></li>
                  <li class="page-item"><a href="#" class="page-link">»</a></li>
                </ul>
              </div>
					</div>
				</div>
			</div>

			<div class="col-xl-4">
				<div class="card">
					<div class="card-header">
						<div class="card-actions float-right">
							<div class="dropdown show">
								<a href="#" data-toggle="dropdown" data-display="static">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">Angelica Ramos</h5>
					</div>
					<div class="card-body">
						<div class="row g-0">
							<div class="col-sm-3 col-xl-12 col-xxl-3 text-center">
								<img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="64" height="64" class="rounded-circle mt-2" alt="Angelica Ramos">
							</div>
							<div class="col-sm-9 col-xl-12 col-xxl-9">
								<strong>About me</strong>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
									magna aliqua.</p>
							</div>
						</div>

						<table class="table table-sm mt-2 mb-4">
							<tbody>
								<tr>
									<th>Name</th>
									<td>Angelica Ramos</td>
								</tr>
								<tr>
									<th>Company</th>
									<td>The Wiz</td>
								</tr>
								<tr>
									<th>Email</th>
									<td>angelica@ramos.com</td>
								</tr>
								<tr>
									<th>Phone</th>
									<td>+1234123123123</td>
								</tr>
								<tr>
									<th>Status</th>
									<td><span class="badge bg-success">Active</span></td>
								</tr>
							</tbody>
						</table>

						<strong>Activity</strong>

						<ul class="timeline mt-2 mb-0">
							<li class="timeline-item">
								<strong>Signed out</strong>
								<span class="float-right text-muted text-sm">30m ago</span>
								<p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit...</p>
							</li>
							<li class="timeline-item">
								<strong>Created invoice #1204</strong>
								<span class="float-right text-muted text-sm">2h ago</span>
								<p>Sed aliquam ultrices mauris. Integer ante arcu...</p>
							</li>
							<li class="timeline-item">
								<strong>Discarded invoice #1147</strong>
								<span class="float-right text-muted text-sm">3h ago</span>
								<p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit...</p>
							</li>
							<li class="timeline-item">
								<strong>Signed in</strong>
								<span class="float-right text-muted text-sm">3h ago</span>
								<p>Curabitur ligula sapien, tincidunt non, euismod vitae...</p>
							</li>
							<li class="timeline-item">
								<strong>Signed up</strong>
								<span class="float-right text-muted text-sm">2d ago</span>
								<p>Sed aliquam ultrices mauris. Integer ante arcu...</p>
							</li>
						</ul>

					</div>
				</div>
			</div>
		</div>

	</div>
</div>

</div>
</body>
</html>                            