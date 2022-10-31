$(document).ready(function () {
    dt_event();
    addEvent();
    upEvent();
    $('.input-images').imageUploader({
        imagesInputName:'uploadedfile',
        extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
        mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
      });
});

function mappicker(lat,lng){
    window.open("map?lat="+$(lat).val()+"&lng="+$(lng).val(),"MapWindow","width=830,height=500,location=no").focus();
}

function dt_event() {
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
            "url": 'Event/dt_event',
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
    getKategori();
}

function edit_modal(id)
{
    $('.input-images-e').html('')
    $('#formEdit')[0].reset(); // reset form on modals
    $('#editModal').modal('show'); // show bootstrap modal

    $('#id').val(id);
    $.ajax({
        type: "GET",
        url: "Event/getEvent/"+id,
        dataType: "json",
        success: function (data) {
            $('#judul').val(data.data.judul_event);
            $('#status').val(data.data.status);
            $('#deskripsi').html(data.data.deskripsi_event);
            $('#lokasi').val(data.data.lokasi);
            $('#lat_e').val(data.data.lat);
            $('#lng_e').val(data.data.lng);
            $('#tgl_start').val(data.data.tgl_start);
            $('#tgl_end').val(data.data.tgl_end);
            $('#jam_start').val(data.data.jam_start);
            $('#jam_end').val(data.data.jam_end);
            let mytext = data.data.uploadedfile;
            let strarr = mytext.split(';');
            let preloaded =[]
            strarr.forEach(v => {
                let no = 0;
                preloaded.push({
                    id : no++,
                    src : v
                })
            });
        
            $('.input-images-e').imageUploader({
                preloaded: preloaded,
                imagesInputName:'uploadedfile',
                extensions: ['.jpg','.jpeg','.png','.gif','.svg'],
                mimes: ['image/jpeg','image/png','image/gif','image/svg+xml'],
              });
        }
    });


    $('#btnUbah').text('Ubah'); //change button text
    $('#btnUbah').attr('disabled',false); //set button disable 
}

function addEvent() { 
    var link = 'Event/in_event'; 
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
                    dt_event()
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

 function upEvent() { 
    var link = 'Event/up_event'; 
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
                    dt_event()
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
            var link = 'Event/del_event/'+id; 
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
                        dt_event();
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
            url: "Artikel/getKategori",
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

 function sts_e(tgl,dom) {
     let today = new Date();
     let date = today.getFullYear()+'-'+("0" + (today.getMonth() + 1)).slice(-2)+'-'+("0" + (today.getDate())).slice(-2);
     if (tgl < date) {
         $(dom).val(3)
     }else if (tgl == date){
         $(dom).val(2)
     }else if(tgl > date){
         $(dom).val(1)
     }
 }

 function cek_tgl(tgl_end) {
     let tgl_start = $("input[name=tgl_start]").val();
     if (tgl_start == '') {
        Swal.fire(
            'Perhatian !',
            'Silahkan input tanggal mulai terlebih dahulu',
            'warning'
        );
        $('input[name=tgl_end]').val('')
     }else {
         if (tgl_end < tgl_start) {
            Swal.fire(
                'Perhatian !',
                'Input tanggal selesai tidak boleh kurang dari tanggal mulai',
                'warning'
            );
            $('input[name=tgl_end]').val('')
         }
     }
 }