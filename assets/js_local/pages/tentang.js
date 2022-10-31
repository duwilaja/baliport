$(document).ready(function () {
  addTentang();
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
                  dt_banner()
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