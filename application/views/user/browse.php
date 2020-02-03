<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Master User</h6>
				<div class="button">
					<a class="btn btn-primary btn-sm" type="button" href="<?=base_url('users/create') ?>"><i class="fas fa-plus"></i>
						New User
					</a>
				</div>
			</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Hp</th>
									<th>Email</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1;
								foreach ($user as $dt) :?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $dt->Nik ?></td>
										<td><?php echo $dt->Fullname ?></td>
										<td><?php echo $dt->Username ?></td>
										<td><?php echo $dt->Hp ?></td>
										<td><?php echo $dt->Email ?></td>
										<td><a href="<?php echo site_url('users/update/'.$dt->IdUser) ?>"
											class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>

											<a onclick="deleteConfirm('<?=site_url('users/delete/'.$dt->IdUser)?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>