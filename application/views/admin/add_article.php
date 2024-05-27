<div style="margin: 40px 20px 20px 400px;">
<?php
$data['title'] = 'New Article';

$this->load->view('templates/sidebar');
						
?>



<div class="main-content-container">
    <div class="p-5">
        <p class="text-xl font-bold">New Article</p>
        <p class="text-sm">Fill up the following details to add a new article</p>
    </div>
    <hr/>
    <div class="p-5">
        <form action="<?php echo base_url(); ?>admin/article/add" method="POST" enctype="multipart/form-data">
            <div class="my-4">
                <p class="font-medium mb-2">Title</p>
                <input name="title" class="w-full h-[45px]" type="text" placeholder="Enter Article Title" value="<?php echo set_value('title'); ?>"/>
                <?php echo form_error('title', '<div class="error">', '</div>'); ?> <!-- Display title validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Keywords</p>
                <input name="keywords" class="w-full h-[45px]" type="text" placeholder="Provide related keywords" value="<?php echo set_value('keywords'); ?>"/>
                <?php echo form_error('keywords', '<div class="error">', '</div>'); ?> <!-- Display keywords validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Abstract</p>
				<textarea id="editor1" name="abstract" class="w-full" type="text" placeholder="Provide an abstract">
				<?php echo set_value('abstract'); ?>
				</textarea>
                <?php echo form_error('abstract', '<div class="error">', '</div>'); ?> <!-- Display abstract validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">DOI</p>
                <input name="doi" class="w-full h-[45px]" type="text" placeholder="Enter the DOI of the article" value="<?php echo set_value('doi'); ?>"/>
                <?php echo form_error('doi', '<div class="error">', '</div>'); ?> <!-- Display doi validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Volume</p>
                <select name="volume_id" class="select w-full h-[45px]">
                    <?php foreach ($volume as $volume): ?>
                        <option value="<?php echo $volume['vol_id']; ?>"><?php echo $volume['volume_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('volume_id', '<div class="error">', '</div>'); ?> <!-- Display volume_id validation error -->
            </div>
			<!-- <div class="my-4">
					<p class="font-medium mb-2">File</p>
					<input name="filename" class="w-full h-[45px]" type="file" accept=".pdf" placeholder="Select File"/>
					<?php echo form_error('filename', '<div class="error">', '</div>'); ?> 
					<?php if(isset($error)): ?>
						<div class="error">
							<?php echo $error; ?>
						</div>
					<?php endif; ?>
			</div> -->

            <div class="my-4">
                <p class="font-medium mb-2">Date Published</p>
                <input name="date-published" class="w-full h-[45px]" type="datetime-local" value="<?php echo set_value('date-published'); ?>"/>
                <?php echo form_error('date-published', '<div class="error">', '</div>'); ?> <!-- Display date-published validation error -->
            </div>
            <!-- <div class="my-4 flex items-center gap-2">
                <input name="published" class="w-[25px] h-[25px]" type="checkbox" <?php echo set_checkbox('published', '1'); ?> />
                <label class="font-medium">Published</label>
                <!-- <?php echo form_error('published', '<div class="error">', '</div>'); ?> Display published validation error -->
            </div>
            <div class="flex justify-end">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>
</div>
                    </div>