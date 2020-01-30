<div class="row">
	<div class="col-12">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
				<div class="button">
					<a class="btn btn-primary btn-sm" type="button" href="<?=base_url('product/create') ?>"><i class="fas fa-plus"></i>
						New Produk, Process, Line
					</a>
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="before">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Part Number</th>
									<th>Part Name</th>
									<th>Line</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php 

								foreach ($product as $dt): ?>
									<tr>
										<td><?php echo $dt->PartNumber ?></td>
										<td><?php echo $dt->PartName ?></td>
										<td><?php echo ucfirst($dt->LineName)?></td>
										<td><a href="<?php echo site_url('product/update/'.$dt->IdProduk) ?>"
											class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
											<a onclick="deleteConfirm('<?=site_url('product/delete/'.$dt->IdProduk)?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-8">
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<a href="#process" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="process">
				<h6 class="m-0 font-weight-bold text-primary">Master Process</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="process">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered" id="tblprocess" width="100%" cellspacing="0">
							<thead hidden>
								<tr>
									<th>Process</th>
									<th>Line</th>
									<th>X</th>
								</tr>
							</thead>
							<tbody>
								<?php 

								foreach ($process as $dt): ?>
									<tr>
										<td><?php echo $dt->ProcessName ?></td>
										<td><?php echo strtoupper($dt->LineName) ?></td>
										<td><a onclick="deleteConfirm('<?=site_url('process/delete/'.$dt->IdProcess)?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<a href="#Line" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="Line">
				<h6 class="m-0 font-weight-bold text-primary">Master Line</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="Line">
				<div class="card-body">
					<div class="alert alert-warning" role="alert"><small> <strong>Perhatian!</strong> Menghapus master Line akan mengakibatkan data produk hilang.</small>
					</div>
					<div class="table-responsive">
						<table class="table  table-striped" id="tblline" width="100%" cellspacing="0">
							<thead hidden>
								<tr>
									<th>x</th>
									<th>Line</th>
									<th>X</th>
								</tr>
							</thead>
							<tbody>
								<?php 

								foreach ($line as $dt): ?>
									<tr>
										<td></td>
										<td><strong><?php echo strtoupper($dt->LineName)?></strong></td>
										<td><a onclick="deleteConfirm('<?=site_url('product/deleteLine/'.$dt->IdLine)?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
