<!-- start slider section --> 
<section id="login">
	<div class="container ">
  	<div class="row d-flex justify-content-center" >
			<div class="col-sm-8 col-lg-5"> 				
				<div class="text-center masuk-akun margin-120px-top margin-30px-bottom ">
				  <a href="#"><img src="<?php echo base_url('assets/images/login/Masuk-ke-Akun.png');?>"></a>
				</div>
				<div class="text-center btn-social">
					<a href="<?php echo $facebook_login_url; ?>">
						<img class="img-fluid" src="<?=base_url('assets/images/login/FB.png');?> " width="214.5" height="33" alt="submit" />
					</a>
					<a href="<?php echo $google_login_url; ?>">
						<img class="img-fluid" src="<?=base_url('assets/images/login/GG.png');?> " width="214.5" height="33" alt="submit" />
					</a>
				</div>
				<div class="text-center margin-10px-top">
				
						<img class="img-fluid" src="<?=base_url('assets/images/login/ATAU-MERGE.png');?>" width="435" height="10"/>
					
				</div>

				<?= $this->session->flashdata('message'); ?>
				<form method="post" class="needs-validation margin-10px-top" action="<?= base_url('login'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
					<div class="form-group">
						<input name="user_email" type="email" class="form-control" id="user_email" placeholder="Masukan Email" autocomplete="off">
						<?php echo '<div class="invalid-feedback">'.strip_tags(form_error('user_email')).'</div>'; ?>
					</div>
					<div class="form-group">		
						<input name="user_pass" class="form-control" type="password" id="user_pass" placeholder="Masukan Password" autocomplete="off">
						<?php echo '<div class="invalid-feedback">'.strip_tags(form_error('user_pass')).'</div>'; ?>
					</div>
					<div class="text-center margin-20px-top">
						<button type="submit" style="border: 0; background: transparent;">
							<img class="img-fluid" src="<?=base_url('assets/images/login/Login.png');?>"  width="65" height="30" alt="submit" />
						</button>
					</div>
					<div class="text-center margin-20px-top margin-30px-bottom">
						<span class="forgot">Belum punya akun? <a href="<?= base_url('registration'); ?>">Daftar di sini</a>
						<p><a href="<?= base_url('auth/forgotPassword') ?>">Lupa Password?</a></span></p>
					</div>
					<br>
					<br>
				</form>	
			</div>	
		</div>
	</div>
</section>