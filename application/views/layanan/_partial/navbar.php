<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#"><span class="badge badge-primary">Portal Solo</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if($this->uri->segment(2)=="lapor"){echo "active";}?>">
          <a class="nav-link " href="<?= base_url('Lapor/lapor')?>">E-Lapor</a>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="service"){echo "active";}?>">
          <a class="nav-link" href="<?= base_url('Lapor/service')?>">E-Service</a>
        </li>
      </ul>
    <a href="<?= base_url('Portal')?>" class="btn btn-primary my-2 my-sm-0"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
  </nav>
</header>