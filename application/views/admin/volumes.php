<div class="ml-5 mr-5" >
<div style="margin: 40px 20px 20px 400px;">
<h3 style=" font-size: 40px; 
    font-family: Poppins; color: #002F11; "><?php echo $title ?></h3>
 <div style="text-align: right; margin: 10px 100px;">
    <button id="add-user" class="btn btn-info">Add Volume</button>
</div>

<table class="table flex flex-col">
  <thead>
    <tr>

      <th>Volume Name</th>
      <th>Description</th>
      <th>Published</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

  <!-- start of the loop -->
  <?php foreach($volume as $volume) : ?>
    <tr>
      <td><?php echo $volume['volume_name']; ?></td>
      <td><?php echo $volume['description']; ?> </td>
      <td><?php if ($volume['published'] == 1) {
                            echo 'Published';
                        } else{
                            echo 'Unpublished';
                        }
                        ?></td>
      <td>
            <div style="display: flex; align-items: center;" class="flex flex-col">
            <a style="margin-right: 10px;" onclick="openViewModal(<?php echo $volume['vol_id']; ?>)" href="#" class="btn btn-success" data-url="<?php echo base_url();?>volumes/volume/<?php echo $volume['vol_id'];?>">
                    View
                </a>
                <a style="margin-right: 10px;" onclick="openEditVolumeModal(<?php echo $volume['vol_id']; ?>)"  class="btn btn-info" href="#" class="edit-volume mr-2" data-url="<?php echo base_url();?>Admin/volume/<?php echo $volume['vol_id'];?>">Edit
                </a>
                <!-- <form action="<?php echo base_url('Admin/delete_volume/'.$volume['vol_id']); ?>" method="post"> -->
                <a href="<?php echo base_url('/admin/delete_volume/'. $volume['vol_id']); ?>" class="btn btn-danger">Delete</a>
                <!-- <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;" >
                    <img style="height: 18px;" src="assets/images/icons/delete.png" alt="Delete">
                </button> -->
            </form>
                
            </div>
        </td>
    </tr>
    <div id="update_modal" class="update-pop volume-<?php echo $volume['vol_id']; ?> container mt-5">
    <div class="close-btn" onclick="closeEditAuthorModal(<?php echo $volume['vol_id']; ?>)">&times;</div>
    <h1 class="text-center">Edit Volume</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <form action="<?php echo base_url(); ?>admin/volume/update/<?php echo $volume['vol_id']; ?>" method="POST"
enctype="multipart/form-data">
            <input type="hidden" name="vol_id" value="<?php echo $volume['vol_id']; ?>">
                <div class="mb-3">
                    <input type="text" class="form-control" id="volume_name" name="volume_name" placeholder="Volume Name" value="<?php echo $volume['volume_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="description" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $volume['description']; ?>" required>
                </div>
                <div class="my-4 flex items-center gap-2">
                <input name="published" class="w-[25px] h-[25px]" type="checkbox" <?php echo set_checkbox('published', '1', $volume['published'] == 1); ?> />
                <label class="font-medium">Published</label>
                <?php echo form_error('published', '<div class="error">', '</div>'); ?> <!-- Display published validation error -->
            </div>
                
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div  class="profile-pop show_profile-<?php echo $volume['vol_id']; ?> container">
    <div class="close-btn"  onclick="hide_profile(<?php echo $volume['vol_id']; ?>)">&times;</div>
    <h3>Profile </h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="mb-3 for-pic">
        <img id="profile_preview" src="<?php echo!empty($volume['profile_pic'])? 'data:image/jpeg;base64,'. $volume['profile_pic'] : '../assets/img/person.png';?>" alt="Profile Picture" class="profile-picture rounded-circle">
           
        </div>

            <div>
                Name: <?php echo strtoupper($volume['volume_name']); ?><br><br>
                Description: <?php echo $volume['description']; ?><br>
               
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
    <h1 class="text-center">Add New Volume</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?php echo form_open_multipart('Admin/add_volume'); ?>
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="profile_pic" name="profile_pic" accept="image/*" style="display: none;">
                        <label for="profile_pic" class="profile-pic-label">
                            <img id="profile_pic_preview" src="assets/img/person.png" alt="Profile Picture" class="profile-pic img-fluid rounded-circle">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="volume_name" name="volume_name" placeholder="Volume Name" required>
                </div>
                <div class="mb-3">
                    <input type="description" class="form-control" id="description" name="description" placeholder="Description" required>
                </div>
                <div class="my-4 flex items-center gap-2">
                <input name="published" class="w-[25px] h-[25px]" type="checkbox" <?php echo set_checkbox('published', '1'); ?> />
                <label class="font-medium">Published</label>
                <?php echo form_error('published', '<div class="error">', '</div>'); ?> <!-- Display published validation error -->
            </div>
						<!-- <div class="my-4 flex items-center gap-2">
                <input name="archived" class="w-[25px] h-[25px]" type="checkbox" <?php echo set_checkbox('archived', '1'); ?> />
                <label class="font-medium">Archived</label>
                <?php echo form_error('archived', '<div class="error">', '</div>'); ?> <!-- Display published validation error -->
            </div>
                 -->
                
               
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>





  <!-- end of the loop -->
  </div>
  </tbody>
</table>


