<?php
defined('BASEPATH') or exit('No direct script access allowed');
$bu = base_url();
$obj['ci'] = $ci;
$obj['header'] = array(
	'title' => 'Histori Admin',
	'page' => 'histori_admin',
);
$_dynamycInputName = "_x" . date("YmdHis");
?>

<style>
	.select2-container .select2-selection--single {
		height: 35px;
	}

	@media (min-width: 1200px) {
		.modal-xl {
			max-width: 1140px;
		}
	}

	@media (min-width: 992px) {

		.modal-lg,
		.modal-xl {
			max-width: 800px;
		}
	}

	#m_foto>div>img {
		padding-right: 1%;
		width: 20%;
	}

	#m_foto>div {
		display: inline;
		position: relative;
	}

	.btn-blocks {
		width: 100%;
	}
</style>
<!-- <input type="hidden" id="id_user" value="<?= $urlid ?>" /> -->
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div>
						<!-- <button id="btnInvoiceall" class="btn btn-success my-1 text-white"> <span class="fas fa-file-pdf"></span> Download Invoice</button><br> -->
						<p class="px-2 row">
							<select id="dt_kategori" name="dt_kategori" class="btn btn-primary m-t-5 m-b-5 btn-info waves-effect waves-light" style="margin-left:0.2%; margin-right:1%">
								<option value="default" desable>Semua</option>
								<?php
								foreach ($listkategorilog as $r) {
									echo '
							<option value="' . $r->id_kategori . '">' . $r->nama_kategori . '</option>';
								}
								?>
							</select>
							<input type="text" name="datepicker<?= $_dynamycInputName ?>" id="datepicker" placeholder="Rentang Tanggal" class="datepicker form-control col-lg-3 col-md-3 col-sm-6 col-xs-12 mr-2 my-1">
							<button class="btn btn-info waves-effect waves-light my-1" id="resetDate"><span class="fa fa-sync"></span> Reset</button>
							<span class="text-warning" id="text-warning" style="margin-top:1%"></span>
						</p>
					</div>
					<p id="alertNotif" class="mt-2"></p>
					<div class="table-responsive">
						<table id="transaksiList" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tanggal</th>
									<th>Admin</th>
									<th>Keterangan</th>
								</tr>
							</thead>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script>
	/****************************************
	 *       Basic Table                   *
	 ****************************************/
	document.addEventListener("DOMContentLoaded", function(event) {
		$('#text-warning').show();



		var datatable = $('#transaksiList').DataTable({

			'lengthMenu': [
				[5, 10, 25, 50, -1],
				[5, 10, 25, 50, 'All']
			],
			'pageLength': 10,
			"processing": true,
			"serverSide": true,
			"columnDefs": [{
					"targets": 0,
					"className": "dt-body-center dt-head-center",
					"width": "20px",
					"orderable": false
				},
				{
					"targets": 1,
					"className": "dt-head-center"
				},
				{
					"targets": 2,
					"className": "dt-body-center dt-head-center"
				},
				{
					"targets": 3,
					"className": "dt-body-center dt-head-center"
				},

			],
			"order": [
				[1, "desc"]
			],
			'ajax': {
				url: '<?= base_url('Data/getHistoryAdmin'); ?>',
				type: 'POST',
				"data": function(d) {
					d.kategori = $('#dt_kategori').children('option:selected').val();
					// console.log(d.kategori);
					// return false ;
					d.date = $('#datepicker').val();
					d.selectDate = $('#selectDate option:selected').val();
					d.id_user = $('#id_user').val();
					return d;
				},
			},
		});

		$('#selectDate').on('change', function() {
			datatable.ajax.reload();
		});

		$('#dt_kategori').on('change', function() {
			datatable.ajax.reload();
		});
		$('#datepicker').datepicker({
			numberOfMonths: 1,
			maxDate: '+0D',
			dateFormat: 'yy-mm-dd',
			onSelect: function(selectedDate) {
				if (!$(this).data().datepicker.first) {
					$(this).data().datepicker.inline = true
					$(this).data().datepicker.first = selectedDate;
				} else {
					if (selectedDate > $(this).data().datepicker.first) {
						$(this).val($(this).data().datepicker.first + ' / ' + selectedDate);
					} else {
						$(this).val(selectedDate + ' / ' + $(this).data().datepicker.first);
					}
					$(this).data().datepicker.inline = false;
				}
				// alert($(this).val());
				datatable.ajax.reload();
			},
			onClose: function() {
				delete $(this).data().datepicker.first;
				$(this).data().datepicker.inline = false;
			}
		});
		$('#resetDate').on('click', function() {
			$('#datepicker').val('');
			datatable.ajax.reload();
		})


		$('#dt_kategori').select2({
			width: '25%',
		});




	});
</script>
