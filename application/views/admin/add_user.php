<!-- views/admin/add_user.php -->
<div class="ml-5 mr-5">
    <h3>Add User</h3>
    <?php echo form_open('admin/add_user'); ?>
        <div class="form-group">
            <label for="complete_name">Name</label>
            <input type="text" class="form-control" id="complete_name" name="complete_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="pword">Password</label>
            <input type="password" class="form-control" id="pword" name="pword" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    <?php echo form_close(); ?>
</div>
