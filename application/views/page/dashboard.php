<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Welcome <?= $this->session->userdata('nama')?></h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
    <div class="page-rightheader">
        <div class="ml-3 ml-auto d-flex">
        </div>
    </div>
</div>
<!--End Page header-->

<!--Row-->
<div class="row">
    <a href="<?=site_url('Artikel')?>" class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
        <div class="card text-center">
            <div class="card-body ">
                <div class="feature widget-2 text-center mt-0 mb-3">
                    <i class="si si-book-open project bg-primary-transparent mx-auto text-primary "></i>
                </div>
                <h6 class="mb-1 text-muted">Total Berita</h6>
                <h3 class="font-weight-semibold"><?=$total_artikel?></h3>
            </div>
        </div>
    </a>
    <!-- <a href="<?=site_url('Pengaduan')?>" class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
        <div class="card text-center">
            <div class="card-body ">
                <div class="feature widget-2 text-center mt-0 mb-3">
                    <i class="si si-bubbles project bg-danger-transparent mx-auto text-danger "></i>
                </div>
                <h6 class="mb-1 text-muted">Total Pengaduan</h6>
                <h3 class="font-weight-semibold"><?=$total_pengaduan?></h3>
            </div>
        </div>
    </a> -->
    <!-- <div class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="feature widget-2 text-center mt-0 mb-3">
                    <i class="ti-pulse  project bg-secondary-transparent mx-auto text-secondary "></i>
                </div>
                <h6 class="mb-1 text-muted">Total Profit</h6>
                <h3 class="font-weight-semibold">$46.352</h3>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-sm-6 col-md-6">
        <div class="card text-center">
            <div class="card-body ">
                <div class="feature widget-2 text-center mt-0 mb-3">
                    <i class="ti-stats-up project bg-success-transparent mx-auto text-success "></i>
                </div>
                <h6 class="mb-1 text-muted">Total Investiment</h6>
                <h3 class="font-weight-semibold">62%</h3>
            </div>
        </div>
    </div> -->
</div>
<!--End row-->

<!-- ROW OPEN -->
<!-- <div class="row row-cards">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Statistik Data Pengaduan</h3>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body ">
                <div id="echartArea3" class="chartsh h-290" _echarts_instance_="ec_1617609971925" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative; background: transparent;"><div style="position: relative; overflow: hidden; width: 726px; height: 290px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas width="726" height="290" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 726px; height: 290px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 0; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(50, 50, 50, 0.7); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 5px; left: 442px; top: 88px;">2016<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#2575fc;"></span>Profit: 144<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#fd6f82;"></span>Profit: 140</div></div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xl-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class=" card-title">Traffic by Site</h3>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body p-3">
                <div  id="donutchart" class="overflow-hidden h-260"></div>
                <div class="row mb-3 ml-3 mr-3 text-center">
                    <div class="col-6">
                        <span class="mb-1 text-muted d-block text-left">40%</span>
                        <div class="progress h-1 w-90" >
                            <div class="progress-bar bg-primary w-50" role="progressbar"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <span class="mb-1 text-muted d-block text-left">30%</span>
                        <div class="progress h-1 w-90">
                            <div class="progress-bar bg-secondary w-30" role="progressbar" ></div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 ml-3 mr-3 text-center">
                    <div class="col-6">
                        <span class="mb-1 text-muted d-block text-left">10%</span>
                        <div class="progress h-1 w-90 " >
                            <div class="progress-bar bg-danger w-20" role="progressbar"></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <span class="mb-1 text-muted d-block text-left">20%</span>
                        <div class="progress h-1 w-90" >
                            <div class="progress-bar bg-success w-10" role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- row closed -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Berita</h3>
                <div class="card-options ">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="table-responsive">
                <div class="row mx-0">
                    <div class="my-2 ml-auto mr-2"><a href="<?=site_url('Artikel')?>" class="btn btn-success">View More</a></div>
                </div>
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>Kategori</th>
                            <th>Dibuat Pada</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($artikel as $row) :?>
                        <tr>
                            <td><?= $i++?></td>
                            <td><?= $row->judul_artikel?></td>
                            <td><?= $row->kategori?></td>
                            <td><?= $row->ctd_date?></td>
                            <td><img src="<?= base_url().'data/artikel/'.$row->gambar;?>" alt="" width="100px"></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!-- table-responsive -->
        </div>
    </div>
</div>
