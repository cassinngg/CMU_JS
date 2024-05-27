<div style="margin: 40px 20px 20px 400px;">
<!-- <h3 style=" font-size: 40px; 
    font-family: Poppins; color: #002F11; "><?php echo $title ?></h3> -->
 <div style="text-align: right; margin: 10px 100px;">
    <button id="add-author" class="btn btn-info">Add Author</button>
</div>

<table class="table table-striped table-hover ">
  <thead>
    <tr>

      <th>Author Name</th>
      <th>Email</th>
      <th>Contact Number</th>
    </tr>
  </thead>
  <tbody>

  <!-- start of the loop -->
  <?php foreach ($authors as $author) : ?>
    <tr>
      <td><?php echo $author['author_name']; ?></td>
      <td><?php echo $author['email']; ?> </td>
      <td><?php echo $author['contact_num']; ?></td>
      <td>
            <div style="display: flex; align-items: center;">
            <a style="margin-right: 10px;" onclick="openViewModal(<?php echo $author['auid']; ?>)" href="#" class="btn btn-success" data-url="<?php echo base_url();?>authors/author/<?php echo $author['auid'];?>">
                    View
                </a>
                <!-- <a style="margin-right: 10px;" onclick="openEditAuthorModal(<?php echo $author['auid']; ?>)"  class="btn btn-info" href="#" class="edit-author" data-url="<?php echo base_url();?>authors/author/<?php echo $author['auid'];?>">Edit
                </a> -->

                <!-- a href="<?php echo base_url(); ?>admin/edit_author/<?php echo $author['auid'];?>" class="btn btn-info">
								</a>< -->

                                <a style="margin-right: 10px;" onclick="openEditAuthorModal(<?php echo $author['auid']; ?>)"  class="btn btn-info" href="#" class="edit-user" data-url="<?php echo base_url();?>authors/author/<?php echo $author['auid'];?>">Edit
                </a>
                
                <!-- <form action="<?php echo base_url('Admin/delete_author/'.$author['auid']); ?>" method="post"> -->






                <?php echo form_open('/admin/delete_auth/'. $author['auid']); ?><input type="submit" value="Delete" class="btn btn-danger">
                <!-- <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;" >
                    <img style="height: 18px;" src="assets/images/icons/delete.png" alt="Delete">
                </button> -->
            </form>
            </div>
        </td>
    </tr>
    <div id="update_modal" class="update-pop author-<?php echo $author['auid']; ?> container mt-5">
    <div class="close-btn" onclick="closeEditAuthorModal(<?php echo $author['auid']; ?>)">&times;</div>
    <h1 class="text-center">Edit Author</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <form action="<?php echo base_url(); ?>admin/update_author/<?php echo $author['auid']; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="auid" value="<?php echo $author['auid']; ?>">
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="edit_pic_<?php echo $author['auid']; ?>" name="edit_pic" accept="image/*" style="display: none;">
                        <label for="edit_pic_<?php echo $author['auid']; ?>" class="profile-pic-label">
                        <img id="profile_preview" src="<?php echo!empty($author['auid'])? 'data:image/jpeg;base64,'. $author['profile_pic'] : '../assets/img/person.png';?>" alt="Profile Picture" class="profile-picture rounded-circle">
                        </label>
                        
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Complete Name" value="<?php echo $author['author_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $author['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="contact_num" class="form-control" id="contact_num" name="contact_num" value="<?php echo $author['contact_num']; ?>"placeholder="Contact Number" required>
                </div>
                <div class="mb-3">
                    <input type="title" class="form-control" id="title" name="title" value="<?php echo $author['title']; ?>"placeholder="Title" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div  class="profile-pop show_profile-<?php echo $author['auid']; ?> container">
    <div class="close-btn"  onclick="hide_profile(<?php echo $author['auid']; ?>)">&times;</div>
    <h3>Profile </h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="mb-3 for-pic">
        <img id="profile_preview" src="<?php echo!empty($author['profile_pic'])? 'data:image/jpeg;base64,'. $author['profile_pic'] : '../assets/img/person.png';?>" alt="Profile Picture" class="profile-picture rounded-circle">
           
        </div>

            <div>
                Name: <?php echo strtoupper($author['author_name']); ?><br>
                Email: <?php echo $author['email']; ?><br>
                Title: <?php echo $author['title'];
                ?>
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
    <h1 class="text-center">Add New Author</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?php echo form_open_multipart('Admin/add_author'); ?>
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="profile_pic" name="profile_pic" accept="image/*" style="display: none;">
                        <label for="profile_pic" class="profile-pic-label">
                            <img id="profile_pic_preview" src="assets/img/person.png" alt="Profile Picture" class="profile-pic img-fluid rounded-circle">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Author Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="contact_num" class="form-control" id="contact_num" name="contact_num" placeholder="Contact Number" required>
                </div>
                <div class="mb-3">
                    <input type="title" class="form-control" id="title" name="title" placeholder="Title" required>
                </div>
               
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



