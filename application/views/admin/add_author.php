<!-- views/admin/add_author.php -->
<div class="ml-5 mr-5">
    <h3>Add Author</h3>
    <?php echo form_open('user/add_author'); ?>
        <div class="form-group">
            <label for="author_name">Name</label>
            <input type="text" class="form-control" id="author_name" name="author_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="contact_num">Password</label>
            <input type="contact_num" class="form-control" id="contact_num" name="contact_num" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    <?php echo form_close(); ?>
</div>
