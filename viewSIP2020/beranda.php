<!-- start slider section --> 
<section id="beranda" class="wow fadeIn ">
  <div class="car margin-70px-top">
  	<div class="container d-flex justify-content-center ">  
      <div class="banner margin-20px-top">
        <?php foreach ($banners as $key => $v) {?> 
        <a target="_blank" href="<?=$v['banner_link'];?>" rel="noopener noreferrer">
          <div><img class="img-fluid" src="<?=(empty($v['banner_image']))?'http://placehold.it/1142x743':base_url('assets/upload/banner/'.$v['banner_image']);?>" alt=""></div>
        </a>
        <?php }?>
      </div>   
    </div>
  </div>
  
</section>

<!-- start slider section --> 
<section id="kreasi" class="wow fadeIn margin-10px-top ">
	<div class="container ">
  	<div class="row d-flex justify-content-center margin-50px-bottom" >
      <div class="col-12 col-sm-10 col-lg-12">
        <div class="text-center kreasi-sip margin-20px-bottom ">
				  <a href="#"><img class="img-fluid" src="<?php echo base_url('assets/images/beranda/Kreasi-SIP.png');?>"></a>
        </div>
        <div class="col-12 col-sm-12 col-lg-10 col-centered">
          <div class="text-center">
            <span class="headline-kreasi">Nutrisi tepat dan seimbang dapat membantu lindungi eksplorasi si Kecil untuk mendukungnya jadi Anak Unggul Indonesia. Temukan rekomendasi menu harian bergizi lengkap dan seimbang untuk si Kecil di sini.</span>
          </div>
        </div>
      </div>
      <div class="col-12 margin-10px-top"> 
        <div class="items">
          <?php $i = 1; ?>
          <?php foreach ($kreasi as $key => $v) {?>
          <a href="<?=base_url('kip/detail/'.$v['slug']);?>">           
            <div style="position: relative; left: 0; top: 0;">
              <div class="numberCircle text-center"><?= $i++ ?></div>
              <img class="img-fluid img-content" src="<?=(empty($v['banner']))?'http://placehold.it/600x400':base_url('assets/upload/kreasi/'.$v['banner']);?>">
              <div class="text-center">
                <label class="label-kreasi"><?=$v['title'];?></label>
                <p><span class="isi-kreasi"><?=$v['excerpt'];?></span></p>            
              </div>
            </div>
          </a>
          <?php }?>          
        </div>
      </div>
      <div class="text-center margin-40px-top">
        <button class="tombol" type="submit" style="border: 0; background: transparent;">
          <a href="<?=base_url('registrasi');?>"><img class="img-fluid daftar-kreasi" src="<?=base_url('assets/images/beranda/Daftar-Sekarang.png');?>"alt="submit" /></a>
        </button>
      </div>
		</div>
  </div>  
</section>

<!-- start slider section --> 
<section id="inspirasi" class="wow fadeIn margin-10px-top ">
	<div class="container">
  	<div class="row d-flex justify-content-center margin-50px-bottom" >
      <div class="col-12 col-sm-12 col-lg-12">
        <div class="text-center inspirasi-sip margin-20px-bottom ">
				  <a href="#"><img class="img-fluid" src="<?php echo base_url('assets/images/inspirasi/Inspirasi-Ibu-Pintar.png');?>"></a>
        </div>        
        <div class="col-12 col-centered margin-10px-top ">
          <div class="row ">
            
            <?php foreach ($inspirasi_first as $key => $v) {?> 
            <div class="col-12 col-sm-12 col-lg-8 blog-post blog-post-style1">
              <a href="<?=base_url('blog/detail/'.$v['slug']);?>">
                <div class="blog-post-images overflow-hidden">
                  <img class="img-fluid rounded-x" src="<?=(empty($v['image_path']))?base_url('assets/upload/default.jpg'):base_url('assets/upload/inspirasi/'.$v['image_path']);?>">
                </div>
              </a>
            </div>            
            <div class="col-12 col-sm-12 col-lg-4">              
                <h6 class="date"><?= date('d M Y', strtotime($v['date_published']));?></h6>
              <a href="<?=base_url('blog/detail/'.$v['slug']);?>">
                <p><h4 class="label-inspirasi"><?=$v['title'];?></h4></p>
              </a>
                <p><h5 class="content-inspirasi d-none d-sm-block"><?=$v['excerpt'];?></h5></p>
            </div>
            <?php }?>
          </div>
          
          <div class="row margin-30px-top" id="myList">
            <?php foreach ($inspirasi_second as $key => $v) {?> 
            <div class="col-md-6 moreArticles">
              <div class="article-item">
                <div class="article-item-asset clearfix blog-post blog-post-style1 margin-10px-bottom margin-20px-right">
                    <a href="<?=base_url('blog/detail/'.$v['slug']);?>">
                      <div class="blog-post-images overflow-hidden">
                          <img class="img-fluid mb-10 rounded" src="<?=(empty($v['image_path']))?base_url('assets/upload/default.jpg'):base_url('assets/upload/inspirasi/'.$v['image_path']);?>">
                      </div>
                    </a>
                </div>
                <div class="article-item-title">
                    <h6 class="date-l"><?= date('d M Y', strtotime($v['date_published']));?></h6>
                    <a href="<?=base_url('blog/detail/'.$v['slug']);?>">
                        <p><h5 class="label-inspirasi-l"><?=$v['title'];?> </h5></p>
                    </a>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
          <div class="text-center margin-40px-top">
            <button type="submit" style="border: 0; background: transparent;">
              <a href="<?=base_url('inspirasi');?>"><img class="img-fluid btn-lihatlebihbanyak" src="<?=base_url('assets/images/inspirasi/Lihat-Lebih-Banyak.png');?>"alt="submit" /></a>
            </button>
          </div>
        </div>
      </div>
		</div>
  </div>  
</section>

<!-- start slider section --> 
<section id="promo" class="wow fadeIn margin-10px-top ">
	<div class="container ">
  	<div class="row d-flex justify-content-center margin-50px-bottom" >
      <div class="col-12 col-sm-12 col-lg-12">
        <div class="text-center promo-sip margin-20px-bottom ">
				  <a href="#"><img class="img-fluid" src="<?php echo base_url('assets/images/promo/Promo-SIP.png');?>"></a>
        </div>
        <div class="promosis-g margin-30px-top mb-30">
          <?php foreach ($promosi as $key => $v) {?> 
          <div class="promosi-g">
            <a target="_blank" href="<?=$v['promosi_link'];?>" rel="noopener noreferrer">
              <img class="img-fluid rounded" src="<?=(empty($v['promosi_image']))?'http://placehold.it/600x400':base_url('assets/upload/promosi/'.$v['promosi_image']);?>">
            </a>
          </div>
          <?php }?>
        </div>
        <div class="text-center margin-40px-top">
          <button type="submit" style="border: 0; background: transparent;">
            <a href="<?=base_url('promo');?>"><img class="img-fluid btn-lihatlebihbanyak" src="<?=base_url('assets/images/inspirasi/Lihat-Lebih-Banyak.png');?>"alt="submit" /></a>
          </button>
        </div>
      </div>
		</div>
  </div>  
</section>

<!-- start slider section --> 
<section id="tentang" class="wow fadeIn margin-10px-top ">
	<div class="container">
  	<div class="row d-flex justify-content-center margin-50px-bottom" >
      <div class="col-12 col-sm-12 col-lg-12 margin-50px-top">
        <div class="row">
          <div class="col-12 col-sm-4 col-lg-4">
          </div>
          <div class="col-12 col-sm-8 col-lg-8 align">
            <img class="img-fluid tentang-sip" src="<?php echo base_url('assets/images/tentang/Tentang-Sahabat-Ibu-Pintar.png');?>">
          </div>
		    </div>
        <div class="row ">
          <?php foreach ($tentangheader as $key => $v) {?> 
          <div class="col-12 col-sm-4 col-lg-4 mt-minus10 align">
            <img class="img-fluid tentang-img" src="<?=(empty($v['about_image']))?'http://placehold.it/300x300':base_url('assets/upload/tentang/'.$v['about_image']);?>">
          </div>
          <div class="col-12 col-sm-8 col-lg-8 align">
            <p><h5 class="content-tentang"><?=$v['about_content'];?></h5></p>
            <p>
              <?php if(isset($_SESSION['email_user'])): ?>
              <button type="submit" style="border: 0; background: transparent;">
                <a href="<?=base_url('tentang');?>"><img class="img-fluid daftar-kreasi" src="<?=base_url('assets/images/inspirasi/Lihat-Lebih-Banyak.png');?>" alt="submit" />
                </a>
              </button>
              <?php else: ?>
              <button type="submit" style="border: 0; background: transparent;">
                <a href="<?=base_url('registration');?>"><img class="img-fluid daftar-kreasi" src="<?=base_url('assets/images/beranda/Daftar-Sekarang.png');?>"alt="submit" />
                </a>
              </button>
              <?php endif; ?>
            </p>
          </div>
          <?php }?>
		    </div>
      </div>
		</div>
  </div>  
</section>