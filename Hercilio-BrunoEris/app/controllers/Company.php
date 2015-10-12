<?php
class Company extends Manipulator{
    public $_name;
    public $_location;
    public $_email;
    public $_telephone;
    public $_password;
    public $_cnpj;
    public $_address;
    public $_validations = array(false,false,false,false,false,false);

    public function __construct($name, $location, $email, $telephone, $password, $cnpj, $address){
        $this->_name = $name;
        $this->_location = $location;
        $this->_email = $email;
        $this->_telephone = $telephone;
        $this->_password = $password;
        $this->_cnpj = $cnpj;
        $this->_address = $address;
    }

    public function registerCompany($name, $location, $email, $telephone, $password, $cnpj, $address, $autorization){
        if(is_array($autorization)){
            if (in_array(0, $autorization)) {
                return false;
            }
        }
        elseif($autorization === true){
            global $conn;
            $stmt = $conn->prepare("INSERT INTO companies (comp_name, comp_location, comp_email, comp_telephone, comp_password, comp_cnpj, comp_address) VALUES (?, ?, ?, ?, ?, ?, ?)");
    		$hashPassword = crypt($password, '$2a$08$GDSWHBpaonamao7psi2015$'); //results 60-digit hash.
            $stmt->bind_param("sssssss", ucfirst($name), $location, $email, preg_replace('/[^\d]+/', '', $telephone), $hashPassword, $cnpj, $address);
    		$stmt->execute();
            $conn->close();
            if($stmt->affected_rows != 1){
                global $errorSTMT;
                $errorSTMT = $stmt->error;
                return $_GET['status'] = "73746d74";
            }
            else{
                echo "Empresa ($email) cadastrada com sucesso!";
                header('location: comp_login.php?status=7369676e75702073756363657373');
            }
        }
	}

    public function companyCheckValidations($autorization){
        $info = "Falha na validação de";
        if($autorization[0] == false){
            echo "$info senha.";
        }elseif($autorization[1] == false){
            echo "$info telefone.";
        }elseif($autorization[2] == false){
            echo "$info e-mail.";
        }elseif($autorization[3] == false){
            echo "$info nome.";
        }elseif($autorization[4] == false){
            echo "$info CNPJ.";
        }elseif($autorization[5] == false){
            echo "$info endereço.";
        }
        else{
            $this->_validations = true;
        }
    }

    public function loginCompany($email, $password){
        global $conn;
        if ($stmt = $conn->prepare("SELECT comp_id, comp_name, comp_location, comp_email, comp_telephone, comp_cnpj FROM companies WHERE comp_email=? AND comp_password=?")) {
            $hash = crypt($password, '$2a$08$GDSWHBpaonamao7psi2015$');
            $stmt->bind_param("ss", $email, $hash);
            $stmt->execute();
            $stmt->bind_result($id, $name, $location, $email, $telephone, $cnpj);
            $stmt->store_result();
            $stmt->fetch();
            $result = $stmt->num_rows;
            $stmt->close();
            $conn->close();

            if($result == 1){
                echo "Acesso concedido.";
                $this->_name = $name;
                $this->_location = $location;
                $this->_telephone = $telephone;
                $this->_cnpj = $cnpj;
                return 1;
            }
            else{
                echo "Dados de acesso incorretos.";
                return 0;
            }
        }
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
            //echo "Você enviou o arquivo: <strong>" . $_FILES['image']['name'] . "</strong><br>";
            //echo "Este arquivo é do tipo: <strong>" . $_FILES['imagem']['type'] . "</strong><br>";
            //echo "Temporariamente foi salvo em: <strong>" . $_FILES['imagem']['tmp_name'] . "</strong><br>";
            //echo "Seu tamanho é: <strong>" . $_FILES['imagem']['size'] . "</strong> Bytes<br><br>";

            $tempFile = $_FILES['image']['tmp_name'];
            $name = $_FILES['image']['name'];

            // Catch file extension
            $extension = strtolower(strrchr($name, '.'));

            // Check if file is an image
            if(strstr('.jpg;.jpeg;.gif;.png', $extension)){

                // Set filename as an MD5 crypt of company's CNPJ
                $outputFilename = md5($this->_cnpj).$extension;

                // Define target to move the uploaded image
                $target = '../../images/companyLogos/' . $outputFilename;

                // Moving the file
                if(@move_uploaded_file($tempFile, $target)){
                    return true;
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
            exit;
        }
    }
}
?>
