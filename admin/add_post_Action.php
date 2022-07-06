<?php session_start();
require_once '../includes/config.php';

if (isset($_POST['submit'])) {

    $category = htmlspecialchars(mysqli_real_escape_string($con, $_POST['category']));
    $user_id = htmlspecialchars(mysqli_real_escape_string($con, $_SESSION['LOGIN_USER_ID']));
    $title = htmlspecialchars(mysqli_real_escape_string($con, $_POST['post_title']));
    $post_desc = $_POST['post_description'];
    $tags = htmlspecialchars(mysqli_real_escape_string($con, $_POST['tags']));


    // Upload Image
    $tmp_name = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];

    // Check file size
    if ($_FILES["image"]["size"] > 15000000) {
        $_SESSION['FILE_UPLOAD_ERROR'] = "Sorry, your file is too large.";
        header("Location: add_post.php");
        exit;
    }

    // Check extension
    $target_file =  $name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION['FILE_UPLOAD_ERROR'] = "Sorry, only JPG, JPEG, PNG files are allowed.";
        header("Location: add_post.php");
        exit;
    }

    // Upload file path
    $file_path = "../assets/images/posts/";


    $newImageName = time() . '.' . $imageFileType;
    //    echo $newImageName;
    if (move_uploaded_file($tmp_name, $file_path . $newImageName)) {


        $banner = 0;
        $featured = 0;
        $post_status = 1;
        $post_views = 0;
        $created_at = time();
        $sql = "INSERT INTO `posts`(`category_id`, `author_id`, `post_title`, 
                            `post_description`, `post_img`, `post_banner`, `post_featured`,
                             `created_at`, `post_status`, `post_views`, `tags`)
                 VALUES('$category', '$user_id', '$title','$post_desc', '$newImageName',
                         '$banner', '$featured',now(), '$post_status', '$post_views',
                          '$tags')";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            $_SESSION['FILE_UPLOAD_ERROR'] = "Something went wrong! insertion";
            header("Location: add_post.php");
            exit;
        } else {
            $_SESSION['FILE_UPLOADE_SUCCESS'] = "Post published successfully!";
            header("Location: index.php");
            exit;
        }
        } else {
        $_SESSION['FILE_UPLOAD_ERROR'] = "Sever error. file uploading error!";
        header("Location: add_post.php");
        exit;
        }
} else if (isset($_POST['draft_post'])) {

    $category = htmlspecialchars(mysqli_real_escape_string($con, $_POST['category']));
    $user_id = htmlspecialchars(mysqli_real_escape_string($con, $_SESSION['LOGIN_USER_ID']));
    $title = htmlspecialchars(mysqli_real_escape_string($con, $_POST['post_title']));
    $post_desc = $_POST['post_description'];
    $tags = htmlspecialchars(mysqli_real_escape_string($con, $_POST['tags']));


    // Upload Image
    $tmp_name = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];

    // Check file size
    if ($_FILES["image"]["size"] > 100000) {
        $_SESSION['FILE_UPLOAD_ERROR'] = "Sorry, your file is too large.";
        header("Location: add_post.php");
        exit;
    }

    // Check extension
    $target_file =  $imageName;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION['FILE_UPLOAD_ERROR'] = "Sorry, only JPG, JPEG, PNG files are allowed.";
        header("Location: add_post.php");
        exit;
    }

    // Upload file path
    $file_path = "../assets/images/posts/";


    $newImageName = time() . '.' . $imageFileType;
    // echo $newImageName;
    if (move_uploaded_file($tmp_name, $file_path . $newImageName)) {


        $banner = 0;
        $featured = 0;
        $post_status = 0;
        $post_views = 0;
        $created_at = time();
        $sql = "INSERT INTO `posts`(`category_id`, `author_id`, `post_title`, 
    `post_description`, `post_img`, `post_banner`, `post_featured`, `created_at`, `post_status`, 
    `post_views`, `tags`) VALUES('$category', '$user_id', '$title','$post_desc', '$newImageName', '$banner', '$featured','$created_at', '$post_status', '$post_views', '$tags')";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            $_SESSION['FILE_UPLOAD_ERROR'] = "Something went wrong! insertion";
            header("Location: add_post.php");
            exit;
        } else {
            $_SESSION['FILE_UPLOADE_SUCCESS'] = "Post uploaded successfully as draft.";
            header("Location: add_post.php");
            exit;
        }
    } else {
        $_SESSION['FILE_UPLOAD_ERROR'] = "Sever error. file uploading error!";
        header("Location: add_post.php");
        exit;
    }
} else {
    header('location:index.php');
    exit;
}
