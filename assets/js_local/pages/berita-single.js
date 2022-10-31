const months = ["JAN", "FEB", "MAR","APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
const token = "c81185605c84873d5cd676d6eeb64bcb"
$(document).ready(function () {
	next()
});

function next() {
	$.ajax({
		type: "POST",
        url: "../../Api/event",
		data:{status : 1},
		headers: {"token": token},
        dataType: "json",
        success: function (data) {
			data.data.forEach(v => {
				let tgl_start = new Date(v.tgl_start)
				$('#nextEvents').append(`
					<li>
						<div class="edate"> <strong>${tgl_start.getDate()}</strong> ${months[tgl_start.getMonth()]} <span class="year">${tgl_start.getFullYear()}</span> </div>
						<h6> <a href="#">${v.judul_event}</a> </h6>
						<span class="loc">${v.lokasi}</span> 
					</li>
				`)
			});
        }
    });
	
}