<?php
$data['title'] = 'Edit Author';

?>

<div class="main-content-container">
    <div class="p-5">
        <p class="text-xl font-bold">Edit Author</p>
        <p class="text-sm">Update the following details of the author</p>
    </div>
    <hr/>
    <div class="p-5">
        <form action="<?php echo base_url(); ?>admin/author/update/<?php echo $author['auid']; ?>" method="POST" enctype="multipart/form-data">
            <div class="my-4">
                <p class="font-medium mb-2">Author Name</p>
                <input name="author_name" class="w-full h-[45px]" type="text" placeholder="Enter Author Name" value="<?php echo set_value('author_name', $author['author_name']); ?>"/>
                <?php echo form_error('author_name', '<div class="error">', '</div>'); ?> <!-- Display title validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Author Title</p>
                <input name="title" class="w-full h-[45px]" type="text" placeholder="E.g. Mr, Mrs, Dr" value="<?php echo set_value('title', $author['title']); ?>"/>
                <?php echo form_error('title', '<div class="error">', '</div>'); ?> <!-- Display keywords validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Email</p>
                <input name="email" class="w-full h-[45px]" type="text" placeholder="Enter email" value="<?php echo set_value('email', $author['email']); ?>"/>
                <?php echo form_error('email', '<div class="error">', '</div>'); ?> <!-- Display abstract validation error -->
            </div>
            <div class="my-4">
                <p class="font-medium mb-2">Contact</p>
                <input name="contact_num" class="w-full h-[45px]" type="text" placeholder="Enter contact number" value="<?php echo set_value('contact_num', $author['contact_num']); ?>"/>
                <?php echo form_error('contact_num', '<div class="error">', '</div>'); ?> <!-- Display doi validation error -->
            </div>
						
            <div class="flex justify-end">
                <button type="submit" class="btn-filled w-[159px] h-[44px]">Submit</button>
            </div>
        </form>
    </div>
</div>
