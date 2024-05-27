<?php
	$data['title'] = 'Article Details';
?>

<div class="main-content-container">
	<div class="p-6">
		<a href="<?php echo base_url();?>admin/articles/" class="text-sm text-[#5E5E5E] inline-flex items-center gap-2 btn btn-info">
			<i class="ph ph-arrow-left "></i>
			
			<span>Go to article lists</span>
		</a>
		<a href="<?php echo base_url();?>admin/volumes/" class="text-sm text-[#5E5E5E] inline-flex items-center gap-2 btn btn-info">
			<i class="ph ph-arrow-left "></i>
			
			<span>Go to Volumes</span>
		</a>
		<h1></h1>
		<div class="card bg-light mb-3" style="max-width: 50rem; mt-200">
			<div class="flex flex-col items-start">
				<h3 class="card-header font-bold"><?php echo $article['title'];?></h3>
			</div>
		
	<div class="card-body">
		<div class="card-title">

			<h5>Abstract: <?php echo $article['abstract'];?></h5>
			<h5>Keywords: <?php echo $article['keywords'];?><<h5>
			<h5>DOI: <?php echo $article['doi'];?><h5>
			<h5>Volume: <?php echo $volume['volume_name'];?><h5>
			<h5Authors:</h5>
<ul>
    <?php foreach ($article['authors'] as $author): ?>
        <li><?php echo $author['author_name']; ?></li>
    <?php endforeach; ?>
</ul>
<div class="mt-4 flex items-center justify-between">
			<div>
				<p class="text-xl font-black"><?php echo $article['title']; ?></p>
				<p class="text-sm text-[#5F6061]">View Article Details</p>
			</div>
			<a href="<?php echo base_url('admin/article/download/' . $article['filename']); ?>" class="btn-filled w-[175px] h-[49px]"><i class="ph ph-download mr-2"></i> Download PDF</a>
		</div>
			</div>
		
		
</div>
	</div>
	<hr/>

	</div>
</div>


