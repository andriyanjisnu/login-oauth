<!-- start slider section --> 
<section id="registrasi" class="regis">
	
		<div class="margin-90px-top">
			<ul class="breadcrumb">
				<li>Home</li>
				<li>Form Pendaftaran</li>
			</ul>
		</div>
	
	<div class="container">
  	<div class="row d-flex justify-content-center " >
			<div class="col-sm-8 col-lg-5">				
				<div class="text-center masuk-akun margin-40px-top">
				  <a href="#"><img src="<?php echo base_url('assets/images/registrasi/Mari-Bergabung.png');?>"></a>
				</div>
				<div class="text-center margin-10px-top margin-20px-bottom">
          <span class="headline-regis">Ayo jadikan diri Anda bagian dari Komunitas Sahabat Ibu Pintar untuk berbagi informasi seputar ilmu modern parenting, mendapat penawaran spesial dari Blibli.com, dan memperluas networking!</span>
        </div>
				<div class="text-center btn-social">
					<a href="<?php echo $google_register_url; ?>">
						<img class="img-fluid" src="<?=base_url('assets/images/registrasi/Daftar-gg.png');?> " width="214.5" height="33" alt="submit" />
					</a>
					<a href="<?php echo $facebook_register_url; ?>">
						<img class="img-fluid" src="<?=base_url('assets/images/registrasi/Daftar-fb.png');?> " width="214.5" height="33" alt="submit" />
					</a>
				</div>
				<div class="text-center margin-10px-top">
					
						<img class="img-fluid" src="<?=base_url('assets/images/registrasi/ATAU.png');?>" width="435" height="10" alt="submit" />
					
				</div>
				<?php if(!empty($_SESSION['msg'])){?>
					<div class="alert alert-success text-center" role="alert">
						<?=$_SESSION['msg'];?>
					</div>
				<?php }?>
				<form method="post" class="needs-validation margin-10px-top" action="<?= base_url('registration'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
					<div class="form-group">
						<input name="user_email" type="email" class="form-control" id="user_email" placeholder="Masukan Email" autocomplete="off" value="<?php echo set_value('user_email'); ?>">
						<?php echo '<div class="invalid-feedback">'.strip_tags(form_error('user_email')).'</div>'; ?>
					</div>
					<div class="form-group">		
						<input name="user_password" class="form-control" type="password" id="password" placeholder="Password harus terdiri dari 8 karakter dan kombinasi Huruf dan Angka" autocomplete="off">
						<?php echo '<div class="invalid-feedback">'.strip_tags(form_error('user_password')).'</div>'; ?>
					</div>
					<div class="form-group">		
						<input name="konfirmasi_password" class="form-control" type="password" id="konfirmasi_password" placeholder="Konfirmasi Password" autocomplete="off">
						<?php echo '<div class="invalid-feedback">'.strip_tags(form_error('konfirmasi_password')).'</div>'; ?>
					</div>
					<div class="form-group text-center margin-20px-top">
						<button type="submit" style="border: 0; background: transparent;">
							<img class="img-fluid" src="<?=base_url('assets/images/registrasi/Daftar.png');?>"  width="80" height="35" alt="" />
						</button>
					</div>
				</form>	
				<div class="text-center margin-20px-top margin-80px-bottom">
					<span class="forgot">Sudah punya akun? <a href="<?=base_url('login');?>">Login di sini</a></span></p>
				</div>				
			</div>	
		</div>
	</div>
</section>