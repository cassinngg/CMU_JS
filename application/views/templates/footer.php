<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7RduPuemT//+jJXB16zg6i8UQD3lV5uDC3Yc7bz1Eeow" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-cL7l3FhTzu5uC3966xhW5W8f9vB4/fQN4/6G08+K0/U/+1F5XZ9Oa5SEJc/eG3" crossorigin="anonymous"></script>
<script>
  

//JAVASCRIPT
//PARA POP-UP sa ADD USER


document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#add-user").addEventListener("click", function(){
        document.querySelector(".add-pop").classList.add("active");
    });

    document.querySelector(".add-pop .close-btn").addEventListener("click", function(){
        document.querySelector(".add-pop").classList.remove("active");
    });
});


$(document).ready(function() {
    $('#profile_pic').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#profile_pic_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
});


//PARA EDIT SA INDIVIDUAL USER, gi modal ra gyapon nako:


function openEditUserModal(id){
    console.log(id)
    document.querySelector(`.user-${id}`).classList.add("active");

    // Add the file input change event handling logic here
    var input = document.getElementById(`edit_pic_${id}`);
    input.addEventListener('change', function() {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(`profile_preview_${id}`).setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            // If no file is selected, show the default profile picture
            document.getElementById(`profile_preview_${id}`).setAttribute('src', 'assets/img/person.png');
        }
    });
}



function closeEditUserModal(id){
    document.querySelector(`.user-${id}`).classList.remove("active");
}



//PAG VIEW INDIVIDUALLY:


function openViewModal(id){
    document.querySelector(`.show_profile-${id}`).classList.add("active");
}

function hide_profile(id){
    document.querySelector(`.show_profile-${id}`).classList.remove("active");
}

function openViewModal(id){
    document.querySelector(`.show_article-${id}`).classList.add("active");
}

function hide_profile(id){
    document.querySelector(`.show_article-${id}`).classList.remove("active");
}























document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#add-author").addEventListener("click", function(){
        document.querySelector(".add-pop").classList.add("active");
    });

    document.querySelector(".add-pop .close-btn").addEventListener("click", function(){
        document.querySelector(".add-pop").classList.remove("active");
    });
});


$(document).ready(function() {
    $('#profile_pic').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#profile_pic_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
});


//PARA EDIT SA INDIVIDUAL USER, gi modal ra gyapon nako:


function openEditAuthorModal(id){
    console.log(id)
    document.querySelector(`.author-${id}`).classList.add("active");

    // Add the file input change event handling logic here
    var input = document.getElementById(`edit_pic_${id}`);
    input.addEventListener('change', function() {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(`profile_preview_${id}`).setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            // If no file is selected, show the default profile picture
            document.getElementById(`profile_preview_${id}`).setAttribute('src', 'assets/img/person.png');
        }
    });
}



function closeEditAuthorModal(id){
    document.querySelector(`.author-${id}`).classList.remove("active");
}



//PAG VIEW INDIVIDUALLY:


function openViewModal(id){
    document.querySelector(`.show_profile-${id}`).classList.add("active");
}

function hide_profile(id){
    document.querySelector(`.show_profile-${id}`).classList.remove("active");
}








//articles


document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#add-article").addEventListener("click", function(){
        document.querySelector(".add-pop").classList.add("active");
    });

    document.querySelector(".add-pop .close-btn").addEventListener("click", function(){
        document.querySelector(".add-pop").classList.remove("active");
    });
});


$(document).ready(function() {
    $('#profile_pic').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#profile_pic_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
});


//PARA EDIT SA INDIVIDUAL USER, gi modal ra gyapon nako:


function openEditArticleModal(id){
    console.log(id)
    document.querySelector(`.article-${id}`).classList.add("active");

    // Add the file input change event handling logic here
    var input = document.getElementById(`edit_pic_${id}`);
    input.addEventListener('change', function() {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(`profile_preview_${id}`).setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            // If no file is selected, show the default profile picture
            document.getElementById(`profile_preview_${id}`).setAttribute('src', 'assets/img/person.png');
        }
    });
}



function closeEditArticleModal(id){
    document.querySelector(`.article-${id}`).classList.remove("active");
}



//PAG VIEW INDIVIDUALLY:


function openViewModal(id){
    document.querySelector(`.show_profile-${id}`).classList.add("active");
}

function hide_profile(id){
    document.querySelector(`.show_profile-${id}`).classList.remove("active");
}



















document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#add-volume").addEventListener("click", function(){
        document.querySelector(".add-pop").classList.add("active");
    });

    document.querySelector(".add-pop .close-btn").addEventListener("click", function(){
        document.querySelector(".add-pop").classList.remove("active");
    });
});


$(document).ready(function() {
    $('#profile_pic').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#profile_pic_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
});


//PARA EDIT SA INDIVIDUAL USER, gi modal ra gyapon nako:


function openEditVolumeModal(id){
    console.log(id)
    document.querySelector(`.volume-${id}`).classList.add("active");

    // Add the file input change event handling logic here
    var input = document.getElementById(`edit_pic_${id}`);
    input.addEventListener('change', function() {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(`profile_preview_${id}`).setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            // If no file is selected, show the default profile picture
            document.getElementById(`profile_preview_${id}`).setAttribute('src', 'assets/img/person.png');
        }
    });
}



function closeEditVolumeModal(id){
    document.querySelector(`.volume-${id}`).classList.remove("active");
}



//PAG VIEW INDIVIDUALLY:


function openViewModal(id){
    document.querySelector(`.show_profile-${id}`).classList.add("active");
}

function hide_profile(id){
    document.querySelector(`.show_profile-${id}`).classList.remove("active");
}

CKEDITOR.replace('editor1');


</script>
</body>

</html>
