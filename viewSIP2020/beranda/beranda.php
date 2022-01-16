<!-- start slider section --> 
<section id="beranda" class="wow fadeIn ">
  <div class="container-fluid margin-70px-top">
  	<div class="row d-flex justify-content-center ">             
        <div class="col-12 col-sm-12 col-lg-12">        
          <div class="banner">
            <?php foreach ($banners as $key => $v) {?> 
            <div><img class="img-fluid max-300" src="<?=(empty($v['banner_image']))?'http://placehold.it/1142x743':base_url('assets/upload/banner/'.$v['banner_image']);?>" alt=""></div>
            <?php }?>
          </div>          
        </div>
    </div>
	</div>
</section>