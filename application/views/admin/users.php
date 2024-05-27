<div style="margin: 40px 20px 20px 400px;">
<h3 style=" font-size: 40px; 
    font-family: Poppins; color: #002F11; "><?php echo $title ?></h3>
 <div style="text-align: right; margin: 10px 100px;">
    <button id="add-user" class="btn btn-info">Add User</button>
</div>

</div>
<div class="d-flex" id="wrapper">


<table class="table table-hover" style="margin: 5px 20px 20px 400px;">
    <thead>
    <tr>
        <th scope="col">Complete Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['complete_name']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php if($user['role'] == 1){ echo 'Admin';
                }elseif ($user['role'] == 2){ echo 'Author';}else{
                    echo 'Viewer';
                }?></td>
        <td><?php if ($user['status'] == 0){
            echo 'Active';
            }else{
                echo 'Inactive';
            }
            
            ?>
        </td>
        <td>
            <div style="display: flex; align-items: center;">
                <a style="margin-right: 10px;" onclick="openViewModal(<?php echo $user['userid']; ?>)" href="#" class="btn btn-success" data-url="<?php echo base_url();?>users/user/<?php echo $user['userid'];?>">View</a>
                <a style="margin-right: 10px;" onclick="openEditUserModal(<?php echo $user['userid']; ?>)"  class="btn btn-info" href="#" class="edit-user" data-url="<?php echo base_url();?>users/user/<?php echo $user['userid'];?>">Edit</a>
                <a style="margin-right: 10px;" href="<?php echo base_url('/admin/delete/'. $user['userid']); ?>"  class="btn btn-danger edit-user" data-url="">Delete</a>
            </div>
        </td>

    </tr>
    <div id="update_modal" class="update-pop user-<?php echo $user['userid']; ?> container mt-5">
    <div class="close-btn" onclick="closeEditUserModal(<?php echo $user['userid']; ?>)">&times;</div>
    <h1 class="text-center">Edit User</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <form action="<?php echo base_url(); ?>users/update_user/<?php echo $user['userid']; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo $user['userid']; ?>">
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="edit_pic_<?php echo $user['userid']; ?>" name="edit_pic" accept="image/*" style="display: none;">
                        <label for="edit_pic_<?php echo $user['userid']; ?>" class="profile-pic-label">
                        <img id="profile_preview" src="<?php echo!empty($user['userid'])? 'data:image/jpeg;base64,'. $user['profile_pic'] : '../assets/img/person.png';?>" alt="Profile Picture" class="profile-picture rounded-circle">
                        </label>
                        
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="complete_name" name="complete_name" placeholder="Complete Name" value="<?php echo $user['complete_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" id="role" name="role" required>
                        <option value="admin" <?php echo ($user['role'] == '1') ? 'selected' : ''; ?>>Admin</option>
                        <option value="author" <?php echo ($user['role'] == '2') ? 'selected' : ''; ?>>Author</option>
                        <option value="viewer" <?php echo ($user['role'] == '3') ? 'selected' : ''; ?>>Viewer</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div  class="profile-pop show_profile-<?php echo $user['userid']; ?> container">
    <div class="close-btn"  onclick="hide_profile(<?php echo $user['userid']; ?>)">&times;</div>
    <h3>Profile </h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="mb-3 for-pic">
        <img id="profile_preview" src="<?php echo!empty($user['profile_pic'])? 'data:image/jpeg;base64,'. $user['profile_pic'] : '../assets/img/person.png';?>" alt="Profile Picture" class="profile-picture rounded-circle">

        </div>

            <div>
                Name: <?php echo strtoupper($user['complete_name']); ?><br>
                Email: <?php echo $user['email']; ?><br>
                Role: <?php if($user['role'] == 1){ echo 'Admin';
                }elseif ($user['role'] == 2){ echo 'Author';}else{
                    echo 'Viewer';
                }?>
            </div>

        </div>
    </div>

</div>
    <?php endforeach; ?>
    </tbody>
</table>

</div>
<div class="add-pop container mt-5">
    <div class="close-btn">&times;</div>
    <h1 class="text-center">Add New User</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?php echo form_open_multipart('Users/add_user'); ?>
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="profile_pic" name="profile_pic" accept="image/*" style="display: none;">
                        <label for="profile_pic" class="profile-pic-label">
                            <img id="profile_pic_preview" src="assets/img/person.png" alt="Profile Picture" class="profile-pic img-fluid rounded-circle">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="complete_name" name="complete_name" placeholder="Complete Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" id="role" name="role" required>
                        <option value="" disabled selected hidden>Choose a role</option>
                        <option value="admin">Admin</option>
                        <option value="author">Author</option>
                        <option value="viewer">Viewer</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



