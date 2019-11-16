$(function() {

	$('.tombolTambahData').on('click', function() {
		$('#judulModal').html('Tambah Barang');
		$('.modal-footer button[type=submit]').html('Tambah Data')
			$('#namaBarang').val('');
			$('#hargaBeli').val('');
			$('#hargaJual').val('');
			$('#stok').val('');
			$('#id').val('');
		
	});


	$('.tampilModalEdit').on('click', function() {
		$('#judulModal').html('Edit Detail Barang');
		$('.modal-footer button[type=submit]').html('Perbarui Data');
		$('.modal-body form').attr('action', 'http://localhost/ci-test/barang/edit');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/ci-test/barang/getedit',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				
				$('#namaBarang').val(data.namaBarang);
				$('#hargaBeli').val(data.hargaBeli);
				$('#hargaJual').val(data.hargaJual);
				$('#stok').val(data.stok);
				$('#id').val(data.id);
			}
		});

	});

});

//Preview Image
function readURL(input) {
	if(input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
			$('#foto').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$('#fotoBarang').change(function() {
	readURL(this);
});