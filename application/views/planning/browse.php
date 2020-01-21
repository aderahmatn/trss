<div class="row">
	<div class="col-12">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<a href="#before" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="before">
				<h6 class="m-0 font-weight-bold text-primary">Master Planning</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="before">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Position</th>
									<th>Line</th>
									<th>Product</th>
									<th>Quantity</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php 

								foreach ($plan as $dt): ?>
									<tr>
										<td><?php echo $dt->Date ?></td>
										<td><?php echo ucfirst($dt->PositionName) ?></td>
										<td><?php echo ucfirst($dt->LineName)?></td>
										<td><?php echo $dt->PartName ?></td>
										<td><?php echo $dt->Qty ?></td>

										<td><a href="<?php echo site_url('planning/update/'.$dt->IdPlan) ?>"
											class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
											<a onclick="deleteConfirm('<?=site_url('planning/delete/'.$dt->IdPlan)?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
