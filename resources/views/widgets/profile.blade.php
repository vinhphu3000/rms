<div class="profile">
	<div class="profile_pic">
		<img src="{{ asset(Config::get('constants.PATH_AVATAR') . empty(\App\Authentication\Service::getAuthInfo()->avatar) ? Config::get('constants.PATH_AVATAR') . Config::get('constants.DEFAULT_AVATAR') : \App\Authentication\Service::getAuthInfo()->avatar) }}" alt="..." class="img-circle profile_img">
	</div>
	<div class="profile_info">
		<span>Welcome,</span>
		<h2><?php echo \App\Authentication\Service::getAuthInfo()->name?></h2>
	</div>
</div>