<div style="margin: 40px 20px 20px 400px;">
    <h3 style=" font-size: 40px; 
    font-family: Poppins; color: #002F11; "><?php echo $title ?></h3>
    <div style="text-align: right; margin: 10px 100px;">
        <a href="<?php echo base_url(); ?>admin/article/new" class="btn btn-info"><i class="ph ph-plus mr-2"></i> New Article</a>
    </div>
    <!-- <div class="mb-3">
    <form method="GET" action="<?php echo base_url('admin/authors'); ?>">
            <input type="text" name="search" id="search" class="bg-gray-100 py-3 px-3 rounded w-96" placeholder="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit" class="bg-green-900 text-white py-3 px-3 rounded">Search</button>
        </form>    </div> -->
</div>
<div class="ml-5 mr-5">

    <h3><?php echo $title ?></h3>
    <table class="table table-hover" style="margin: 5px 20px 20px 400px; width:75%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Keywords</th>
                <!-- <th>Abstract</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <!-- start of the loop -->
            <?php foreach ($articles as $article) : ?>
                <tr>
                    <td><?php echo $article['title']; ?></td>
                    <td><?php echo $article['keywords']; ?> </td>
                    <!-- <td><?php echo $article['abstract']; ?></td> -->

                  




                    <td class="flex">
                        <div class="flex flex-col">
                           
                            <a style="margin-right: 10px;" href="<?php echo base_url(); ?>admin/article/<?php echo $article['articleid'];?>" class="btn btn-success" >
                                View
                            </a>

                            

                            <a href="<?php echo base_url(); ?>admin/article/edit/<?php echo $article['articleid']; ?>" class="btn btn-info mt-2 mb-2"><i class="ph ph-plus mr-2"></i> Edit</a>
                       


                        <a href="<?php echo base_url(); ?>admin/article/delete/<?php echo $article['articleid'];?>" class="btn btn-danger">
								Delete</a>
                                </div>
                    </td>
                

                </tr>
            


            <?php endforeach; 
            ?>
            
        </tbody>
        <div class="add-pop container mt-5">
    <div class="close-btn">&times;</div>
    <h1 class="text-center">Add New Article</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?php echo form_open_multipart('Admin/add_article'); ?>
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="profile_pic" name="profile_pic" accept="image/*" style="display: none;">
                        <label for="profile_pic" class="profile-pic-label">
                            <img id="profile_pic_preview" src="assets/img/article.png" alt="Profile Picture" class="profile-pic img-fluid rounded-circle">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                </div>
                <div class="mb-3">
                    <input type="keywords" class="form-control" id="keywords" name="keywords" placeholder="Keyword" required>
                </div>
                <div class="mb-3">
                    <!-- <input type="abstract" class="form-control" id="abstract" name="abstract" placeholder="Abstract" required> -->
                    <label>Abstract</label>
                    <textarea id="abstract" class="form-control" name="abstract" placeholder="Abstract"></textarea>
                </div>
                <!-- <div class="mb-3">
                    <select class="form-select" id="published" name="published" required>
                        <option value="" disabled selected hidden>Publish option</option>
                        <option value="published">Publish</option>
                        <option value="unpublished">Unpublish</option>
                      
                    </select>
                    
                </div> -->
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

    </table>

</div>
