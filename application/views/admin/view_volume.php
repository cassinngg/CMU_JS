<?php
	$data['title'] = 'Volume Details';
?>

<div class="main-content-container">
	<div class="p-5 mr-200">
	<div style="text-align: right; margin: 10px 100px;">

		<a href="<?php echo base_url(); ?>admin/volumes/" class="text-sm   btn btn-info mb-20"> 
			<i class="ph ph-arrow-left"></i>
			Back to Volumes
		</a>
        <a href="<?php echo base_url(); ?>admin/article/new" class="btn btn-info"><i class="ph ph-plus mr-2"></i> Add New Article</a>
    </div>
		
		<h3></h3>
		<div class="card bg-light mb-3 mt-20" style="max-width: 70rem;">

		<div class="mt-50 card-header ">
			<h3 class="text-xl font-bold"><?php echo $volume['volume_name']; ?></h3>
			<div>
			<h5 class="text-sm  card-body"><?php echo $volume['description']; ?></h5>
		</div>
	</div>
	<hr/>
		</div>


	<h3>Articles</h3>
	<div class="p-5">
    <?php if (empty($volume['articles'])): ?>
        <p class="mt-5 text-center">No articles found</p>
	
    <?php else: ?>
        <?php foreach ($volume['articles'] as $article): ?>
						<div class="flex items-center justify-between card bg-light mb-3" style="max-width: 50rem;">
						<div class="leading-[18px] card-header" >
									<h4 class="text-medium"><?php echo $article['title'];?></h4>
									
								</div>
							<div class="flex items-center justify-start card-body">
								<img class="h-[40px] w-[40px]" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRywif2d8vrcx80-X-o-u8xeiaLgZOAZQlI7hsnCuITQA&s"/>
								<h5 class="font-light text-sm"><?php echo $article['doi']; ?></h5>
							
							<a href="<?php echo base_url(); ?>admin/article/<?php echo $article['articleid'];?>">
								View Details
							</a>
							</div>
						<hr/>
					</div>
        <?php endforeach; ?>
    <?php endif; ?>
	</div>
	</div>

	</div>