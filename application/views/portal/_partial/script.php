		<!-- Jquery Slim JS -->
        <script src="<?= base_url('bali/');?>assets/js/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="<?= base_url('bali/');?>assets/js/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="<?= base_url('bali/');?>assets/js/bootstrap.min.js"></script>
        <!-- Meanmenu JS -->
        <script src="<?= base_url('bali/');?>assets/js/jquery.meanmenu.js"></script>
        <!-- Owl Carousel JS -->
        <script src="<?= base_url('bali/');?>assets/js/owl.carousel.min.js"></script>
        <!-- Magnific Popup JS -->
        <script src="<?= base_url('bali/');?>assets/js/jquery.magnific-popup.min.js"></script>
        <!-- Nice Select JS -->
        <script src="<?= base_url('bali/');?>assets/js/nice-select.min.js"></script>
        <!-- Ajaxchimp JS -->
		<script src="<?= base_url('bali/');?>assets/js/jquery.ajaxchimp.min.js"></script>
		<!-- Form Validator JS -->
		<script src="<?= base_url('bali/');?>assets/js/form-validator.min.js"></script>
		<!-- Contact JS -->
        <script src="<?= base_url('bali/');?>assets/js/contact-form-script.js"></script>
        <!-- Wow JS -->
        <script src="<?= base_url('bali/');?>assets/js/wow.min.js"></script>
        <!-- Custom JS -->
        <script src="<?= base_url('bali/');?>assets/js/main.js"></script>
		
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
        $("#jam").html(( hours < 10 ? "0" : "" ) + hours);
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