<div class="row">
	<div class="col-9">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Create Product</h6>
				<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('product') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<form action="<?=base_url('product/create') ?>" method="post">
						<div class="form-group row">
							<label for="partnumber" class="col-sm-2 col-form-label-sm">Part Number</label>
							<div class="col-sm-6">
								<input type="hidden" name="id" id="id" value="<?=uniqid()?>" >

								<input type="text" class="form-control form-control-sm <?php echo form_error('partnumber')?'is-invalid':''?>" name="partnumber" id="partnumber" autocomplete="off" aria-describedby="partnumberhelp" value="<?=set_value('partnumber')?>">
								<div class="invalid-feedback">
									<?php echo form_error('partnumber'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="partnumberhelp" class="form-text text-muted">Nomor unik part</small>
							</div>
						</div>

						<div class="form-group row">
							<label for="partname" class="col-sm-2 col-form-label-sm">Part Name</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('partname')?'is-invalid':''?>" name="partname" id="partname" autocomplete="off" aria-describedby="partnamehelp" value="<?=set_value('partname')?>" >
								<div class="invalid-feedback">
									<?php echo form_error('partname'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="partnamehelp" class="form-text text-muted">Nama produk</small>
							</div>
						</div>

						<div class="form-group row">
							<label for="position" class="col-sm-2 col-form-label-sm">Position</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm <?php echo form_error('position')?'is-invalid':''?>" name="position" id="position" aria-describedby="processhelp">
									<option selected hidden value="">Pilih Position..</option>
									<?php foreach ($position as $proc) :?>
									<option value="<?=$proc->IdPosition?>" <?=set_value('position') == "$proc->IdPosition" ? "selected" : ''?>><?=ucfirst($proc->PositionName);?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('position'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="positionhelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="form-group row">
							<label for="lineproduct" class="col-sm-2 col-form-label-sm">Line</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm <?php echo form_error('lineproduct')?'is-invalid':''?>" name="lineproduct" id="lineproduct" aria-describedby="processhelp">
									<option selected hidden value="">Pilih Line..</option>
									<?php foreach ($line as $proc) :?>
									<option value="<?=$proc->IdLine?>" <?=set_value('lineproduct') == "$proc->IdLine" ? "selected" : ''?>><?=ucfirst($proc->LineName);?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('lineproduct'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="lineproducthelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-save fa-sm"></i> save</button>
									<button type="reset" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-window-close fa-sm"></i> reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<a href="#createProcess" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="createProcess">
				<h6 class="m-0 font-weight-bold text-primary">Create Process</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse" id="createProcess">
				<div class="card-body">
					<form action="<?=base_url('process/create') ?>" method="post">
						<div class="form-group row">
							<label for="process" class="col-sm-2 col-form-label-sm">Process</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('processname')?'is-invalid':''?>" name="processname" id="process" autocomplete="off" aria-describedby="processhelp" value="<?=set_value('processname')?>" >
								<div class="invalid-feedback">
									<?php echo form_error('processname'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="processhelp" class="form-text text-muted">Masukan process baru</small>

							</div>
						</div>
						<div class="form-group row">
							<label for="positionpro" class="col-sm-2 col-form-label-sm">Line</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm <?php echo form_error('positionpro')?'is-invalid':''?>" name="positionpro" id="positionpro" aria-describedby="positionprohelp">
									<option selected hidden value="">Pilih Line..</option>
									<?php foreach ($line as $ps) :?>
									<option value="<?=$ps->IdLine?>" <?=set_value('positionpro') == "$ps->IdLine" ? "selected" : ''?>><?= ucfirst($ps->LineName)?></option>
									<?php endforeach ?>
									
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('positionpro'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="positionhelp" class="form-text text-muted">Position process</small>
							</div>
						</div>					
						<div class="card-footer text-right">
								<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-save fa-sm"></i> save</button>

						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<a href="#creatLine" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="creatLine">
				<h6 class="m-0 font-weight-bold text-primary">Create Line</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse" id="creatLine">
				<div class="card-body">
					<form action="<?=base_url('process/createLine') ?>" method="post">
						<div class="form-group row">
							<label for="line" class="col-sm-2 col-form-label-sm">Line</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('line')?'is-invalid':''?>" name="line" id="line" autocomplete="off" aria-describedby="linehelp">
								<div class="invalid-feedback">
									<?php echo form_error('line'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="linehelp" class="form-text text-muted">Masukan line baru</small>

							</div>
						</div>					
						<div class="card-footer text-right">
								<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-save fa-sm"></i> save</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="col-3">
		<!-- Default Card Example -->
		<div class="card mb-4">
			<div class="card-header">
				<small><i class="fas fa-info-circle"></i> <b>
				Petunjuk</b></small>
			</div>
			<div class="card-body">
				<small>
				<strong>Create Produk </strong> untuk menambahkan produk baru dengan number part yang belum pernah di inputkan. <br>
				<strong>Create Process</strong> untuk menambah kategori processing yang belum ada di database. <br>
				<strong>Create Line</strong> untuk menambahkan line produksi baru. 
				</small>
			</div>
		</div>
	</div>
</div>