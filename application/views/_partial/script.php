		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- Jquery js-->
		<script src="<?= base_url(); ?>assets/js/vendors/jquery-3.4.0.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="<?= base_url(); ?>assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Othercharts js-->
		<script src="<?= base_url(); ?>assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!-- Circle-progress js-->
		<script src="<?= base_url(); ?>assets/js/vendors/circle-progress.min.js"></script>

		<!-- Jquery-rating js-->
		<script src="<?= base_url(); ?>assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Horizontal js-->
		<script src="<?= base_url(); ?>assets/plugins/horizontal-menu/horizontal.js"></script>

		<!-- P-scroll js-->
		<script src="<?= base_url(); ?>assets/plugins/p-scroll/perfect-scrollbar.js"></script>

		<!-- ECharts js -->
		<script src="<?= base_url(); ?>assets/plugins/echarts/echarts.js"></script>

		<!-- CHARTJS CHART -->
		<script src="<?= base_url(); ?>assets/plugins/chart/chart.bundle.js"></script>
		<script src="<?= base_url(); ?>assets/plugins/chart/utils.js"></script>

		<!-- Peitychart js-->
		<script src="<?= base_url(); ?>assets/plugins/peitychart/jquery.peity.min.js"></script>
		<script src="<?= base_url(); ?>assets/plugins/peitychart/peitychart.init.js"></script>

		<!-- Index js--
		<script src="<?= base_url(); ?>assets/js/index1.js"></script-->

		<!-- Apexchart js-->
		<script src="<?= base_url(); ?>assets/js/apexcharts.js"></script>

		<script src="<?=base_url();?>assets/plugins/sweet-alert/jquery.sweet-modal.min.js"></script>
		<script src="<?=base_url();?>assets/plugins/sweet-alert/sweetalert.min.js"></script>
		<script src="<?=base_url();?>assets/js/sweet-alert.js"></script>

		<!-- Data tables js-->
		<script src="<?=base_url();?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="<?=base_url();?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
		<script src="<?=base_url();?>assets/js/datatables.js"></script>

		<!--Select2 js -->
		<script src="<?=base_url();?>assets/plugins/select2/select2.full.min.js"></script>
		
		<!-- Add fancyBox -->
		<link rel="stylesheet" href="<?=base_url();?>assets/plugins/jquery-fancybox/jquery.fancybox.min.css" type="text/css" media="screen" />
		<script type="text/javascript" src="<?=base_url();?>assets/plugins/jquery-fancybox/jquery.fancybox.min.js"></script>

		<script src="<?=base_url();?>assets/plugins/jquery-fancybox/jquery.fancybox.min.js"></script>

		<script type="text/javascript" src="<?= base_url()?>assets/plugins/image-uploader/image-uploader.min.js"></script>
		<script type="text/javascript" src="<?= base_url()?>assets/plugins/uploader/custom.js"></script>

		<?php if(@$fileScript){ ?>
			<script src="<?= base_url();?>assets/js_local/pages/<?=$fileScript;?>"></script>
		<?php } ?>

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

		<!-- Custom js-->
		<script src="<?= base_url(); ?>assets/js/custom.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				// setInterval(function(){
				// 	$.ajax({
				// 		url:"<?=base_url()?>Notif/getNotif",
				// 		type:"POST",
				// 		dataType:"json",
				// 		success:function(r){
				// 			if (r.data.length != 0) {
				// 				$('#notif').addClass('bg-danger pulse')
				// 				$('#content-notif').html('')
				// 				r.data.forEach(v => {
				// 						$('#content-notif').append(`
				// 							<a href="javasctipt:void(0)" onclick="upstsnotif(${v.id})" class="dropdown-item d-flex  pb-2">
				// 								<div class="card box-shadow-0 mb-0 ">
				// 									<div class="card-body p-3">
				// 										<div class="notifyimg bg-gradient-danger border-radius-4 bg-danger">
				// 											<i class="si si-bubbles"></i>
				// 										</div>
				// 										<div>
				// 											<div>${v.info}</div>
				// 											<div class="small text-muted">${timeAgo(v.ctd_date)}</div>
				// 										</div>
				// 									</div>
				// 								</div>
				// 							</a>
				// 						`)
				// 					});
				// 				}
				// 			}
				// 		});
				// 	},2000);
			})

			function upstsnotif(id) {
				$.ajax({
					type: "POST",
					url: '<?= base_url()?>Notif/up_notif',
					data: {id : id},
					dataType: "json",
					success: function (r) {
						if (r.status) {
							window.location.href = "<?= base_url('Pengaduan')?>";
						}
					}
				});
			}

			const MONTH_NAMES = [
				'January', 'February', 'March', 'April', 'May', 'June',
				'July', 'August', 'September', 'October', 'November', 'December'
			];


			function getFormattedDate(date, prefomattedDate = false, hideYear = false) {
				const day = date.getDate();
				const month = MONTH_NAMES[date.getMonth()];
				const year = date.getFullYear();
				const hours = date.getHours();
				let minutes = date.getMinutes();

				if (minutes < 10) {
					// Adding leading zero to minutes
					minutes = `0${ minutes }`;
				}

				if (prefomattedDate) {
					// Today at 10:20
					// Yesterday at 10:20
					return `${ prefomattedDate } at ${ hours }:${ minutes }`;
				}

				if (hideYear) {
					// 10. January at 10:20
					return `${ day }. ${ month } at ${ hours }:${ minutes }`;
				}

				// 10. January 2017. at 10:20
				return `${ day }. ${ month } ${ year }. at ${ hours }:${ minutes }`;
			}


			// --- Main function
			function timeAgo(dateParam) {
				if (!dateParam) {
					return null;
				}

				const date = typeof dateParam === 'object' ? dateParam : new Date(dateParam);
				const DAY_IN_MS = 86400000; // 24 * 60 * 60 * 1000
				const today = new Date();
				const yesterday = new Date(today - DAY_IN_MS);
				const seconds = Math.round((today - date) / 1000);
				const minutes = Math.round(seconds / 60);
				const isToday = today.toDateString() === date.toDateString();
				const isYesterday = yesterday.toDateString() === date.toDateString();
				const isThisYear = today.getFullYear() === date.getFullYear();


				if (seconds < 5) {
					return 'now';
				} else if (seconds < 60) {
					return `${ seconds } seconds ago`;
				} else if (seconds < 90) {
					return 'about a minute ago';
				} else if (minutes < 60) {
					return `${ minutes } minutes ago`;
				} else if (isToday) {
					return getFormattedDate(date, 'Today'); // Today at 10:20
				} else if (isYesterday) {
					return getFormattedDate(date, 'Yesterday'); // Yesterday at 10:20
				} else if (isThisYear) {
					return getFormattedDate(date, false, true); // 10. January at 10:20
				}

				return getFormattedDate(date); // 10. January 2017. at 10:20
			}
		</script>

