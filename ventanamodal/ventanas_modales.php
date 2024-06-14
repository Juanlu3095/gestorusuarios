<!-- VENTANA MODAL PARA AÑADIR USUARIOS-->
<div id ="addUserModal" class="modal fade btnadduser">
<div class="modal-dialog">
	<div class="modal-content">
		<form name="add_user" id="add_user" action="./php/addUser.php" method="post">

		<div class="modal-header " style="background-color: #ECE2C6 !important;">
					<h4 class="modal-title" style="color:#000">Nuevo usuario</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label>DNI</label>
							<input type="text" name="add_dni_user" id="add_dni_user" class="form-control" maxlength="9" minlength="9" required autofocus />
						</div>
						<div class="form-group col-md-6">
							<label>Nombre completo</label>
							<input type="text" name="add_nombre_user" id="add_nombre_user" class="form-control" required />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Fecha de nacimiento</label>
							<input type="date" name="add_fecha_user" id="add_fecha_user" class="form-control" required />
						</div>
						<div class="form-group col-md-6">
							<label>Teléfono</label>
							<input type="text" name="add_telefono_user" id="add_telefono_user" class="form-control" pattern="[0-9]{9}" required />
						</div>
						<div class="form-group col-md-6">
							<label>Email</label>
							<input type="email" name="add_email_user" id="add_email_user" class="form-control" required />
						</div>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-around">
					<input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" value="Guardar usuario">
				</div>

		</form>
	</div>
</div>

</div>

<!-- VENTANA MODAL PARA MODIFICAR USUARIOS-->
<div id ="editUserModal" class="modal fade btnedituser">
<div class="modal-dialog">
	<div class="modal-content">
		<form name="edit_user" id="edit_user" action="./php/editUser.php" method="post">

		<div class="modal-header " style="background-color: #ECE2C6 !important;">
					<h4 class="modal-title" style="color:#000">Modificar usuario</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label>DNI</label>
							<input type="text" name="edit_dni_user" id="edit_dni_user" class="form-control" maxlength="9" minlength="9" required autofocus />
							<input type="hidden" name="id_edit_user" id="id_edit_user">
						</div>
						<div class="form-group col-md-6">
							<label>Nombre completo</label>
							<input type="text" name="edit_nombre_user" id="edit_nombre_user" class="form-control" required />
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Fecha de nacimiento</label>
							<input type="date" name="edit_fecha_user" id="edit_fecha_user" class="form-control" required />
						</div>
						<div class="form-group col-md-6">
							<label>Teléfono</label>
							<input type="text" name="edit_telefono_user" id="edit_telefono_user" class="form-control" pattern="[0-9]{9}" required />
						</div>
						<div class="form-group col-md-6">
							<label>Email</label>
							<input type="email" name="edit_email_user" id="edit_email_user" class="form-control" required />
						</div>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-around">
					<input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" value="Guardar usuario">
				</div>

		</form>
	</div>
</div>

</div>