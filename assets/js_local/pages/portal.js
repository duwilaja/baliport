const months = ["JAN", "FEB", "MAR","APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
const token = "c81185605c84873d5cd676d6eeb64bcb"
$(document).ready(function () {
	nextevents()
	nowevents()
	doneevents()
	eventbigsmall()
	dept()
});


function format24H(time) {
	var timeString = time;
	var H = +timeString.substr(0, 2);
	var h = H % 12 || 12;
	var ampm = (H < 12 || H === 24) ? " AM" : " PM";
	timeString = h + timeString.substr(2, 3) + ampm;
	return timeString
}

function nextevents() {
	$.ajax({
		type: "POST",
        url: "Api/event",
		data:{status : 1},
		headers: {"token": token},
        dataType: "json",
        success: function (data) {
			let gex = /;/i;
			data.data.forEach(v => {
				let tgl_start = new Date(v.tgl_start)
				let tstart = tgl_start.getDate() + " " + months[tgl_start.getMonth()] + ", " + tgl_start.getFullYear()
				let tgl_end = new Date(v.tgl_end)
				let tend = tgl_end.getDate() + " " + months[tgl_end.getMonth()] + ", " + tgl_end.getFullYear()
				let img = v.uploadedfile;
				$('#NextEvents').append(`
				<ul class="event-list">
					<li> <strong class="edate">${v.tgl_end != '0000-00-00' ? tstart+' - <br> '+ tend : tstart }</strong> <strong class="etime">${v.jam_end != '00:00:00' ? format24H(v.jam_start)+' - <br>'+format24H(v.jam_end) : format24H(v.jam_start)}</strong> </li>
					<li><img src="${img.match(gex) ? img.split(';')[0] : img}" style="width:80px;height:70px;" alt=""></li>
					<li class="el-title">
					<h6><a href="${baseUrl}Portal/eventSingle/${v.id}">${v.judul_event}</a></h6>
					<p><i class="fas fa-map-marker-alt"></i> ${v.lokasi}</p>
					</li>
					<li> <a href="${baseUrl}Portal/maps?lokasi=${v.lat},${v.lng}&id=${v.id}" class="joinnow">Join Now</a> </li>
				</ul>
				`)
			});
        }
    });
	
}

function nowevents() {
	$.ajax({
        type: "POST",
        url: "Api/event",
		data:{status : 2},
		headers: {"token": token},
        dataType: "json",
        success: function (data) {
			let gex = /;/i;
			data.data.forEach(v => {
				let tgl_start = new Date(v.tgl_start)
				let tstart = tgl_start.getDate() + " " + months[tgl_start.getMonth()] + ", " + tgl_start.getFullYear()
				let tgl_end = new Date(v.tgl_end)
				let tend = tgl_end.getDate() + " " + months[tgl_end.getMonth()] + ", " + tgl_end.getFullYear()
				let img = v.uploadedfile;
				$('#NowEvents').append(`
				<ul class="event-list">
					<li> <strong class="edate">${v.tgl_end != '0000-00-00' ? tstart+' - <br> '+ tend : tstart }</strong> <strong class="etime">${v.jam_end != '00:00:00' ? format24H(v.jam_start)+' - <br>'+format24H(v.jam_end) : format24H(v.jam_start)}</strong> </li>
					<li><img src="${img.match(gex) ? img.split(';')[0] : img}" style="width:80px;height:70px;" alt=""></li>
					<li class="el-title">
					<h6><a href="${baseUrl}Portal/eventSingle/${v.id}">${v.judul_event}</a></h6>
					<p><i class="fas fa-map-marker-alt"></i> ${v.lokasi}</p>
					</li>
					<li> <a href="${baseUrl}Portal/maps?lokasi=${v.lat},${v.lng}&id=${v.id}" class="joinnow">Join Now</a> </li>
				</ul>
				`)
			});
        }
    });
	
}

function doneevents() {
	$.ajax({
        type: "POST",
        url: "Api/event",
		data:{status : 3},
		headers: {"token": token},
        dataType: "json",
        success: function (data) {
			let gex = /;/i;
			data.data.forEach(v => {
				let tgl_start = new Date(v.tgl_start)
				let tstart = tgl_start.getDate() + " " + months[tgl_start.getMonth()] + ", " + tgl_start.getFullYear()
				let tgl_end = new Date(v.tgl_end)
				let tend = tgl_end.getDate() + " " + months[tgl_end.getMonth()] + ", " + tgl_end.getFullYear()
				let img = v.uploadedfile;
				$('#DoneEvents').append(`
				<ul class="event-list">
					<li> <strong class="edate">${v.tgl_end != '0000-00-00' ? tstart+' - <br> '+ tend : tstart }</strong> <strong class="etime">${v.jam_end != '00:00:00' ? format24H(v.jam_start)+' - <br>'+format24H(v.jam_end) : format24H(v.jam_start)}</strong> </li>
					<li><img src="${img.match(gex) ? img.split(';')[0] : img}" style="width:80px;height:70px;" alt=""></li>
					<li class="el-title">
					<h6><a href="${baseUrl}Portal/eventSingle/${v.id}">${v.judul_event}</a></h6>
					<p><i class="fas fa-map-marker-alt"></i> ${v.lokasi}</p>
					</li>
					<li></li>
				</ul>
				`)
			});
        }
    });
	
}

function eventbigsmall() {
	$.ajax({
		type: "POST",
        url: "Api/event",
        dataType: "json",
		headers: {"token": token},
		success: function (data) {
			data.data.forEach(v => {
				let gex = /;/i;
				let img = v.uploadedfile;
				$('#eventBig').append(`
				<div class="event-big">
                  <div class="event-cap">
                    <h5><a href="${baseUrl}Portal/eventSingle/${v.id}">${v.judul_event}</a></h5>
                    <ul>
                      <li><i class="fas fa-image"></i> ${img.split(';').length} Photos</li>
                    </ul>
                    <p style="color:#fff!important;"> ${v.deskripsi_event} </p>
                  </div>
                  <img src="${img.match(gex) ? img.split(';')[0] : img}" alt=""> </div>
				`)
				$('#eventSmall').append(`
					<div><img src="${img.match(gex) ? img.split(';')[0] : img}" alt=""></div>
				`)

			});

			if ($('.recent-event-slider').length) {
				$('.recent-event-slider').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					fade: true,
					adaptiveHeight: true,
					autoplay: true,
  					autoplaySpeed: 6000,
					asNavFor: '.recent-event-slider-nav'
				});
				$('.recent-event-slider-nav').slick({
					slidesToShow: 4,
					slidesToScroll: 1,
					asNavFor: '.recent-event-slider',
					arrows:false,
					dots: false,
					centerMode: false,
					focusOnSelect: true,
				});
			}
        }
    });
}

function dept() {
	$.ajax({
		type: "POST",
        url: "Api/dept",
		headers: {"token": token},
        dataType: "json",
        success: function (data) {
			data.data.forEach(v => {
				$('#dept').append(`
				<div class="col-md-4 col-sm-4">
					<div class="deprt-icon-box"> <img src="data/dept/${v.image}" alt="">
					<h6> <a href="Portal/detailDept/${v.id}">${v.nama_departemen}</a> </h6>
					<a class="rm" href="Portal/detailDept/${v.id}">More</a> </div>
				</div>
				`)

			});
        }
    });
}