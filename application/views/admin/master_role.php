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
			var name_role = $(this).data('name_role');
			var c = confirm('Apakah anda yakin akan menghapus admin: "' + name_role + '" ?');
			if (c == true) {
				$.ajax({
					url: bu + 'admin/hapusRole',
					dataType: 'json',
					method: 'POST',
					data: {
						id_role: id_role
					}
				}).done(function(e) {
					console.log(e);
					notifikasi('#alertNotif', e.message, !e.status);
					datatable.ajax.reload();
				}).fail(function(e) {
					console.log('gagal');
					console.log(e);
					var message = 'Terjadi Kesalahan. #JSMP01';
					notifikasi('#alertNotif', message, true);
				});
			}
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
			var nama = $(this).data('role_name');

			var all_admin = $(this).data('role-all_admin');
			var tambah_admin = $(this).data('role-tambah_admin');
			var all_user = $(this).data('role-all_user');
			var all_produk = $(this).data('role-all_produk');
			var tambah_produk = $(this).data('role-tambah_produk');

			var transaksi = $(this).data('role-transaksi');
			var bundling = $(this).data('role-bundling');
			var grade = $(this).data('role-grade');
			var spek_hp = $(this).data('role-spek_hp');
			var spek_smartwatch = $(this).data('role-spek_smartwatch');
			var spek_laptop = $(this).data('role-spek_laptop');
			var waktu = $(this).data('role-waktu');


			var bidding_ldu = $(this).data('role-bidding_ldu');
			var transaksi_bundling = $(this).data('role-transaksi_bundling');
			var transaksi_ldu = $(this).data('role-transaksi_ldu');
			var master_harga = $(this).data('role-master_harga');
			var master_user_lihat = $(this).data('role-master_user_lihat');
			var transaksi_ldu_lihat = $(this).data('role-transaksi_ldu_lihat');
			var histori_admin = $(this).data('role-histori_admin');
			var histori_user = $(this).data('role-histori_user');

			var daftarBidderLihat = $(this).data('role-daftarbidderlihat');
			var membership = $(this).data('role-membership');
			var voucher = $(this).data('role-voucher');
			var statistik = $(this).data('role-statistik');

			var faq = $(this).data('role-faq');
			var setting = $(this).data('role-setting');

			var harga_awal = $(this).data('role-harga_awal');
			var harga_jual = $(this).data('role-harga_jual');

			var transaksi_regular_lihat = $(this).data('role-transaksi_regular_lihat');
			var ldu_lihat = $(this).data('role-ldu_lihat');
			// console.log(ldu_lihat);
			// return false;

			$('#btnEditAdmin').show();
			$('#btnTambahAdmin').hide();
			$('.modalProdukTitleTambah').hide();
			$('#modalProdukTitleUbah').show();
			$('#tambahUser').hide();
			$('#modalEditUserTitle').hide();
			$('#editUser').show();
			$('#modalAdmin').modal('show');

			// $('.btnEditAdmin').on('click', function() {

			$('#id_role').val(id_role);

			$('#nama').val(nama);

			var noRoleSelected = true;
			if (all_admin || tambah_admin || all_user ||
				all_produk || tambah_produk ||
				transaksi || bundling || grade ||
				spek_hp || spek_smartwatch || spek_laptop || waktu ||
				histori_admin || histori_user || daftarBidderLihat || membership || voucher || statistik || faq || setting || ldu_lihat
			)
				noRoleSelected = false;
			if (all_admin == "1") $('#role-all_admin').prop('checked', true);
			if (tambah_admin == "1") $('#role-tambah_admin').prop('checked', true);
			if (all_user == "1") $('#role-all_user').prop('checked', true);
			if (all_produk == "1") $('#role-all_produk').prop('checked', true);
			if (tambah_produk == "1") $('#role-tambah_produk').prop('checked', true);

			if (transaksi == "1") $('#role-transaksi').prop('checked', true);
			if (bundling == "1") $('#role-bundling').prop('checked', true);
			if (grade == "1") $('#role-grade').prop('checked', true);
			if (spek_hp == "1") $('#role-spek_hp').prop('checked', true);
			if (spek_smartwatch == "1") $('#role-spek_smartwatch').prop('checked', true);
			if (spek_laptop == "1") $('#role-spek_laptop').prop('checked', true);
			if (waktu == "1") $('#role-waktu').prop('checked', true);

			if (bidding_ldu == "1") $('#role-bidding_ldu').prop('checked', true);
			if (transaksi_bundling == "1") $('#role-transaksi_bundling').prop('checked', true);
			if (master_harga == "1") $('#role-harga').prop('checked', true);
			if (transaksi_ldu == "1") $('#role-transaksi_ldu').prop('checked', true);
			if (master_user_lihat == "1") $('#role-master_user_lihat').prop('checked', true);
			if (transaksi_ldu_lihat == "1") $('#role-transaksi_ldu_lihat').prop('checked', true);
			if (transaksi_regular_lihat == "1") $('#role-transaksi_regular_lihat').prop('checked', true);
			if (histori_admin == "1") $('#role-histori_admin').prop('checked', true);
			if (histori_user == "1") $('#role-histori_user').prop('checked', true);
			if (daftarBidderLihat == "1") $('#role-daftarBidderLihat').prop('checked', true);
			if (membership == "1") $('#role-membership').prop('checked', true);
			if (voucher == "1") $('#role-voucher').prop('checked', true);
			if (statistik == "1") $('#role-statistik').prop('checked', true);
			if (faq == "1") $('#role-faq').prop('checked', true);
			if (setting == "1") $('#role-setting').prop('checked', true);
			if (harga_awal == "1") $('#role-harga_awal').prop('checked', true);
			if (harga_jual == "1") $('#role-harga_jual').prop('checked', true);
			if (ldu_lihat == "1") $('#role-ldu_lihat').prop('checked', true);




			// return false;
		});

		$('#btnEditAdmin').on('click', function() {
			// console.log("ter");console.log("ter");
			// return false;

			$('small.text-danger').html('');
			var nama = $('#nama').val();
			var id_role = $('#id_role').val();

			var all_admin = $('#role-all_admin').prop('checked');
			var tambah_admin = $('#role-tambah_admin').prop('checked');
			var all_user = $('#role-all_user').prop('checked');
			var all_produk = $('#role-all_produk').prop('checked');
			var tambah_produk = $('#role-tambah_produk').prop('checked');

			var transaksi = $('#role-transaksi').prop('checked');
			var bundling = $('#role-bundling').prop('checked');
			var grade = $('#role-grade').prop('checked');
			var spek_hp = $('#role-spek_hp').prop('checked');
			var spek_smartwatch = $('#role-spek_smartwatch').prop('checked');
			var spek_laptop = $('#role-spek_laptop').prop('checked');
			var waktu = $('#role-waktu').prop('checked');

			var bidding_ldu = $('#role-bidding_ldu').prop('checked');
			var transaksi_bundling = $('#role-transaksi_bundling').prop('checked');
			var master_harga = $('#role-harga').prop('checked');
			var master_user_lihat = $('#role-master_user_lihat').prop('checked');
			var transaksi_ldu = $('#role-transaksi_ldu').prop('checked');
			var transaksi_ldu_lihat = $('#role-transaksi_ldu_lihat').prop('checked');
			var histori_admin = $('#role-histori_admin').prop('checked');
			var histori_user = $('#role-histori_user').prop('checked');
			var daftarbidderlihat = $('#role-daftarBidderLihat').prop('checked');

			var membership = $('#role-membership').prop('checked');
			var voucher = $('#role-voucher').prop('checked');
			var statistik = $('#role-statistik').prop('checked');

			var faq = $('#role-faq').prop('checked');
			var setting = $('#role-setting').prop('checked');

			var harga_awal = $('#role-harga_awal').prop('checked');
			var harga_jual = $('#role-harga_jual').prop('checked');

			var transaksi_regular_lihat = $('#role-transaksi_regular_lihat').prop('checked');
			var ldu_lihat = $('#role-ldu_lihat').prop('checked');

			console.log(ldu_lihat);
			// return false

			var noRoleSelected = true;
			if (all_admin || tambah_admin || all_user ||
				all_produk || tambah_produk ||
				transaksi || bundling || grade ||
				spek_hp || spek_smartwatch || spek_laptop || waktu || transaksi_ldu_lihat || transaksi_ldu || master_user_lihat || master_harga || transaksi_bundling || bidding_ldu || histori_admin || histori_user || daftarbidderlihat || membership || voucher || statistik || faq || setting || transaksi_regular_lihat || ldu_lihat
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
						id_role: id_role,
						nama: nama,
						all_admin: all_admin,
						tambah_admin: tambah_admin,
						all_user: all_user,
						all_produk: all_produk,
						tambah_produk: tambah_produk,
						transaksi: transaksi,
						bundling: bundling,
						grade: grade,
						spek_hp: spek_hp,
						spek_smartwatch: spek_smartwatch,
						spek_laptop: spek_laptop,
						waktu: waktu,

						bidding_ldu: bidding_ldu,
						transaksi_bundling: transaksi_bundling,
						transaksi_ldu: transaksi_ldu,
						master_harga: master_harga,
						master_user_lihat: master_user_lihat,
						transaksi_ldu_lihat: transaksi_ldu_lihat,

						histori_admin: histori_admin,
						histori_user: histori_user,
						daftarBidderLihat: daftarbidderlihat,
						membership: membership,
						voucher: voucher,
						statistik: statistik,
						faq: faq,
						setting: setting,

						harga_awal: harga_awal,
						harga_jual: harga_jual,
						transaksi_regular_lihat: transaksi_regular_lihat,
						ldu_lihat: ldu_lihat,
					}
				}).done(function(e) {
					console.log('berhasil');
					// console.log(e);
					$('#nama').val('');
					$(':checkbox').prop('checked', false);
					// $('#modalAdmin').modal('hide'); //$('body').removeClass('modal-open');$('.modal-backdrop').remove();
					var alert = '';
					if (e.status) {
						notifikasi('#alertNotif', e.message, false);
						$('#modalAdmin').modal('hide');
						datatable.ajax.reload();
						// resetForm();
					} else {
						notifikasi('#alertNotifModal', e.message, true);

					}
				}).fail(function(e) {
					console.log(e);
					resetForm($('#modalAdmin'));
					$('#modalAdmin').modal('hide');
					notifikasi('#alertNotif', 'Terjadi kesalahan!', true);
				});
			}
			return false;
		});



	});
</script>
