<?php
defined('BASEPATH') or exit('No direct script access allowed');
$bu = base_url();
$obj['ci'] = $ci;
?>
<style>
	.btn-blocks {
		width: 100%;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<a href="javascript:void(0)" data-toggle="modal" data-target="#modalAdmin" class="btn m-t-20 btn-info waves-effect waves-light btnTambahAdmin">
						<i class="ti-plus"></i> Tambah Admin Role
					</a>


					<p id="alertNotif" class="mt-2"></p>
					<div class="table-responsive">
						<table id="adminList" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Role</th>
									<th style="width: 100px;">Aksi</th>
								</tr>
							</thead>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade none-border" id="modalAdmin">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title modalProdukTitleTambah"><strong>Tambah</strong> Role Baru</h4>
				<h4 class="modal-title modalProdukTitleUbah  style=" display: none"><strong>Ubah</strong> Role</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p id="alertNotifModal" class="mt-2"></p>
				<input id="id_role" name="id_role" value="" type="hidden">
				<div class="row ">
					<div class="col p-6">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input id="nama" name="nama" name="nama" placeholder="Masukan Nama" type="text" class="form-control">

							<small></small>
							<div class="form-group">
								<label for="nama"> <small class="text-danger"></small></label>
							</div>
						</div>

						<div class="form-group">
							<label for="inputRole">Role <small class="text-danger"></small></label>
						</div>
						<div class="form-group row">
							<div class="col-1"></div>
							<div class="form-check col-3">
								<input class="form-check-input" type="checkbox" value="" id="role-data_admin">
								<label class="form-check-label" for="role-data_admin">
									Master Admin
								</label>
							</div>
							<div class="form-check col-3">
								<input class="form-check-input" type="checkbox" value="" id="role-data_kasir">
								<label class="form-check-label" for="role-data_kasir">
									Master Kasir
								</label>
							</div>
							<div class="form-check col-3">
								<input class="form-check-input" type="checkbox" value="" id="role-master_menu">
								<label class="form-check-label" for="role-master_menu">
									Master Manu
								</label>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-1"></div>
							<div class="form-check col-3">
								<input class="form-check-input" type="checkbox" value="" id="role-master_transaksi">
								<label class="form-check-label" for="role-master_transaksi">
									Master transaksi
								</label>
							</div>
							<div class="form-check col-3">
								<input class="form-check-input" type="checkbox" value="" id="role-Histori">
								<label class="form-check-label" for="role-Histori">
									Histori
								</label>
							</div>
							<div class="form-check col-3">
								<input class="form-check-input" type="checkbox" value="" id="role-Setting">
								<label class="form-check-label" for="role-Setting">
									Setting
								</label>
							</div>
							<div class="col-2"></div>
						</div>




					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" id="btnTambahAdmin" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
				<button type="button" id="btnEditAdmin" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
				<button type="button" class="  btn btn-secondary waves-effect close" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>
<script>
	/****************************************
	 *       Basic Table                   *
	 ****************************************/
	document.addEventListener("DOMContentLoaded", function(event) {
		var bu = '<?= base_url(); ?>'

		// $('#modalAdmin').modal('show');


		function hapusSemua() {
			$(".form-control").val("");
			$('input:checkbox').prop("checked", false);
		}
		hapusSemua();
		$('.close').on('click', function() {
			console.log('dddd');
			hapusSemua();


		});


		$('#btnTambahAdmin').on('click', function() {

			$('small.text-danger').html('');
			var nama = $('#nama').val();

			var master_admin = $('#role-data_admin').prop('checked');
			var master_kasir = $('#role-data_kasir').prop('checked');
			var master_menu = $('#role-master_menu').prop('checked');
			var master_transaksi = $('#role-master_transaksi').prop('checked');
			var histori = $('#role-Histori').prop('checked');
			var setting = $('#role-Setting').prop('checked');

			var noRoleSelected = true;

			if (master_admin || master_kasir || master_menu ||
				master_transaksi || histori || setting

			) noRoleSelected = false;
			if (nama == '') {
				$('*[for="nama"] > small').html('Harap Isikan Nama!');
			} else if (noRoleSelected) {
				$('*[for="inputRole"] > small').html('Harap pilih minimal 1 Role!');
				// alert('harap isi Role!');
			} else {

				$.ajax({
					url: '<?= $bu ?>admin/tambah_role ',
					dataType: 'json',
					method: 'POST',
					data: {
						nama,
						master_admin,
						master_kasir,
						master_menu,
						master_transaksi,
						histori,
						setting

					}
				}).done(function(e) {
					console.log('berhasil');
					console.log(e);
					$('#nama').val('');
					$('#username').val('');
					$('#password').val('');
					$('#email').val('');
					$(':checkbox').prop('checked', false);
					$('#modalAdmin').modal('show');
					datatable.ajax.reload();
					//$('body').removeClass('modal-open');$('.modal-backdrop').remove();
					var alert = '';
					if (e.status) {
						// notifikasi('#alertNotif', e.message, false);
						$('#modalAdmin').modal('hide');
						datatable.ajax.reload();
						// alert("tutup!")
						Swal.fire(
							'Tambah!!',
							e.message,
							'success'
						)
						// resetForm();
					} else {
						Swal.fire(
							'gagal!!',
							e.message,
							'error'
						)
						// notifikasi('#alertNotifModal', e.message, true);
						// $.each(e.errorInputs, function(key, val) {
						// 	console.log(val[0], val[1]);
						// 	validasi(val[0], false, val[1]);
						// 	$(val[0])
						// 		.parent()
						// 		.find('.input-group-text')
						// 		.addClass('form-control is-invalid');
						// });

					}
				}).fail(function(e) {
					console.log(e);
					resetForm($('#modalAdmin'));
					$('#modalAdmin').modal('show');
					notifikasi('#alertNotif', 'Terjadi kesalahan!', true);
				});
			}
			return false;
		});

		function resetForm($form) {
			$form.find('input:text, input:password, input:file, select, textarea').val('');
			$form.find('input:radio, input:checkbox')
				.removeAttr('checked').removeAttr('selected');
		}

		$('body').on('click', '.btnHapus', function() {
			var id_role = $(this).data('id_role');
			var name_role = $(this).data('nama_role');
			// var c = confirm('Apakah anda yakin akan menghapus admin: "' + name_role + '" ?');


			Swal.fire({
				title: 'Are you sure?',
				text: "Anda akan Menghapus data : " + name_role,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: bu + 'admin/hapusRole',
						dataType: 'json',
						method: 'POST',
						data: {
							id_role: id_role
						}
					}).done(function(e) {
						console.log(e);
						Swal.fire(
							'Deleted!',
							'Your file has been deleted.',
							'success'
						)
						datatable.ajax.reload();
					}).fail(function(e) {
						console.log('gagal');
						console.log(e);
						Swal.fire(
							'GAGAL!',
							'Gagal Menghapus.',
							'error'
						)
						var message = 'Terjadi Kesalahan. #JSMP01';
					});



				}
			})


			return false;
		});
		var datatable = $('#adminList').DataTable({
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
					"width": "20px"
				},
				{
					"targets": 1,
					"className": "dt-head-center"
				},
				{
					"targets": 2,
					"className": "dt-body-center dt-head-center",
					"orderable": false
				},
			],
			"order": [
				[1, "asc"]
			],
			'ajax': {
				url: '<?= base_url('Data/getAllAdminRole'); ?>',
				type: 'POST',
			},
		});
		$('.btnTambahAdmin').on('click', function() {
			$('.modalProdukTitleTambah').show();
			$('.modalProdukTitleUbah').hide();
			$('#btnEditAdmin').hide();

		});
		// Button Ubah
		$('body').on('click', '.btnEditAdmin', function() {

			var id_role = $(this).data('id_role');
			var nama = $(this).data('nama_role');

			var data_admin = $(this).data('data_admin');
			var data_kasir = $(this).data('data_kasir');
			var master_menu = $(this).data('master_menu');
			var master_transaksi = $(this).data('master_transaksi');
			var histori = $(this).data('histori');
			var seeting = $(this).data('seeting');

			$('#btnEditAdmin').show();
			$('#btnTambahAdmin').hide();
			$('.modalProdukTitleTambah').hide();
			$('#modalProdukTitleUbah').show();
			$('#tambahUser').hide();
			$('#modalEditUserTitle').hide();
			$('#editUser').show();
			$('#modalAdmin').modal('show');

			$('#id_role').val(id_role);

			$('#nama').val(nama);
			console.log(data_admin, data_kasir, master_menu, master_transaksi, histori, seeting)
			var noRoleSelected = true;
			if (data_admin || data_kasir || master_menu ||
				master_transaksi || histori ||
				seeting
			)
				noRoleSelected = false;

			if (data_admin == "1") $('#role-data_admin').prop('checked', true);
			if (data_kasir == "1") $('#role-data_kasir').prop('checked', true);
			if (master_menu == "1") $('#role-master_menu').prop('checked', true);
			if (master_transaksi == "1") $('#role-master_transaksi').prop('checked', true);
			if (histori == "1") $('#role-Histori').prop('checked', true);

			if (seeting == "1") $('#role-Setting').prop('checked', true);
		});

		$('#btnEditAdmin').on('click', function() {
			// console.log("ter");console.log("ter");
			// return false;

			$('small.text-danger').html('');
			var nama = $('#nama').val();
			var id_role = $('#id_role').val();

			var data_admin = $('#role-data_admin').prop('checked');
			var data_kasir = $('#role-data_kasir').prop('checked');
			var master_menu = $('#role-master_menu').prop('checked');
			var master_transaksi = $('#role-master_transaksi').prop('checked');
			var Histori = $('#role-Histori').prop('checked');
			var Setting = $('#role-Setting').prop('checked');

			var noRoleSelected = true;
			if (data_admin || data_kasir || master_menu ||
				master_transaksi || Histori ||
				Setting
			) noRoleSelected = false;

			if (nama == '') {
				$('*[for="nama"] > small').html('Harap isi Nama!');
				// alert('harap isi Nama!');
			} else if (noRoleSelected) {
				$('*[for="inputRole"] > small').html('Harap pilih minimal 1 Role!');
				alert('harap isi Role!');
			} else {

				$.ajax({
					url: '<?= $bu ?>admin/edit_role ',
					dataType: 'json',
					method: 'POST',
					data: {
						id_role,
						nama,
						data_admin,
						data_kasir,
						master_menu,
						master_transaksi,
						Histori,
						Setting
					}
				}).done(function(e) {
					console.log('berhasil');
					// console.log(e);
					$('#nama').val('');
					$(':checkbox').prop('checked', false);
					// $('#modalAdmin').modal('hide'); //$('body').removeClass('modal-open');$('.modal-backdrop').remove();
					var alert = '';
					if (e.status) {
						// notifikasi('#alertNotif', e.message, false);
						Swal.fire(
							'Berhasil!',
							e.message,
							'success'
						)
						$('#modalAdmin').modal('hide');
						datatable.ajax.reload();
						// resetForm();
					} else {
						// notifikasi('#alertNotifModal', e.message, true);
						Swal.fire(
							'gagal!',
							e.message,
							'error'
						)

					}
				}).fail(function(e) {
					console.log(e);
					resetForm($('#modalAdmin'));
					$('#modalAdmin').modal('hide');
					// notifikasi('#alertNotif', 'Terjadi kesalahan!', true);
					Swal.fire(
						'gagal!',
						e.message,
						'error'
					)
				});
			}
			return false;
		});



	});
</script>
