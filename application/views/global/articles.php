<?php $this->load->view('./components/global/navbar.php'); ?>
<div class="landing-main w-3/4 mx-auto">
	<p class="my-5 text-center text-[28px] font-bold">Browse Latest Articles</p>
	<?php foreach ($volumes as $volume): ?>
		<?php if ($volume['archived'] ==  0 && $volume['published'] == 1) {?>
			<div class="mt-10">
				<p class="text-2xl font-semibold ">
					<?php echo $volume['vol_name']; ?>
				</p>
				<p class="text-gray-600 ">
					<?php echo $volume['vol_description']; ?>
				</p>
			</div>
			<?php if (empty($volume['articles'])): ?>
        <p class="my-5 text-center">No articles found</p>
    	<?php else: ?>
				<?php foreach ($volume['articles'] as $article): ?>
				<?php if ($article['published'] == 1) {?>
				<article class="p-6 bg-white rounded-2xl border border-gray-200 shadow-md my-5">
					<p class="my-2 text-[20px] font-extrabold tracking-tight text-gray-900 "><a href="#"><?php echo $article['title'];?></a></p>
					<p class="my-1 font-light text-[#5F6061] ">
						<?php echo word_limiter($article['abstract'], 50, '...'); ?>
					</p>
					<p class="my-3 font-light"><span class="font-medium">Keywords: </span> <?php echo $article['keywords']; ?></p>
					<div class="flex justify-between items-center">
					<?php if (!empty($article['authors'])): ?>
						<div class="flex items-center space-x-2">
								<?php if (!empty($article['authors']) && isset($article['authors'][0]['author_image'])): ?>
										<img class="avatar" src="<?php echo base_url(); ?>public/profile-images/<?php echo $article['authors'][0]['author_image']; ?>" alt="<?php echo $article['authors'][0]['author_name'];?>" />
								<?php else: ?>
										<img class="avatar" src="https://hwchamber.co.uk/wp-content/uploads/2022/04/avatar-placeholder.gif" alt="<?php echo $article['authors'][0]['author_name'];?>" />
								<?php endif; ?>
								<div>
										<p class="font-medium leading-4">
												<?php echo $article['authors'][0]['author_name'];?>
										</p>
										<p class="text-sm text-[#5F6061]">
												<?php echo mdate('%F %d, %Y', strtotime($article['date_published'])); ?>
										</p>
								</div>
						</div>
						<?php else: ?>
							<div class="flex items-center space-x-2">
								<img class="avatar" src="https://hwchamber.co.uk/wp-content/uploads/2022/04/avatar-placeholder.gif" alt="No Author" />
								<div>
										<p class="font-medium leading-4">
												No Author Assigned
										</p>
										<p class="text-sm text-[#5F6061]">
												<?php echo mdate('%F %d, %Y', strtotime($article['date_published'])); ?>
										</p>
								</div>
						</div>
						<?php endif; ?>
					<a href="<?php echo base_url(); ?>article/<?php echo $article['article_id'] ?>" class="read-more-btn text-sm font-medium h-[35px] w-[125px]">
							Read more
					</a>
				</div>

				</article>
				<?php } ?>
			<?php endforeach; ?>
				<?php endif; ?>
		<?php } ?>


	<?php endforeach; ?>
	
</div>

