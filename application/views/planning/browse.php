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

										<td><a href='#detailPlanning' class='btn btn-sm btn-info' id='custId' data-toggle='modal' data-id="<?php echo $dt->IdPlan ?>"><i class="fa fa-eye"></i></a>
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