<form action="<?php echo getValue('phpmodule'); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="datei"><br>
    <input type="text" name="bildName" placeholder="Bildname" ><br>
    <input type="text" name="albumName" placeholder="Albumname" ><br>
    <textarea name="tags" cols="40" rows="5" placeholder="Bildtags eingeben..." ></textarea><br>
    <input type="submit" name="submit" value="Hochladen">
</form>

Dateiupload Snippet from:

https://www.php-einfach.de/php-tutorial/dateiupload/