<?php
include_once("DBConnect.php");
// print_r($_SESSION);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $image = $_FILES['image'];
    $maxfilesize = $_POST['MAX_FILE_SIZE'];

    function uploadFile($image, $maxfilesize){
        $phpFileUploadErrors = array(
            0 => 'Upload de arquivo efetuado com sucesso.',
            1 => 'Arquivo excede a diretiva upload_max_filesize em php.ini.',
            2 => 'Arquivo excede a diretiva MAX_FILE_SIZE especificada no formulário HTML ('.$maxfilesize.' bytes).',
            3 => 'Upload foi executado apenas parcialmente.',
            4 => 'Nenhum arquivo foi submetido.',
            6 => 'Pasta temporária não encontrada.',
            7 => 'Falha ao gravar arquivo.',
            8 => 'Uma extensão PHP parou o upload do arquivo.',
        );
        $phpFileUploadResult = $phpFileUploadErrors[$image["error"]];

        if(isset($image['name']) && $image["error"] == 0){
            $tempFile = $_FILES['image']['tmp_name'];
            $name = $_FILES['image']['name'];
            $extension = strtolower(strrchr($name, '.')); // Catch file extension

            // Check if file is an image
            if(strstr('.jpg;.jpeg;.gif;.png', $extension)){
                $outputFilename = md5($_SESSION['email']).$extension; // Set filename as an MD5 crypt of user's id
                $target = '../assets/img/user/'; // Define target to move the uploaded image
                if (!is_dir($target)) {
                    mkdir($target, 0777, true);
                }
                chmod($target, 0777);
                $target = $target.$outputFilename;


                // Moving the file
                if(@move_uploaded_file($tempFile, $target)){
                    list($width, $height) = getimagesize($target);
                    // horizontal rectangle
                    if ($width > $height) {
                        $square = $height;              // $square: square side length
                        $offsetX = ($width - $height) / 2;  // x offset based on the rectangle
                        $offsetY = 0;              // y offset based on the rectangle
                    }
                    // vertical rectangle
                    elseif ($height > $width) {
                        $square = $width;
                        $offsetX = 0;
                        $offsetY = ($height - $width) / 2;
                    }
                    // it's already a square
                    else {
                        $square = $width;
                        $offsetX = $offsetY = 0;
                    }
                    list($width, $height) = getimagesize($target);

                    $tempTarget = imagecreatetruecolor($square,$square);
                    if(@imagecreatefromjpeg($target)){
                        $tempImage = imagecreatefromjpeg($target);
                        header("Content-Type: image/jpg");
                    }elseif(@imagecreatefrompng($target)){
                        $tempImage = imagecreatefrompng($target);
                        header("Content-Type: image/png");
                    }elseif(@imagecreatefromgif($target)){
                        $tempImage = imagecreatefromgif($target);
                        header("Content-Type: image/gif");
                    }else{
                        echo "Falha na conversão da imagem!";
                    }
                    imagecopyresampled($tempTarget, $tempImage, 0, 0, 0, 0, $square, $square, $width, $height);
                    imagejpeg($tempTarget, $target, 100);

                    global $conn;
                    $stmt = $conn->prepare("UPDATE users SET user_profile_photo = ? WHERE user_email = ?");
                    $stmt->bind_param("ss", $outputFilename, $_SESSION['email']);
                    $conn->close();
                        echo '
                        <div id="atualizarFoto" class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Imagem atualizada com sucesso!
                        </div>';
                }
                else{
                    echo "Erro ao salvar a imagem.".move_uploaded_file($tempFile, $target);
                }
            }
            else
                echo "Você pode enviar apenas arquivos *.jpg;*.jpeg;*.gif;*.png<br>";
        }
        else{
            echo "Resultado do Upload: ".$phpFileUploadResult;
        }
    }
    echo uploadFile($image, $maxfilesize);
}
?>
