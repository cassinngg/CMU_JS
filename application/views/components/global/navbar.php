<section class="landing-navbar mx-5 fixed w-[97vw]">
	<div class="nav-column ">
	<a href="<?php echo base_url(); ?>" class="text-logo"><i class="ph ph-files ph-fill text-[28px]"></i>Journal of Science</a>
	</div>
    <div  
			x-data="{
				isActive(url) {
					return window.location.href === url;
				}
			}" 
			class="nav-column flex justify-around items-center"
		>
        <a href="<?php echo base_url(); ?>" :class="{ 'active-landing-nav-item': isActive('<?php echo base_url(); ?>') }" class="landing-nav-item">Home</a>
        <a href="<?php echo base_url(); ?>articles" :class="{ 'active-landing-nav-item': isActive('<?php echo base_url(); ?>articles') }" class="landing-nav-item">Articles</a>
        <a href="<?php echo base_url(); ?>archives" :class="{ 'active-landing-nav-item': isActive('<?php echo base_url(); ?>archives') }" class="landing-nav-item">Archives</a>
    </div>

	<div class="nav-column flex justify-end items-center">
		<a href="<?php echo base_url(); ?>auth/login" class="btn-round-outlined h-[44px] w-[144px] mr-2">Login</a>
		<a href="<?php echo base_url(); ?>auth/register" class="btn-round-filled h-[44px] w-[144px]">Register</a>
	</div>
</section>
