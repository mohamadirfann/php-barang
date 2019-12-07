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

// $('.custom-file-input').on('change', function () {
// 	let fileName = $(this).val().split('\\').pop();
// 	$(this).next('.custom-file-label').addClass("selected").html(fileName);
// });

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
