<!doctype html>
<html lang="en" class="h-100">
    <?php $this->load->view('layanan/_partial/head');?>
<body class="d-flex flex-column h-100">

    <?php $this->load->view('layanan/_partial/navbar')?>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?php $this->load->view('layanan/'.$link);?>
        </div>
    </main>

    <?php $this->load->view('layanan/_partial/script')?>
    </body>
</html>
