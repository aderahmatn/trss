<div class="row">
	<div class="col-9">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
				<div class="button">
					<a class="btn btn-light text-primary btn-sm" type="button" href="<?=base_url('schedule') ?>"><i class="fas fa-arrow-circle-left"></i>
						Back
					</a>
				</div>
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<form action="" method="post">
						<input type="hidden" name="idtransaksi" id="idtransaksi" value="<?=uniqid('trss')?>" >

						<input type="hidden" name="iduser" id="iduser" value="<?= ucfirst($this->session->userdata('nik'));?>" >

						<input type="hidden" name="idplan" id="idplan" value="<?=$this->input->post('idplan')?$this->input->post('idplan'):$planning->IdPlan ?>" >

						<input type="hidden" name="idschedule" id="idschedule" value="<?=$this->input->post('idschedule')?$this->input->post('idschedule'):$schedule->IdSchedule ?>" >

						<div class="form-group row">
							<label for="actualqty" class="col-sm-2 col-form-label-sm">NO Planning</label>
							<div class="col-sm-6">

								<input type="text" class="form-control form-control-sm" name="hide" id="hide" autocomplete="off" aria-describedby="actualqtyhelp" value="<?=$planning->IdPlan?>" disabled>

								<a href='#detailPlanning' class='form-control form-control-sm btn btn-sm btn-info' id='custId' data-toggle='modal' data-id="<?=$planning->IdPlan?>"><i class="fa fa-eye"></i> Lihat Detail</a>
							
							</div>
							<div class="col-sm-4">
								<small id="actualqtyhelp" class="form-text text-muted">Quantity hasil produksi</small>
							</div>
						</div>

						<div class="form-group row">
							<label for="actualqty" class="col-sm-2 col-form-label-sm">Actual Qty</label>
							<div class="col-sm-6">

								<input type="text" class="form-control form-control-sm <?php echo form_error('actualqty')?'is-invalid':''?>" name="actualqty" id="actualqty" autocomplete="off" aria-describedby="actualqtyhelp" value="<?=set_value('actualqty')?>" >
								<div class="invalid-feedback" >
									<?php echo form_error('actualqty'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="actualqtyhelp" class="form-text text-muted">Quantity hasil produksi</small>
							</div>
						</div>

						<div class="form-group row">
							<label for="note" class="col-sm-2 col-form-label-sm">Note</label>
							<div class="col-sm-6">
								<textarea class="form-control form-control" name="note" id="note"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('note'); ?>
								</div>
							</div>
							<div class="col-sm-4">
							</div>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-save fa-sm"></i> save</button>
							
						</div>
					</form>
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