// Manipulasi insert dan delete data dalam satu modal
$(function () {

	$('.tombolTambahData').on('click', function () {
		$('#judulModal').html('Tambah Barang');
		$('.modal-footer button[type=submit]').html('Tambah Data')
		$('#namaBarang').val('');
		$('#hargaBeli').val('');
		$('#hargaJual').val('');
		$('#stok').val('');
		$('#id').val('');

	});


	$('.tampilModalEdit').on('click', function () {
		$('#judulModal').html('Edit Detail Barang');
		$('.modal-footer button[type=submit]').html('Perbarui Data');
		$('.modal-body form').attr('action', 'http://localhost/php-barang/barang/edit');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/php-barang/barang/getedit',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {

				$('#namaBarang').val(data.namaBarang);
				$('#hargaBeli').val(data.hargaBeli);
				$('#hargaJual').val(data.hargaJual);
				$('#stok').val(data.stok);
				$('#id').val(data.id);
			}
		});

	});

});

// Penanganan alert flashdata berhasil
const flashSuccess = $('.success').data('flashdata');

if (flashSuccess) {
	Swal.fire({
		title: 'Data Barang ',
		text: 'Berhasil ' + flashSuccess,
		icon: 'success'
	});
}

// Penanganan alert flashdata gagal
const flashError = $('.error').data('flashdata');

if (flashError) {
	Swal.fire({
		title: 'Data Barang ',
		text: 'Gagal ' + flashError,
		icon: 'error'
	});
}

// Penanganan onclick confirm pada tombol hapus
$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apa kamu yakin',
		text: "menghapus data barang ini?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

// Penanganan nama foto setelah dipilih
$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});

// Penanganan ketika tombol cancel diklik
$('.tombolCancel').on('click', function () {
	$('.custom-file-label').removeClass("selected").html('Upload Foto');
	$('#fotoBarang').val('');
});

// Menangani Form Validation Bootstrap
$(function () {
	'use strict';
	window.addEventListener('load', function () {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function (form) {
			form.addEventListener('submit', function (event) {
				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			}, false);
		});
	}, false);
});

// Menangani Data Tables
$(document).ready(function () {
	$('#tabelku').DataTable({
		"lengthMenu": [5, 10, 25, 50, 75, 100],
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
			"sEmptyTable": "Tidads"
		}
	});
});

//Preview Image
// function readURL(input) {
// 	if(input.files && input.files[0]) {
// 		var reader = new FileReader();

// 		reader.onload = function(e) {
// 			$('#foto').attr('src', e.target.result);
// 		}

// 		reader.readAsDataURL(input.files[0]);
// 	}
// }

// $('#fotoBarang').change(function() {
// 	readURL(this);
// });
