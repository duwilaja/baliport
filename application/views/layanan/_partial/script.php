    <script src="<?= base_url();?>assets/portal/js/vendor/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url();?>assets/portal/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/plugins/image-uploader/image-uploader.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>assets/plugins/uploader/custom.js"></script>
    <script src="<?=base_url();?>assets/plugins/sweet-alert/jquery.sweet-modal.min.js"></script>
	<script src="<?=base_url();?>assets/plugins/sweet-alert/sweetalert.min.js"></script>
	<script src="<?=base_url();?>assets/js/sweet-alert.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php 
    if (isset($js)) {
        foreach ($js as $v) {
            echo '<script src="'.$v.'"></script>';
        }
    }
    ?>