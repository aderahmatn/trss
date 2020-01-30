<div class="row">
	<div class="col-12">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Detail Schedule</h6>
				<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('schedule') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="before">
				<div class="card-body">
					<div class="alert alert-primary" role="alert">
						Detail schedule tanggal <strong><?=$schedule['0']->Date ?></strong>
					</div>
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
							<tr>
								<th>No</th>
								<th>Id</th>
								<th>Tanggal</th>
								<th>Planning</th>
								<th>Qty Planning</th>
								<th>Option</th>
							</tr>
							<tbody>
								<?php 
								$no=1;
								foreach ($schedule as $dt): ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $dt->IdSchedule ?></td>
										<td><?php echo $dt->Date?></td>
										<td><?php echo $dt->IdPlan ?></td>
										<td><?php echo $dt->Qty ?></td>

										<td>
											<?php if ($this->session->userdata('role') == 1) { ?>   
												<a href='#detailPlanning' class='btn btn-sm btn-info' id='custId' data-toggle='modal' data-id="<?php echo $dt->IdPlan ?>"><i class="fa fa-eye"></i></a>
												<a onclick="deleteConfirm('<?=site_url('schedule/delete/'.$dt->IdPlan)?>')" href="#!" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
												<?php } ?>
											<?php if ($this->session->userdata('role') == 2) { ?>   

												<a href="<?php echo site_url('transaksi/create/'.$dt->IdPlan.'/'.$dt->IdSchedule) ?>"
													class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
												<a href='#detailPlanning' class='btn btn-sm btn-info' id='custId' data-toggle='modal' data-id="<?php echo $dt->IdPlan ?>"><i class="fa fa-eye"></i></a>
												<?php } ?>

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

	<!-- detail planning Modal-->
	<div class="modal fade" id="detailPlanning" tabindex="-1" role="dialog" aria-labelledby="detailPlanning" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detailPlanning"><b>Detail Planning</b></h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="modal-data">

					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#detailPlanning').on('show.bs.modal', function (e) {
				var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
            	type : 'post',
            	url : '<?php echo base_url('planning/getDetail');?>',
            	data :  'rowid='+ rowid,
            	success : function(data){
                $('.modal-data').html(data);//menampilkan data ke dalam modal
            }
        });
        });
		});
	</script>