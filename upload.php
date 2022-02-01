   if(isset($_POST['submit'])){
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'ico','raw', 'mp4');
        
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize > 10){
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("location: saved.php");
                }else{
                    echo "Your file is too big ta melk baghi tfra3liya server";
                }
            }else{
                echo "there was an error in uploading your pic a wuld/bent l3ebd";
            }
        }else{
            echo "A DEK KHUNA ULA KHETNA CHI HAJA TEMMA MACHI HIYA HEDIK";
        }
    }
?>
