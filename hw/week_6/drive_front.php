<!DOCTYPE html>
<html lang="en">

    <body>
   
    <div class="container">
        <div class="inner_container">
            <div class="upload">
                <p>Upload files:</p>
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="file"><br>
                    <button name="upload">Upload</button>
                </form>
            </div>

            <button name="add_file" id="add_file"> Add a File </button>
            <button name="add_folder" id="add_folder"> Add a Folder </button>

            <form class="add_file_form" method="POST">
                <input type="text" name="file_name" placeholder="File name">
                <input type="text" name="file_data" placeholder="File data">
                <button name="create_file">Create</button>
            </form>

            <form class="add_folder_form" method="POST">
                <input type="text" name="folder_name" placeholder="Folder name">
                <button name="create_folder">Create</button>
            </form>
        </div>

        <p style="color:red"><?=$type_check?></p>
        <p style="color:red"><?=$size_check?></p>
    </div>

    <script>
        var add_file = document.querySelector("#add_file");
        add_file.addEventListener('click', ()=> {
            document.querySelector(".add_file_form").style.visibility = "visible"
            document.querySelector(".add_folder_form").style.visibility = "hidden"
        })

        var add_folder = document.querySelector("#add_folder");
        add_folder.addEventListener('click', ()=> {
            document.querySelector(".add_folder_form").style.visibility = "visible"
            document.querySelector(".add_file_form").style.visibility = "hidden"
        })
    </script>

    


