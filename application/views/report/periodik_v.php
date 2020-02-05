

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Laporan Periodik</h6>
		<div class="button">
			<form method="post" action="<?=base_url('report/exportPeriodik') ?>">
				<input type="hidden" name="tgl1" value="<?=$tgl1 ?>">
				<input type="hidden" name="tgl2" value="<?=$tgl2 ?>">
				<button type="submit" class="btn btn-primary text-white btn-sm"><i class="fas fa-download"></i>
				 Export
			</button>
			</form>
		</div>
	</div>
	<div class="card-body">
		<div class="alert alert-success" role="alert">
			Report periodik tanggal <strong><?=$tgl1 ?></strong> s/d  <strong><?=$tgl2 ?></strong>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Line</th>
					<th>Proses</th>
					<th>Part Number</th>
					<th>Part Name</th>
					<th>Qty Plan</th>
					<th>Qty Actual</th>
					<th>Operator</th>
				</tr>
				<tbody>
					<?php $no=1;
					foreach ($schedule as $dt) :?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $dt->Date ?></td>
							<td><?php echo $dt->LineName ?></td>
							<td><?php echo $dt->ProcessName ?></td>
							<td><?php echo $dt->PartNumber ?></td>
							<td><?php echo $dt->PartName ?></td>
							<td><?php echo $dt->Qty ?></td>
							<td><?php echo $dt->ActualQty ?></td>
							<td><?php echo $dt->Fullname ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>