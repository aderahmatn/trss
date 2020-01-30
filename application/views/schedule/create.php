<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i>  Create Schedule</h6>
		<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('schedule') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
	</div>
	<div class="card-body">
		<form action="" method="post">
			<input type="hidden" name="idschedule" value="<?=uniqid('SC') ?>">
			<div class="form-row">
				<div class="col-md-5 mb-3">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
						</div>
						<input type="date" class="form-control <?php echo form_error('date')?'is-invalid':''?>" name="date" id="inlineFormInputGroupUsername2" placeholder="Username">
						<div class="invalid-feedback">
							<?php echo form_error('date'); ?>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-7 mb-3">
						<div class="input-group col-md-7">
							<button type="submit" class="btn btn-primary ">Submit</button>
						</div>
					</div>
				</div>
			</div>
<span class="badge badge-danger"><?php echo form_error('idplanning[]'); ?></span>

			<hr>
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th></th>
							<th>Line</th>
							<th>Position</th>
							<th>Process</th>
							<th>Product</th>
							<th>Quantity</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($plan as $dt): ?>
							<tr>
								<td> <input type="checkbox" value="<?php echo $dt->IdPlan?>" name="idplanning[]"></td>
								<td><?php echo strtoupper($dt->LineName)?></td>
								<td><?php echo strtoupper($dt->PositionName) ?></td>
								<td><?php echo strtoupper($dt->ProcessName) ?></td>
								<td><?php echo strtoupper($dt->PartName) ?></td>
								<td><span class="badge badge-success"><?php echo $dt->Qty ?></span></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</form>
	</div>