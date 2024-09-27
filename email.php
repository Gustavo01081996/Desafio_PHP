<?php
include_once ("vendor/autoload.php");
include_once ("helpers/url.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Código para validação do formulário em PHP

if (isset($_POST["submit"])) // Se o usuário clicar no botão de enviar
{
    // Aqui vou atribuir os valores digitados pelo usuário, nas respectivas variaveis
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $message = $_POST["message"];


    // Array de erros
    // Aqui eu vou armazenar todas as mensagem de erro do sistema
    $error = [];

    // Sanitizar - realizar a limpeza dos dados

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);

    if (!$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS)) {
        $error[] = "Nome inválido";
    }

    if (!$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS)) {
        $error[] = "Telefone inválido";
    }

    if (!$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)) {
        $error[] = "Email inválido";
    }

    if (!$message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS)) {
        $error[] = "Mensagem inválida";
    }

    if (empty($error)) // Caso não tenha erros de validação, eu chamo a função PHP Mailer
    {
        $mail = new PHPMailer(true); // chamando a classe

        try {
            //$mail->SMTPDebug = 2; 
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true; // Aqui estou indicando que o servidor requer autenticação
            $mail->Username = "contato.gustavovilarino@gmail.com"; // usando a autenticação do google
            $mail->Password = ""; // Colocar a senha de app do gmail (Retirei para enviar o teste por questoes de segurança)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            //Recipients - usei meu email para testes

            $mail->setFrom("$email","$name");
            $mail->addAddress("contato.gustavovilarino@gmail.com","Gustavo");
            $mail->addReplyTo("contato.gustavovilarino@gmail.com","Gustavo");
            $mail->isHTML(true);    
            $mail->Subject = "Mensagem de usuario - Construsite Brasil";

            $body = "Mensagem enviada atraves do site, segue texto abaixo: <br>
                    Nome: $name <br>
                    Telefone: $phone <br>
                    Email: $email <br>
                    Mensagem: $message";

            $mail->Body = $body; // Colocar aqui o conteúdo em HTML
            $mail->send();
            header("Location:thanks.php");
            
        } catch (Exception $e) {
            echo "Erro ao enviar o formulário: {$mail->ErrorInfo}";
        }
    }
}




