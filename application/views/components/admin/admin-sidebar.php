<?php
// Define an array of navigation items
$navItems = [
	// [
	// 	'name' => 'Dashboard',
	// 	'link' => 'admin/dashboard',
	// 	'icon' => 'ph-house',
	// ],
	[
		'name' => 'Manage Users',
		'link' => 'admin/users',
		'icon' => 'ph-users-three',
	],
	[
		'name' => 'Manage Articles',
		'link' => 'admin/articles',
		'icon' => 'ph-file-text',
	],
	// [
	// 	'name' => 'Manage Submissions',
	// 	'link' => 'admin/submissions',
	// 	'icon' => 'ph-pencil-simple-line',
	// ],
	[
		'name' => 'Manage Authors',
		'link' => 'admin/authors',
		'icon' => 'ph-users-four',
	],
	[
		'name' => 'Manage Volumes',
		'link' => 'admin/volumes',
		'icon' => 'ph-books',
	],
	// [
	// 	'name' => 'Settings',
	// 	'link' => 'admin/settings',
	// 	'icon' => 'ph-gear',
	// ],
	[
		'name' => 'Logout',
		'link' => 'logout',
		'icon' => 'ph-sign-out',
	],
];

?>

<div class="sidebar">
    <div class="flex justify-center my-4">
        <a href="<?php echo base_url(); ?>" class="text-logo"><i class="ph ph-files ph-fill text-[28px]"></i>Journal of Science</a>
    </div>
    <hr/>
    <div 
        x-data="{
            isActive(url) {
                return window.location.href === url;
            }
        }" 
        class="flex flex-col p-5">
        
        <?php foreach ($navItems as $item): ?>
            <a 
                :class="{ 'nav-item-active': isActive('<?php echo base_url(); ?><?= $item['link']; ?>') }"
                href="<?php echo base_url(); ?><?= $item['link']; ?>" 
                class="nav-item mb-4"
            >
                <p
                    :class="{ 'nav-text-active': isActive('<?php echo base_url(); ?><?= $item['link']; ?>') }" 
                    class="nav-text"
                >
                    <i 
											:class="{ 'nav-icon-active': isActive('<?php echo base_url(); ?><?= $item['link']; ?>') }"
											class="ph <?= $item['icon']; ?> nav-icon ph-fill text-[20px] mr-1">
										</i>
                    <?= $item['name']; ?>
                </p>
            </a>
        <?php endforeach; ?>

    </div>
</div>
