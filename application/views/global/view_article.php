<?php $this->load->view('./components/global/navbar.php'); ?>
<div class="landing-main w-3/4 mx-auto">
<div class="p-6">
		<div class="mt-4 flex items-center justify-between">
			<div>
				<p class="text-xl font-black"><?php echo $article['title']; ?></p>
				<p class="text-sm text-[#5F6061]">View Article Details</p>
			</div>
			<a href="<?php echo base_url('admin/article/download/' . $article['filename']); ?>" class="btn-filled w-[175px] h-[49px]"><i class="ph ph-download mr-2"></i> Download PDF</a>
		</div>
	</div>
	<hr/>
	<div class="p-6">
		<div class="mb-5">
			<p class="text-xl font-bold">Abstract</p>
			<p class="text-justify my-2" style="text-indent: 24px;"><?php echo $article['abstract']; ?></p>
			<p class=""><span class="font-medium">Keywords: </span><?php echo $article['keywords']; ?></p>
		</div>
		<div class="my-2 grid grid-cols-1 lg:grid-cols-2">
			<div>
				<p class="text-[#4F545A]">DOI</p>
				<p ><?php echo $article['doi'];?></p>
			</div>
			<div>
				<p class="text-[#4F545A]">Volume</p>
				<p ><?php echo $volume['vol_name'];?></p>
			</div>
		</div>
		<div class="my-2 grid grid-cols-1 lg:grid-cols-2">
			<div>
				<p class="text-[#4F545A]">Status</p>
				<p ><?php echo ($article['published'] == 1) ? "Published" : "Unpublished"; ?></p>
			</div>
		</div>
		<div class="mb-5">
			<p class="text-[#4F545A]">Authors</p>
			<?php if (!empty($article['authors'])): ?>
				<?php foreach ($article['authors'] as $author): ?>
				<div class="flex items-center space-x-2 my-4">
						<?php if (isset($author['author_image'])): ?>
								<img class="avatar" src="<?php echo base_url(); ?>public/profile-images/<?php echo $author['author_image']; ?>" alt="<?php echo $author['author_name'];?>" />
						<?php else: ?>
								<img class="avatar" src="https://hwchamber.co.uk/wp-content/uploads/2022/04/avatar-placeholder.gif" alt="<?php echo $author['author_name'];?>" />
						<?php endif; ?>
						<div>
								<p class="font-medium leading-4">
										<?php echo $author['author_name'];?>
								</p>
								<p class="text-sm text-[#5F6061]">
										<?php echo mdate('%F %d, %Y', strtotime($article['date_published'])); ?>
								</p>
						</div>
				</div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>No Assigned Authors</p>
			<?php endif; ?>
		</div>
	</div>
</div>
