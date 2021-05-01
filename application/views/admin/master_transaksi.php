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

						<div class="card-box table-responsive">
							<input value="<?= $awal ?> / <?= $now ?>" type="text" name="datepicker<?= $_dynamycInputName ?>" id="datepicker" placeholder="Rentang Tanggal" class="datepicker form-control col-lg-3 col-md-3 col-sm-6 col-xs-12 mr-2 my-1">
							<span class="px-0 pb-0 col-lg-2 col-md-3 col-sm-6 col-xs-12 my-1">
								<button class="btn btn-info waves-effect waves-light" id="resetDate"><span class="fa fa-sync"></span> Reset</button>
							</span>
							</p>

							<button type="button" class="btn btn-primary btn_tambah" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah</button>

							<table id="datatable_data" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kasir</th>
										<th>Kode Transaksi<br>Tanggal Transaksi</th>
										<th>Nama User</th>
										<th> Jual</th>\
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


	<div class="modal fade bs-example-modal-lg" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<form id="form">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<h4>Detail </h4>

						<div class="row">
							<div class="col-md-12 col-sm-12 ">
								<div class="x_panel">

									<div class="x_content">
										<br />
										<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
											<div class="item form-group">
												<div class="col-md-6 col-sm-6 ">
													<input type="hidden" id="id_admin" name="id_admin" class="form-control " placeholder="Isikan Nama" readonly type="text" class="form-control">

												</div>
											</div>

											<div class="item form-group">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Nama Admin <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 ">
													<input id="nama" name="nama" class="form-control " placeholder="Isikan Nama Admin" type="text" class="form-control">

												</div>
											</div>

											<div class="item form-group">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Username<span class="required">*</span>
												</label>
												<div class="col-sm-9">

													<input id="username" name="username" class="form-control " placeholder="Username" type="text" class="form-control">

												</div>
											</div>

											<div class="item form-group">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Role <span class="required">*</span>
												</label>
												<div class="col-sm-9">
													<select class="form-control select col-md-8 col-sm-8" name="role" id="role">
														<option value="">Pilih</option>
														<?php
														foreach ($listKategori as $r) {
															echo '
														<option value="' . $r->id_role . '">' . $r->nama_role . '</option>
														';
														}
														?>
													</select>
												</div>
											</div>




											<div class="item form-group">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Password <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 ">
													<input id="password" name="password" class="form-control " placeholder="password" type="text" class="form-control">

												</div>
											</div>
											<div class="ln_solid"></div>
											<div class="item form-group">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="Edit">Save changes</button>

						<button type="button" class="btn btn-success" id="tambah_act">Tambah</button>
					</div>
				</div>
			</form>

		</div>
	</div>

	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function(event) {

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
			// $('#modal-detail').modal('show');
			var bu = '<?= base_url(); ?>';
			var url_form_ubah = bu + 'Admin/ubah_admin_proses';
			var url_form_tambah = bu + 'Admin/tambah_admin_proses';

			$('body').on('click', '.btn_edit', function() {
				url_form = url_form_ubah;
				// console.log(url_form);
				$('#tambah_act').hide();
				// $("#kode_wali").removeAttr('readonly');
				$("#id_menu").prop("readonly", true);

				var id_admin = $(this).data('id_admin');
				var nama_admin = $(this).data('nama_admin');
				var username = $(this).data('username');
				var password = $(this).data('password');
				var role = $(this).data('id_role');

				$('#id_admin').val(id_admin);
				$('#nama').val(nama_admin);
				$('#username').val(username);
				$('#password').val(password);
				$('#role').val(role);

				$('#Edit').show();


			});
			$('#Edit').on('click', function() {

				var id_admin = $('#id_admin').val();
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
						text: 'Mohon Isi Semua Filed!'

					})
				}
				// return false;
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


		});
	</script>
