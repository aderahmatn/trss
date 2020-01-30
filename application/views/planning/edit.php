<div class="row">
	<div class="col-9">
		<!-- Collapsable Card -->
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<a href="#createProduct" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="createProduct">
				<h6 class="m-0 font-weight-bold text-primary">Create Planning</h6>
			</a>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="createProduct">
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group row">
							<label for="position" class="col-sm-3 col-form-label-sm">Position</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm <?php echo form_error('position')?'is-invalid':''?>" name="position" id="position" aria-describedby="processhelp">
									<option selected hidden value="">Pilih Position..</option>
									<?php $positionx = $this->input->post('position')?$this->input->post('position'):$position->IdPosition ?>
									<?php foreach ($position as $proc) :?>
									<option value="<?=$proc->IdPosition?>" <?=$positionx == "$proc->IdPosition" ? "selected" : ''?>><?=ucfirst($proc->PositionName);?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('position'); ?>
								</div>
							</div>
							<div class="col-sm-3">
								<small id="positionhelp" class="form-text text-muted"></small>
							</div>
						</div>
						
						<div class="form-group row processing">
							<label for="processing" id="lblprocessing" class="col-sm-3 col-form-label-sm">Proccesing</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm <?php echo form_error('processing')?'is-invalid':''?>" name="processing" id="processing" aria-describedby="processhelp" >
									<option selected hidden value="" >Pilih Process..</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('processing'); ?>
								</div>
							</div>
						</div>
						
						<div class="form-group row line">
							<label for="lineproduct" id="lbllineproduct" class="col-sm-3 col-form-label-sm">Line</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm <?php echo form_error('lineproduct')?'is-invalid':''?>" name="lineproduct" id="lineproduct" aria-describedby="processhelp">
									<option selected hidden value="">Pilih Line..</option>
									<?php foreach ($line as $proc) :?>
									<option value="<?=$proc->IdLine?>" <?=set_value('lineproduct') == "$proc->IdLine" ? "selected" : ''?>><?=ucfirst($proc->LineName);?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('lineproduct'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="lineproducthelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="form-group row product">
							<label for="product" id="lblproduct" class="col-sm-3 col-form-label-sm">Product</label>
							<div class="col-sm-6">
								<select class="form-control form-control-sm <?php echo form_error('product')?'is-invalid':''?>" name="product" id="product" aria-describedby="producthelp">
									<option selected hidden value="">Pilih Product..</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('product'); ?>
								</div>
							</div>
							<div class="col-sm-4">
								<small id="lineproducthelp" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="form-group row qty">
							<label for="qty" id="lblqty" class="col-sm-3 col-form-label-sm">Quantity</label>
							<div class="col-sm-6">
								<input type="text" class="form-control form-control-sm <?php echo form_error('qty')?'is-invalid':''?>" name="qty" id="qty" autocomplete="off" aria-describedby="dateplannhelp" value="<?=set_value('qty')?>">
								<div class="invalid-feedback">
									<?php echo form_error('qty'); ?>
								</div>
								<input type="hidden" name="datecreate" id="datecreate" value="<?=date('d/m/Y');?>" >

							</div>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-primary btn-sm shadow-sm" id="btnSave"><i class="fas fa-save fa-sm"></i> save</button>
									<button type="reset" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-window-close fa-sm"></i> reset</button>
						</div>
					</form>
				</div>
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
					Produk yang dipilih adalah produk yang sudah terdaftar di <strong><a href="<?=base_url('product'); ?>">master produk</a></strong>.<br>
					Pilih <strong>Position </strong>terlebih dahulu untuk menampilkan pilihan <strong>Line</strong> dan <strong>Produk</strong>.  
				</small>
			</div>
		</div>
	</div>
</div>
<!-- dropdown-chaining-process-->
        <script type="text/javascript">
          $(document).ready(function(){
              

            $('#position').change(function(){

              


              var id=$(this).val();
              $.ajax({
                url : "<?php echo base_url('planning/getProcess');?>",
                method : "POST",
                data : {id: id},
                dataType : 'json',
                success: function(data){
                  var html = "";
                  var i;
                  for(i=0; i<data.length; i++){
                    html += "<option value='"+data[i].IdProcess+"'>"+data[i].ProcessName+"</option>";
                  }
                  $('#processing').html(html);
                }
              });
            });
          });
        </script>

        <!-- dropdown-chaining-product-->
        <script type="text/javascript">
          $(document).ready(function(){
            $('#lineproduct').change(function(){

              

              var id=$(this).val();
              var ps=$('#position').val();

              $.ajax({
                url : "<?php echo base_url('planning/getProduct');?>",
                method : "POST",
                data : {id: id, ps:ps},
                dataType : 'json',
                success: function(data){
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html += "<option value='"+data[i].IdProduk+"'>"+data[i].PartName+" - "+data[i].PartNumber+"</option>";
                  }
                  $('#product').html(html);
                }
              });
            });
            $('#qty').click(function(){
              $('#btnSave').attr("disabled", false);

            });
          });

        </script>
