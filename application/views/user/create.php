<div class="row">
	<div class="col-lg-12 mb-4">
		<div class="card shadow mb-">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
				<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('users') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="nik" class="col-form-label col-form-label-sm ">NIK *</label>
							<input type="text" class="form-control form-control-sm <?php echo form_error('nik')?'is-invalid':''?>" id="nik" name="nik"   autofocus autocomplete="off" value="<?=set_value('nik')?>" aria-describedby="nikhelp" >
							<small id="nikhelp" class="form-text text-muted">Nomor induk karyawan harus berupa angka minimal 5 karakter.</small>
							<div class="invalid-feedback">
								<?php echo form_error('nik'); ?>
							</div>
						</div>

						<div class="form-group col-md-4">
							<label for="fullname" class="col-form-label col-form-label-sm">Nama Lengkap *</label>
							<input type="text" class="form-control form-control-sm <?php echo form_error('fullname')?'is-invalid':''?>" id="fullname" name="fullname"  autocomplete="off" value="<?=set_value('fullname')?>" aria-describedby="fullnamehelp" >
							<small id="fullnamehelp" class="form-text text-muted">Nama lengkap tidak boleh kosong, harus berupa huruf.</small>
							<div class="invalid-feedback">
								<?php echo form_error('fullname'); ?>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="gender" class="col-form-label col-form-label-sm">Jenis Kelamin *</label>
							<select class="form-control form-control-sm <?php echo form_error('gender')?'is-invalid':''?>" id="inlineFormCustomSelect" name="gender">
								<option value = "" selected hidden>Pilih...</option>
								<option value="L" <?=set_value('gender') == "L" ? "selected" : ''?> >Laki-laki</option>
								<option value="P" <?=set_value('gender') == "P" ? "selected" : ''?> >Perempuan</option>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('gender'); ?>
							</div>
						</div>
					</div>
					<div class="form-row">

						<div class="form-group col-md-4">
							<label for="username" class="col-form-label col-form-label-sm ">Username *</label>
							<input type="text" class="form-control form-control-sm <?php echo form_error('username')?'is-invalid':''?>" name="username"  value="<?=set_value('username')?>"  autocomplete="off" aria-describedby="usernamehelp">
							<small id="usernamehelp" class="form-text text-muted">Username berupa huruf atau angka minimal 5 karakter.</small>
							<div class="invalid-feedback">
								<?php echo form_error('username'); ?>
							</div>
						</div>
						<div class="form-group col-md-2">
							<label for="password" class="col-form-label col-form-label-sm">Password *</label>
							<input type="password" class="form-control form-control-sm <?php echo form_error('password')?'is-invalid':''?>" name="password" autocomplete="off" aria-describedby="passwordhelp">
							<small id="passwordhelp" class="form-text text-muted">Password keamanan minimal 5 karakter.</small>

							<div class="invalid-feedback">
								<?php echo form_error('password'); ?>
							</div>
						</div>
						<div class="form-group col-md-2">
							<label for="confpassword" class="col-form-label col-form-label-sm">Konfirmasi Password *</label>
							<input type="password" class="form-control form-control-sm <?php echo form_error('confpassword')?'is-invalid':''?>" name="confpassword" autocomplete="off" aria-describedby="confpasswordhelp">
							<small id="confpasswordhelp" class="form-text text-muted">Ulangi password.</small>
							<div class="invalid-feedback">
								<?php echo form_error('confpassword'); ?>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="level" class="col-form-label col-form-label-sm">Level *</label>
							<select class="form-control form-control-sm <?php echo form_error('level')?'is-invalid':''?>" id="level" name="level" >

								<option value = "" selected hidden>Pilih...</option>
								<option value="3" <?=set_value('level') == "2" ? "selected" : ''?> >Leader</option>
								<option value="1" <?=set_value('level') == "1" ? "selected" : ''?> >Admin</option>
								<option value="2" <?=set_value('level') == "2" ? "selected" : ''?> >Operator</option>
							</select>
							<small id="level" class="form-text text-muted">Pilih level untuk menentukan hak akses halaman.</small>

							<div class="invalid-feedback">
								<?php echo form_error('level'); ?>

							</div>
						</div>
					</div>
					<div class="form-row">

						<div class="form-group col-md-4">
							<label for="nohp" class="col-form-label col-form-label-sm">No Handphone *</label>
							<input type="text" class="form-control form-control-sm <?php echo form_error('nohp')?'is-invalid':''?>" name="nohp" value="<?=set_value('nohp')?>"  autocomplete="off" aria-describedby="nohphelp">
							<small id="nohphelp" class="form-text text-muted">Ketikan nomor hp tanpa kode negara ex. 08123321123 harus berupa angka maksimal 12 karakter.</small>

							<div class="invalid-feedback">
								<?php echo form_error('nohp'); ?>
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="email" class="col-form-label col-form-label-sm">Email *</label>
							<input type="text" id="email"  class="form-control form-control-sm <?php echo form_error('email')?'is-invalid':''?>" name="email"  value="<?=set_value('email')?>"  autocomplete="off" aria-describedby="emailhelp">
							<small id="emailhelp" class="form-text text-muted">Email valid harus mengandung @ dan . (dot) .</small>

							<div class="invalid-feedback">
								<?php echo form_error('email'); ?>

							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="position" class="col-form-label col-form-label-sm">Position</label>
							<select class="form-control form-control-sm <?php echo form_error('position')?'is-invalid':''?>" id="position" name="position" >
								<option value = "" selected hidden>Pilih...</option>
								<option value="1" <?=set_value('position') == "1" ? "selected" : ''?> >Before</option>
								<option value="2" <?=set_value('position') == "2" ? "selected" : ''?> >After</option>
							</select>
							<div class="invalid-feedback">
								<?php echo form_error('position'); ?>

							</div>
						</div>
					</div>
					<div class="card-footer text-right">
						
						<a class="btn btn-primary btn-sm shadow-sm" type="button" href="<?=base_url('users') ?>"><i class="fas fa-arrow-circle-left"></i>
							cancel
						</a>
						<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-save fa-sm"></i> save</button>
					</div>
				</div>
				<div class="form-row">


				</div>
			</form>
		</div>
	</div>
</div>