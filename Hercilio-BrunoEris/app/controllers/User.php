<?php
class User extends Manipulator{
    public $_id;
    public $_name;
    public $_email;
    public $_telephone;
    public $_password;
    public $_photo;

    public function __construct($name, $email, $telephone, $password){
        $this->_name = $name;
        $this->_email = $email;
        $this->_telephone = $telephone;
        $this->_password = $password;
    }

    public function uploadFile($image, $maxfilesize){
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
                $outputFilename = md5($this->_email).$extension; // Set filename as an MD5 crypt of user's id
                $target = '../../images/profiles/' . $outputFilename; // Define target to move the uploaded image

                // Moving the file
                if(@move_uploaded_file($tempFile, $target)){
                    global $conn;
                    $stmt = $conn->prepare("UPDATE users SET user_profile_photo = ? WHERE user_email = ?");
                    $stmt->bind_param("ss", $outputFilename, $this->_email);
            		$stmt->execute();
                    $conn->close();
                    if($stmt->affected_rows != 1){
                        global $errorSTMT;
                        $errorSTMT = $stmt->error;
                        return $_GET['status'] = "73746d74";
                    }
                    else{
                        header('location: user_login.php?status=7369676e75702073756363657373');
                    }
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

    public function registerUser($name, $email, $telephone, $password){
        global $conn;
        $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_telephone, user_password) VALUES (?, ?, ?, ?)");
		$hashPassword = crypt($password, '$2a$08$GDSWHBpaonamao7psi2015$'); //results 60-digit hash.
        $stmt->bind_param("ssss", ucfirst($name), $email, preg_replace('/[^\d]+/', '', $telephone), $hashPassword);
		$stmt->execute();
        if($stmt->affected_rows != 1){
            echo "Erro: ".$stmt->error." (".$stmt->errno.")";
            if(strpos($stmt->error,'Duplicate entry') !== false && strpos($stmt->error,'mail') !== false){
                global $_email;
                $_email = $email;
                $_GET['status'] = "726570656174656420656d61696c";
            }
        }
        else{
            return true;
        }
	}

    public function loginUser($email, $password){
        global $conn;
        if ($stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_telephone, user_profile_photo FROM users WHERE user_email=? AND user_password=?")) {
            $hash = crypt($password, '$2a$08$GDSWHBpaonamao7psi2015$');
            $stmt->bind_param("ss", $email, $hash);
            $stmt->execute();
            $stmt->bind_result($id, $name, $email, $telephone, $photo);
            $stmt->store_result();
            $stmt->fetch();
            $result = $stmt->num_rows;
            $stmt->close();
            $conn->close();

            if($result == 1){
                echo "Acesso concedido.";
                $this->_name = $name;
                $this->_telephone = $telephone;
                $this->_photo = $photo;
                return true;
            }
            else{
                return false;
            }
        }
	}

    public function recoverUser($email){
        global $conn;
        if ($stmt = $conn->prepare("SELECT user_id, user_name, user_email FROM users WHERE user_email=?")) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($id, $name, $email);
            $stmt->store_result();
            $stmt->fetch();
            $result = $stmt->num_rows;
            $stmt->close();
            $conn->close();

            if($result == 1){
                $this->_id = $id;
                $this->_name = $name;
                $this->_email = $email;
                return 1;
            }
            else{
                return 0;
            }
        }
	}
}
?>
