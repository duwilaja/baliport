$(document).ready(function () {
    dt_yanrat();
    addYanrat();
    upYanrat();
});

function dt_yanrat() {
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
            "url": 'Yanrat/dt_yanrat',
            "type": "POST",
        },
        //Set column definition initialisation properties
        "columnDefs": [{
            "targets": [0,2],
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
}

function edit_modal(id)
{
    $('#formEdit')[0].reset(); // reset form on modals
    $('#editModal').modal('show'); // show bootstrap modal

    $('#id').val(id);
    $.ajax({
        type: "GET",
        url: "Yanrat/getYanrat/"+id,
        dataType: "json",
        success: function (data) {
            $('#nama_layanan').val(data.data.nama_layanan);
            $('#nomor_layanan').val(data.data.nomor_layanan);
            $('#alamat_layanan').html(data.data.alamat_layanan);
        }
    });

    $('#btnUbah').text('Ubah'); //change button text
    $('#btnUbah').attr('disabled',false); //set button disable 
}

function addYanrat() { 
    var link = 'Yanrat/in_yanrat'; 
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
                    dt_yanrat()
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

 function upYanrat() { 
    var link = 'Yanrat/up_yanrat'; 
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
                    dt_yanrat()
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

 function del_yanrat(id)
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
            var link = 'Yanrat/set_nonaktif/'+id; 
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
                        dt_yanrat();
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