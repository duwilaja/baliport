<?php $this->load->view('_partial/head');?>
<body>
		<div id="global-loader" >
			<img src="<?=base_url();?>assets/images/svgs/loader.svg" alt="loader">
		</div>

	<div class="page">
		<div class="page-main">
		
			<?php $this->load->view('_partial/header');?>
		
			<?php $this->load->view('_partial/menu');?>
			<div class="app-content page-body">
				
				<div class="container">
					<?php $this->load->view('page/'.$link);?>
				</div>
				
			</div>
		</div>
		
		<?php $this->load->view('_partial/footer')?>
	</div>
	
	<!-- core:js -->
	<?php $this->load->view('_partial/script');?>
	
	<script>
	$(document).ready(function (){
		getnotif();
	});
	function getnotif(){
		$.ajax({
			type: "GET",
			url: "<?= base_url();?>Pengaduan/notify",
			dataType: "json",
			success: function (data) {
				console.log(data);
				var contents="";
				for(var i=0;i<data.length;i++){
					contents+=
						'<a href="<?= base_url()?>Pengaduan/isi/'+data[i][2]+'" class="dropdown-item d-flex pb-2 fancybox" style="padding:unset;">'+
                            '<div class="card box-shadow-0 mb-0 ">'+
                                '<div class="card-body p-3">'+
                                    '<div class="notifyimg bg-gradient-danger border-radius-4 bg-danger">'+
                                        '<i class="si si-bubbles"></i>'+
                                    '</div>'+
                                    '<div>'+
                                        '<div> Pengaduan dari '+data[i][0]+'</div>'+
                                        '<div class="small text-muted">'+data[i][1]+'</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</a>';
                }
				$("#notify").html(contents);
				$(".fancybox").fancybox({type:'ajax'});
				setTimeout(getnotif,300*1000); //5 minutes auto refresh
			}
		});
	}
	</script>
</body>
</html>