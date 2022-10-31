<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('portal/_partial/head.php')?>
<body>
<!--Wrapper Start-->
<div class="wrapper"> 
  <!--Header Start-->
  <?php $this->load->view('portal/_partial/navbar.php')?>
  <!--Header End--> 
  <!--Slider Start-->
  <?php $this->load->view('portal/'.$link)?>
  <?php $this->load->view('portal/_partial/footer.php')?>
  <!--Footer End--> 
</div>
<!--Wrapper End-->

<?php $this->load->view('portal/_partial/script.php')?>
</body>
</html>