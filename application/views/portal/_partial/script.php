<!-- JS --> 
<script src="<?= base_url('assets/portal/');?>js/jquery.min.js"></script> 
<script src="<?= base_url('assets/portal/');?>js/bootstrap.min.js"></script> 
<script src="<?= base_url('assets/portal/');?>js/owl.carousel.min.js"></script> 
<script src="<?= base_url('assets/portal/');?>js/jquery.prettyPhoto.js"></script> 
<script src="<?= base_url('assets/portal/');?>js/slick.min.js"></script> 
<script src="<?= base_url('assets/portal/');?>js/custom.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/plugins/image-uploader/image-uploader.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/plugins/uploader/custom.js"></script>
<script src="<?=base_url();?>assets/plugins/sweet-alert/jquery.sweet-modal.min.js"></script>
<script src="<?=base_url();?>assets/plugins/sweet-alert/sweetalert.min.js"></script>
<script src="<?=base_url();?>assets/js/sweet-alert.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> 
<!--Rev Slider Start--> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/jquery.themepunch.revolution.min.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/extensions/revolution.extension.actions.min.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/extensions/revolution.extension.migration.min.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script> 
<script type="text/javascript" src="<?= base_url('assets/portal/');?>js/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL_aHwpdqEvFPQmhorKU3G4FtzoXIQ6ks&libraries=places,localContext&v=beta&callback=initMap"></script>
	<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
<?php 
    $baseUrl = base_url();
?>

<script>
    var baseUrl = '<?= $baseUrl?>'
</script>

<?php 
    if (isset($js)) {
        foreach ($js as $v) {
            echo '<script src="'.$v.'"></script>';
        }
    }
    ?>

<script>
    var monthNames = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "July", "Agustus", "September", "Oktober", "November", "Desember" ]; 
    var dayNames= ["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"]
    $(document).ready(function () {
        // tags();
    // Create a newDate() object
    var newDate = new Date();
    // Extract the current date from Date object
    newDate.setDate(newDate.getDate());
    // Output the day, date, month and year    
    $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

    setInterval( function() {
        // Create a newDate() object and extract the seconds of the current time on the visitor's
        var seconds = new Date().getSeconds();
        // Add a leading zero to seconds value
        $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
        },1000);
        
    setInterval( function() {
        // Create a newDate() object and extract the minutes of the current time on the visitor's
        var minutes = new Date().getMinutes();
        // Add a leading zero to the minutes value
        $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
        },1000);
        
    setInterval( function() {
        // Create a newDate() object and extract the hours of the current time on the visitor's
        var hours = new Date().getHours();
        // Add a leading zero to the hours value
        $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
        }, 1000);
        
    });

    function tags() {
        $.ajax({
		type: "POST",
        url: "Api/beritaKategori",
        headers: {"token": token},
        dataType: "json",
        success: function (data) {
            data.data.forEach(v => {
                $('#tags').append(`
                    <li><a href="javascript:void(0)" style="cursor:default">${v.kategori}</a></li>
                `)
            });

        }
    });
    }
</script>