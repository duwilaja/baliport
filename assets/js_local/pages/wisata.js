$(document).ready(function () {
    dt_wisata();
    addwisata();
    upwisata();
});

function dt_wisata() {
    $('#tabel').DataTable({
        // Processing indicator
        "bAutoWidth": false,
        "destroy": true,
        "searching": true,
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        "scrollX": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": 'wisata/dt_wisata',
            "type": "POST",
        },
        //Set column definition initialisation properties
        "columnDefs": [{
            "targets": [0,4,5],
            "orderable": false
        }]
    });
}

function add_modal()
{
    $('#formAdd')[0].reset(); // reset form on modals
    $('#addModal').modal('show'); // show bootstrap modal

    $('#btnSave').text('Simpan'); //change button text
    $('#btnSave').attr('disabled',false); //set button disable 
    getKategori();
}

function edit_modal(id)
{
    $('#formEdit')[0].reset(); // reset form on modals
    $('#editModal').modal('show'); // show bootstrap modal

    $('#id').val(id);
    $.ajax({
        type: "GET",
        url: "wisata/getwisata/"+id,
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#judul').val(data.data.judul_wisata);
            $('#kategori2').append('<option value="'+data.data.kategori_id+'" selected>'+data.data.kategori+'</option>');
            $('#deskripsi').html(data.data.deskripsi);

            setTimeout(() => {
                $.ajax({
                    type: "GET",
                    url: "wisata/getKategori",
                    dataType: "json",
                    success: function (r) {
                        r.data.forEach(v => {
                        $('#kategori2').append('<option value="'+v.id+'" >'+v.kategori+'</option>');
                        });
                    }
                });
                setTimeout(() => {
                    $('#kategori2').select2();
                }, 100);
            }, 300);
        }
    });

    $('#btnUbah').text('Ubah'); //change button text
    $('#btnUbah').attr('disabled',false); //set button disable 
}

function addwisata() { 
    var link = 'wisata/in_wisata'; 
    $('#formAdd').submit(function (e) {
        $('#btnSave').text('Menyimpan...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable  
        e.preventDefault();
        $.ajax({
            type: "POST",
            url:link,
            secureuri: false,
            contentType: false,
            cache: false,
            processData:false,
            data: new FormData(this),
            dataType: "json",
            // beforeSend: function() {
            //    $('#btn-save').hide();
            //    $('#btn-save-loading').show();
            // },
            success: function (r) {
                if (r.status) {
                    $('#addModal').modal('hide');
                    Swal.fire(
                        'Berhasil',
                        r.msg,
                        'success'
                    );
                    dt_wisata()
                }else{
                    $('#addModal').modal('hide');
                    Swal.fire(
                        'Gagal',
                        r.msg,
                        'error'
                    );
                }
            },
            error: function () { 
                // Swal.fire(
                //     'Gagal',
                //     'Terjadi kesalahan upload',
                //     'error'
                //   );
    
                //   $('#btn-save').show();
                //   $('#btn-save-loading').hide();
             }
        });
     });
 }

 function upwisata() { 
    var link = 'wisata/up_wisata'; 
    $('#formEdit').submit(function (e) {
        $('#btnUbah').text('Mengubah...'); //change button text
        $('#btnUbah').attr('disabled',true); //set button disable  
        e.preventDefault();
        $.ajax({
            type: "POST",
            url:link,
            secureuri: false,
            contentType: false,
            cache: false,
            processData:false,
            data: new FormData(this),
            dataType: "json",
            // beforeSend: function() {
            //    $('#btn-save').hide();
            //    $('#btn-save-loading').show();
            // },
            success: function (r) {
                if (r.status) {
                    $('#editModal').modal('hide');
                    Swal.fire(
                        'Berhasil',
                        r.msg,
                        'success'
                        );
                    dt_wisata()
                }else{
                    $('#editModal').modal('hide');
                    Swal.fire(
                        'Gagal',
                        r.msg,
                        'error'
                        );
                }
            },
            error: function () { 
                // Swal.fire(
                //     'Gagal',
                //     'Terjadi kesalahan upload',
                //     'error'
                //   );
    
                //   $('#btn-save').show();
                //   $('#btn-save-loading').hide();
             }
        });
     });
   
 }

 function del_art(id)
 {
    Swal.fire({
        title: 'Apakah anda yakin ?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {         
            var link = 'wisata/set_nonaktif/'+id; 
            $.ajax({
                type: "POST",
                url: link,
                data : $(this).serialize(),
                dataType: "json",
                success: function (r) {
                    if (r.status) {
                        Swal.fire(
                            'Berhasil',
                            r.msg,
                            'success'
                        );
                        dt_wisata();
                    }else{
                        Swal.fire(
                            'Gagal',
                            r.msg,
                            'error'
                        );
                    }
                    
                }
            });
        }
      })
 }

 function getKategori() {
        $.ajax({
            type: "GET",
            url: "wisata/getKategori",
            dataType: "json",
            success: function (r) {
                r.data.forEach(v => {
                $('#kategori').append('<option value="'+v.id+'" >'+v.kategori+'</option>');
                });
            }
        });
        setTimeout(() => {
            $('#kategori').select2();
        }, 100);
 }