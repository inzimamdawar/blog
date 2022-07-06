
<script>

function play_video(){

    $('webVideo').attr('playsinline',''); // webVideo is the id of the video tag e.g id="webVideo"
    $('webVideo')[0].play();
}

</script>







<?php

if (isset($_POST['addPost'])) {


    $mime = getimagesize($_FILES['file']['tmp_name'])['mime'];
    $mime = substr($mime, 6);
    $imagecreatefromMime = "imagecreatefrom$mime";
    $outputImg = "image$mime";

    $image = $_FILES['file']['tmp_name'];
    list($widtht, $height) = getimagesize($image);

    $newWidtht = 300;
    $newHeight = 250;

    $newImage = imagecreatetruecolor($newWidtht, $newHeight);

    $source = $imagecreatefromMime($image);

    imagecopyresized($newImage, $source, 0, 0, 0, 0, $newWidtht, $newHeight, $widtht, $height);
    $imageName = time() . '.' . "jpg";

    // header('Content-type:image/' . $mime);
    $outputImg($newImage,'resize/'.$imageName);
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="">
    <input type="submit" name="file" id="">
</form>