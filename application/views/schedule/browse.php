<link rel="stylesheet" type="text/css" href="<?=base_url('assets/calendar/calendar.css') ?>">
<div class="row">
	<div class="col-9">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Schedule</h6>
        <?php if ($this->session->userdata('role') == 1) { ?>   

				<div class="button">
					<a class="btn btn-primary btn-sm" type="button" href="<?=base_url('schedule/create') ?>"><i class="fas fa-plus"></i>
						New Schedule
					</a>
				</div>
			<?php } ?>
			</div>
			<div class="card-body">
				<?php echo $calendar ?>
			</div>
		</div>
	</div>
	<div class="col-3">
		<!-- Default Card Example -->
		<div class="card mb-4">
			<div class="card-header">
				<small>
				Petunjuk</small>
			</div>
			<div class="card-body">
				<small>
				Klik Tanggal pada ID Planning untuk melihat detail jadwal produksi.
				</small>
			</div>
		</div>
	</div>
</div>
