$(document).ready(function () {
  addTentang();
  upTentang();
  dt_tentang();
});

function addModal()
{
  $('#formAdd')[0].reset(); // reset form on modals
  $('#addModal').modal('show'); // show bootstrap modal

  $('#btnSave').text('Simpan'); //change button text
  $('#btnSave').attr('disabled',false); //set button disable 
}

function dt_tentang() {
  $('#dataTbl_tentang').DataTable({
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
          "url": 'Tentang/dt_tentang',
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
        url: "tentang/getTentang/"+id,
        dataType: "json",
        success: function (data) {
            console.log(data);
            $('#deskripsi').val(data.data.deskripsi);
			$('#judul').val(data.data.judul);
        }
    });

    $('#btnUbah').text('Ubah'); //change button text
    $('#btnUbah').attr('disabled',false); //set button disable 
}

function addTentang() { 
  var link = 'Tentang/in_tentang'; 
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
                  dt_tentang()
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

function upTentang() { 
    var link = 'tentang/up_tentang'; 
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
                    dt_tentang()
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
            var link = 'tentang/del_tentang/'+id; 
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
                        dt_tentang();
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