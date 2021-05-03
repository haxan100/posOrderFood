	<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	$bu = base_url();
	$obj['ci'] = $ci;

	$awal = date('Y-m') . '-01';
	$now = date('Y-m-d');
	$_dynamycInputName = "_x" . date("YmdHis");
	?>

	<div class="col-md-12 col-sm-12 ">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Transaksi</h2>
				<style>
					#image {
						max-width: 100px;
						display: block;
					}
				</style>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row">
					<div class="col-sm-12">
						<span class="col-lg-2 col-md-3 col-sm-6 col-xs-12 px-0 my-1">
							<a class="btn m-t-20 btn-info waves-effect waves-light" href="" id="btnExport" style="margin-top:0%"> <i class="fa fa-file-excel-o" aria-hidden="true"></i>
							 EXPORT </a>
						</span>

						<div class="card-box table-responsive">
							<input value="<?= $awal ?> / <?= $now ?>" type="text" name="datepicker<?= $_dynamycInputName ?>" id="datepicker" placeholder="Rentang Tanggal" class="datepicker form-control col-lg-3 col-md-3 col-sm-6 col-xs-12 mr-2 my-1">
							<span class="px-0 pb-0 col-lg-2 col-md-3 col-sm-6 col-xs-12 my-1">
								<button class="btn btn-info waves-effect waves-light" id="resetDate"><span class="fa fa-sync"></span> Reset</button>
							</span>
							</p>
							<!-- <button type="button" class="btn btn-primary btn_tambah" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah</button> -->

							<table id="datatable_data" class="table table-striped table-bordered">

								<thead>
									<tr>
										<th>No.</th>
										<th>Kasir</th>
										<th>Kode Transaksi<br>Tanggal Transaksi</th>
										<th>Nama User</th>
										<th> Jual</th>
										<th>Status</th>
										<th style="width: 100px !important; ">Aksi</th>
									</tr>
								</thead>
							</table>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table id="datatable_detail" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Menu</th>
								<th> QTY</th>
								<th>Harga</th>
								<th>Total Harga</th>
							</tr>
						</thead>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>



	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function(event) {
			// $('#tableDestroy').on('click', function() {
			// });

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

			});
			// $('#exampleModal').modal('show');
			var bu = '<?= base_url(); ?>';
			var url_form_ubah = bu + 'Admin/ubah_admin_proses';
			var url_form_tambah = bu + 'Admin/tambah_admin_proses';
			$('#datatable_detail').dataTable().fnClearTable();
			$('#datatable_detail').dataTable().fnDestroy();
			$('body').on('click', '.btn_edit', function() {
				url_form = url_form_ubah;

				var id_transaksi = $(this).data('id_transaksi');
				console.log(id_transaksi);
				$('#exampleModal').modal('show');
				// datatables.destroy();

				var datatables = $('#datatable_detail').DataTable({
					dom: "Bfrltip",
					// "retrieve": true,
					'pageLength': 10,
					"responsive": true,
					"processing": true,
					"bProcessing": true,
					"autoWidth": false,
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
							"className": "dt-head-center"
						}, {
							"targets": 3,
							"className": "dt-head-center"
						},
					],
					"order": [
						[1, "desc"]
					],
					'ajax': {
						url: bu + 'Data/getAllTransaksiDetail',
						type: 'POST',
						"data": function(d) {

							d.id = id_transaksi;

							return d;
						}
					},

					language: {
						searchPlaceholder: "Cari",

					},
					// columnDefs: [{
					// 	targets: -1,
					// 	visible: false
					// }],
					"lengthMenu": [
						[10, 25, 50, 1000],
						[10, 25, 50, 1000]
					]

				});
				datatables.destroy();


			});



			$('body').on('click', '.hapus', function() {

				var id_admin = $(this).data('id_admin');
				var nama = $(this).data('nama_admin');
				Swal.fire({
					title: 'Apakah Anda Yakin ?',
					text: "Anda akan Menghapus Data: " + nama,
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {

					if (result.value) {
						$.ajax({
							url: bu + 'Admin/hapusAdmin',
							dataType: 'json',
							method: 'POST',
							data: {
								id_admin: id_admin
							}
						}).done(function(e) {
							console.log(e);
							Swal.fire(
								'Deleted!',
								e.message,
								'success'
							)
							$('#modal-detail').modal('hide');
							datatable.ajax.reload();



						}).fail(function(e) {
							console.log('gagal');
							console.log(e);
							var message = 'Terjadi Kesalahan. #JSMP01';
							// notifikasi('#alertNotif', message, true);
						});




					}
				})




			});

			function notifikasi(sel, msg, err) {
				var alert_type = 'alert-success ';
				if (err) alert_type = 'alert-danger ';
				var html = '<div class="alert ' + alert_type + ' alert-dismissible show p-4">' + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				$(sel).html(html);
				$('html, body').animate({
					// scrollTop: $(sel).offset().top - 75
				}, 500);
			}

			$("#form").submit(function(e) {
				console.log('form submitted');
				// return false;

				$.ajax({
					url: url_form,
					method: 'post',
					dataType: 'json',
					data: new FormData(this),
					processData: false,
					contentType: false,
					cache: false,
					async: false,
				}).done(function(e) {
					console.log(e);
					if (e.status) {
						notifikasi('#alertNotif', e.message, false);
						// Swal.fire(e.message)
						Swal.fire(
							':)',
							e.message,
							'success'
						)

						$('#modal-detail').modal('hide');
						// setTimeout(function() {
						// 	location.reload();
						// }, 4000);
						datatable.ajax.reload();
						// window.location.reload();
						// resetForm();
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Oopssss...',
							text: e.message,

						})
					}
				}).fail(function(e) {
					console.log(e);
					notifikasi('#alertNotif', 'Terjadi kesalahan!', true);
				});
				return false;
			});

			function notifikasiModal(modal, sel, msg, err) {
				var alert_type = 'alert-success ';
				if (err) alert_type = 'alert-danger ';
				var html = '<div class="alert ' + alert_type + ' alert-dismissible show p-4">' + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				$(sel).html(html);
				$(modal).animate({
					// scrollTop: $(sel).offset().top - 75
				}, 500);
			}

			$('body').on('click', '.btn_tambah', function() {
				url_form = url_form_tambah;
				console.log(url_form);
				$('#Edit').hide();
				$('#tambah_act').show();
			});

			$('#tambah_act').on('click', function() {

				var nama = $('#nama').val();
				var username = $('#username').val();
				var password = $('#password').val();
				var role = $('#role').val();

				if (
					nama && username && password && role
				) {
					$("#form").submit();
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oopssss...',
						text: 'Mohon Isi Field yang di perlukan!',

					})
				}
				// return false;
			});

			var datatable = $('#datatable_data').DataTable({
				dom: "Bfrltip",
				'pageLength': 10,
				"responsive": true,
				"processing": true,
				"bProcessing": true,
				"autoWidth": false,
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
						"className": "dt-head-center"
					}, {
						"targets": 3,
						"className": "dt-head-center"
					}, {
						"targets": 4,
						"className": "dt-head-center"
					},
				],
				"order": [
					[1, "desc"]
				],
				'ajax': {
					url: bu + 'Data/getAllTransaksi',
					type: 'POST',
					"data": function(d) {

						d.date = $('#datepicker').val();

						return d;
					}
				},

				buttons: [

					'excelHtml5',
					'pdfHtml5',
					{
						text: "Excel",
						extend: "excelHtml5",
						className: "btn btn-round btn-info",
						title: 'Data Guru Kelas',

						exportOptions: {
							columns: [1, 2, 3, 4]
						}
					}, {
						text: "PDF",
						extend: "pdfHtml5",
						className: "<br>btn btn-round btn-danger",
						title: 'Data Guru Kelas',

						exportOptions: {
							columns: [1, 2, 3, 4]
						}
					}





				],
				language: {
					searchPlaceholder: "Cari",

				},
				// columnDefs: [{
				// 	targets: -1,
				// 	visible: false
				// }],
				"lengthMenu": [
					[10, 25, 50, 1000],
					[10, 25, 50, 1000]
				]

			});
			$('#btnExport').on('click', function() {
				var date = $('#datepicker').val();
				// console.log(tipe_produk);return(false);dt_filter_status
				var url = bu + 'Export/master_list_transaksi_export/?';
				// url += '&tipe_bid='+tipe_bid;
				url += '&date=' + date;
				window.location = url;
				console.log(url);
				return (false);

			});


		});
	</script>
