<div class="row">
	<div class="col-9">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<a href="#createProduct" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="createProduct">
				<h6 class="m-0 font-weight-bold text-primary">Edit Product</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group row">
							<label for="partnumber" class="col-sm-2 col-form-label-sm">Part Number</label>
							<div class="col-sm-6">
								<input type="hidden" name="id" id="id" value="<?=$product->IdProduk?>">
								<input type="text" class="form-control form-control-sm <?php echo form_error('partnumber')?'is-invalid':''?>" name="partnumber" id="partnumber" autocomplete="off" aria-describedby="partnumberhelp" value="<?=$this->input->post('partnumber')?$this->input->post('partnumber'):$product->PartNumber ?>">
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
								<input type="text" class="form-control form-control-sm <?php echo form_error('partname')?'is-invalid':''?>" name="partname" id="partname" autocomplete="off" aria-describedby="partnamehelp" value="<?=$this->input->post('partname')?$this->input->post('partname'):$product->PartName ?>" >
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
									<?php $positionx = $this->input->post('position')?$this->input->post('position'):$product->IdPosition ?>
									<?php foreach ($position as $proc) :?>
										<option value="<?=$proc->IdPosition?>"<?=$positionx == "$proc->IdPosition" ? "selected" : ''?> > <?=ucfirst($proc->PositionName);?> </option>
										
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
									<?php $linex = $this->input->post('lineproduct')?$this->input->post('lineproduct'):$product->IdLine ?>

									<?php foreach ($line as $proc) :?>
										<option value="<?=$proc->IdLine?>" <?=$linex == "$proc->IdLine" ? "selected" : ''?>><?=ucfirst($proc->LineName);?></option>
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
	</div>
</div>