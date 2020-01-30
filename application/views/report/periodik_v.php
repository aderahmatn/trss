

<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Laporan Periodik</h6>
				<div class="button">
					
				</div>
			</div>
				<div class="card-body">
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
								</tr>
							<tbody>
								<?php $no=1;
								foreach ($schedule as $dt) :?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $dt->Date ?></td>
										<td><?php echo $dt->LineName ?></td>
										<td><?php echo $dt->ProcessName ?></td>
										<td><?php echo 'PartNumber' ?></td>
										<td><?php echo $dt->PartName ?></td>
										<td><?php echo $dt->Qty ?></td>
										<td><?php echo $dt->ActualQty ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>