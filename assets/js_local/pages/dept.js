const token = "c81185605c84873d5cd676d6eeb64bcb"
$(document).ready(function () {
	dept()
});

function dept() {
	$.ajax({
		type: "POST",
        url: "../Api/dept",
		headers: {"token": token},
        dataType: "json",
        success: function (data) {
			data.data.forEach(v => {
				$('#dept').append(`
				<div class="col-md-4 col-sm-4">
					<div class="deprt-icon-box"> <img src="../data/dept/${v.image}" alt="">
					<h6> <a href="detailDept/${v.id}">${v.nama_departemen}</a> </h6>
					<a class="rm" href="detailDept/${v.id}">More</a> </div>
				</div>
				`)

			});
        }
    });
}