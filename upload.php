<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
  <form enctype="multipart/form-data" action="upload.php" method="POST">
    <p>Upload your file</p>
    <input type="file" multiple="multiple" name="uploaded_files[]"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>
<?PHP
  if(!empty($_FILES['uploaded_files']))
  {
    $pathDir = "files-uploaded/";
    for ($i = 0; $i < sizeof($_FILES['uploaded_files']['name']); $i++) {
      // if (intdiv(($i+1), 10) == 0) {
      //   $zeros = "00";
      // } else {
      //   if ((intdiv((intdiv(($i+1), 10)), 10) == 0) {
      //     $zeros = "0";
      //   } else {
      //     $zeros = "";
      //   }
      // }
      $fileName = "UploadedFile00" . ($i+1) . ".jpg";
      $pathFile = $pathDir . $fileName;
      if (move_uploaded_file($_FILES['uploaded_files']['tmp_name'][$i], $pathFile)) {
        echo "The file " .  $fileName .
        " has been uploaded\n";
        $pathFile = "";
      } else {
        echo "There was an error uploading the file, please try again!";
      }
    }
  }
?>
