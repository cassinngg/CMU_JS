<?php
$data['title'] = 'New Article';
		
?>

<div class="main-content-container">
    <div class="p-5">
        <p class="text-xl font-bold">Edit Article</p>
        <p class="text-sm">Update the following details of the article</p>
    </div>
    <hr/>
    <div class="p-5">
        <form action="<?php echo base_url(); ?>admin/article/update/<?php echo $article['articleid']; ?>" method="POST" enctype="multipart/form-data">
            <div class="my-4">
                <p class="font-medium mb-2">Title</p>
                <input name="title" class="w-full h-[45px]" type="text" style="width: -webkit-fill-available;"  placeholder="Enter Article Title" value="<?php echo set_value('title', $article['title']); ?>"/>
                <?php echo form_error('title', '<div class="error">', '</div>'); ?> <!-- Display title validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Keywords</p>
                <input name="keywords" class="w-full h-[45px]" type="text" style="width: -webkit-fill-available;"  placeholder="Provide related keywords" value="<?php echo set_value('keywords', $article['keywords']); ?>"/>
                <?php echo form_error('keywords', '<div class="error">', '</div>'); ?> <!-- Display keywords validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Abstract</p>
                <textarea id="editor1"style="width: -webkit-fill-available;"  name="abstract" class="w-full h-[45px]" type="text" placeholder="Provide an abstract"><?php echo set_value('abstract', $article['abstract']); ?></textarea>
                <?php echo form_error('abstract', '<div class="error">', '</div>'); ?> <!-- Display abstract validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">DOI</p>
                <input name="doi" style="width: -webkit-fill-available;"  class="w-full h-[45px]" type="text" placeholder="Enter the DOI of the article" value="<?php echo set_value('doi', $article['doi']); ?>"/>
                <?php echo form_error('doi', '<div class="error">', '</div>'); ?> <!-- Display doi validation error -->
            </div>
						<div class="my-4">
								<p class="font-medium mb-2">Volume</p>
								<select name="vol_id" class="select w-full h-[45px]" style="width: -webkit-fill-available;" >
										<?php foreach ($volume as $volume): ?>
												<option value="<?php echo $volume['vol_id']; ?>" <?php echo ($article['vol_id'] == $volume['vol_id']) ? 'selected' : ''; ?>>
														<?php echo $volume['volume_name']; ?>
												</option>
										<?php endforeach; ?>
								</select>
								<?php echo form_error('vol_id', '<div class="error">', '</div>'); ?> <!-- Display volume_id validation error -->
						</div>
                        <div class="my-4">
								<p class="font-medium mb-2">File</p>
								<input name="filename" accept=".pdf" class="w-full h-[45px]" type="file" placeholder="Select File"/>
								<?php echo form_error('filename', '<div class="error">', '</div>'); ?> <!-- Display filename validation error -->
						</div>

                        <div class="my-4">
                <p class="font-medium mb-2">Author</p>
                <select name="auid" style="width: -webkit-fill-available;" class="select w-full h-[45px]">
                    <?php foreach ($authors as $author): ?>
                        <option value="<?php echo $author['auid']; ?>"><?php echo $author['author_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('auid', '<div class="error">', '</div>'); ?>   
            </div> 

            <div class="my-4">
                <p class="font-medium mb-2">Date Published</p>
                <input name="date-published" class="w-full h-[45px]" type="datetime-local" value="<?php echo set_value('date-published', $article['date-published']); ?>"/>
                <?php echo form_error('date-published', '<div class="error">', '</div>'); ?> <!-- Display date-published validation error -->
            </div>
            <!-- <div class="my-4 flex items-center gap-2">
                <input name="published" class="w-[25px] h-[25px]" type="checkbox" <?php echo set_checkbox('published', '1', $article['published'] == 1); ?> />
                <label class="font-medium">Published</label>
                <?php echo form_error('published', '<div class="error">', '</div>'); ?> <!-- Display published validation error -->
            </div> 
            <div class="flex ml-5 mb-5">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>
</div>
