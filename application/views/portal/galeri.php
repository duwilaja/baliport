    <!-- Start Main News Area -->
    <section class="main-news-area">
        <div class="container mb-5">
            <div class="section-title"> 
                <h2>Gallery</h2> 
            </div>
            <div class="row">
                <?php foreach($galeri as $g){?>
				<div class="col-lg-3" style="margin-bottom: 30px;">
                    <img onclick="klik(this)" class="myImg" title="<?=$g->title?>" src="<?= $g->file;?>" alt="<?=$g->title?>">
                </div>
				<?php }?>
                <!--div class="col-lg-2 col-sm-2 ">
                    <img onclick="klik(this)" class="myImg" src="<?= base_url('bali/');?>assets/img/client/client-1.jpg" alt="image 2" style="width:100%;max-width:300px">
                </div>
                <div class="col-lg-2 col-sm-2 ">
                    <img onclick="klik(this)" class="myImg" src="<?= base_url('bali/');?>assets/img/client/client-1.jpg" alt="image 3" style="width:100%;max-width:300px">
                </div>
                <div class="col-lg-2 col-sm-2 ">
                    <img onclick="klik(this)" class="myImg" src="<?= base_url('bali/');?>assets/img/client/client-1.jpg" alt="image 4" style="width:100%;max-width:300px">
                </div>
                <div class="col-lg-2 col-sm-2 ">
                    <img onclick="klik(this)" class="myImg" src="<?= base_url('bali/');?>assets/img/client/client-1.jpg" alt="image 5" style="width:100%;max-width:300px">
                </div>
                <div class="col-lg-2 col-sm-2 ">
                    <img onclick="klik(this)" class="myImg" src="<?= base_url('bali/');?>assets/img/client/client-1.jpg" alt="image 6" style="width:100%;max-width:300px">
                </div-->
            </div>
            
            

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
        </div>
    </section>
    <!-- End Main News Area -->
	
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

function klik(img){
	//var img = document.getElementById(theimg);
	//img.onclick = function(){
	  modal.style.display = "block";
	  modalImg.src = img.src;
	  captionText.innerHTML = img.alt;
	//}
}
</script>