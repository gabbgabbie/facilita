<?php

namespace Source\Utils;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Emailer
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);

        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.gmail.com';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'facilitaseucafe@gmail.com';
        $this->mailer->Password = 'vczo hdje wnby kdjg';
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = 587;
        $this->mailer->CharSet = 'UTF-8';

        $this->mailer->setFrom('facilitaseucafe@gmail.com', 'Grupo Facilita ☕');
    }

    public function sendPasswordEmail(string $toEmail, string $toName, string $code): bool
    {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($toEmail, $toName);

            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Recuperação de senha - Facilita';

            $this->mailer->Body = $this->getPasswordEmailTemplate($toName, $code);
            $this->mailer->AltBody = "Olá {$toName},\n\nSeu código de verificação é: {$code}\n\nEste código expira em 30 minutos.\n\nSe você não criou esta conta, ignore este email.";

            return $this->mailer->send();
        } catch (Exception $e) {
            error_log("Erro ao enviar email: " . $this->mailer->ErrorInfo);
            return false;
        }
    }

    private function getPasswordEmailTemplate(string $name, string $code): string
    {
        return "
        <!DOCTYPE html>
<html lang='pt-BR'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Recuperação de Senha</title>
  <style>
    body {
      margin: 0;
      padding: 20px;
      font-family: Arial, sans-serif;
      background-color: #f5f7fa;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 12px;
      overflow: hidden;
    }

    .header {
      background-color: #c286ba;
      padding: 30px;
      text-align: center;
      color: #ffffff;
    }

    .header h1 {
      margin: 0;
      font-size: 24px;
    }

    .content {
      padding: 40px 30px;
      color: #666666;
      line-height: 1.6;
    }

    .code-box {
      background-color: #f8f9fa;
      border: 3px solid #9e6897;
      border-radius: 8px;
      padding: 25px;
      margin: 30px 0;
      text-align: center;
    }

    .code {
      font-size: 36px;
      font-weight: bold;
      color: #4f744a;
      letter-spacing: 8px;
      font-family: monospace;
    }

    .footer {
      background-color: #f8f9fa;
      padding: 20px;
      text-align: center;
      color: #999999;
      font-size: 12px;
    }
  </style>
</head>
<body>
  <div class='container'>
    
    <div class='header'>
      <h1>Facilita</h1>
    </div>

    <div class='content'>
      <p>Olá, {$name}</p>
      
      <p>Recebemos uma solicitação para redefinir a senha da sua conta Facilita.</p>

      <p>Utilize o código de verificação abaixo:</p>

      <div class='code-box'>
        <div class='code'>{$code}</div>
      </div>

      <p>Este código expira em 30 minutos.</p>
      
      <p>Se você não fez esta solicitação, ignore este e-mail.</p>
    </div>

    <div class='footer'>
      <p>© 2025 Facilita - Este é um e-mail automático, não responda.</p>
    </div>

  </div>
</body>
</html>




        ";
    }



    public function sendWelcomeEmail(string $toEmail, string $toName, string $type = "owner"): bool {
    try {
        $this->mailer->clearAddresses();
        $this->mailer->addAddress($toEmail, $toName);

        $this->mailer->isHTML(true);

        if ($type === "employee") {
            $subject = "Boas-vindas à equipe - Facilita ☕";
            $body = $this->getWelcomeEmailTemplate($toName, $type);
            $altBody = "Olá {$toName}, você foi adicionado à equipe de uma cafeteria no sistema Facilita.";
        } else {
            $subject = "Boas-vindas - Facilita ☕";
            $body = $this->getWelcomeEmailTemplate($toName, $type);
            $altBody = "Olá {$toName}, sua conta Facilita foi criada com sucesso.";
        }

        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;
        $this->mailer->AltBody = $altBody;

        return $this->mailer->send();
    } catch (Exception $e) {
        error_log("Erro ao enviar email: " . $this->mailer->ErrorInfo);
        return false;
    }
}



private function getWelcomeEmailTemplate(string $name, string $type): string
{
    $title = $type === "employee"
        ? "Seja bem-vindo(a) à equipe - Facilita☕"
        : "Seja bem-vindo(a) à Facilita ☕";

    $message = $type === "employee"
        ? "
            <p>Olá, {$name}!</p>
            <p>Você agora faz parte de uma equipe no sistema Facilita!</p>
            <p>Com sua conta, você poderá acessar suas tarefas, acompanhar pedidos e ajudar a deixar o atendimento ainda mais eficiente.</p>
            <p>Estamos felizes em ter você com a gente. 💜</p>
            <p>Desejamos um ótimo trabalho e muito sucesso!</p>
        "
        : "
            <p>Olá, {$name}!</p>
            <p>Estamos muito felizes por ter você com a gente.</p>
            <p>Seu cadastro foi concluído com sucesso e agora você já pode começar a facilitar o dia a dia na sua cafeteria.</p>
            <p>O próximo passo é cadastrar sua cafeteria — é rápido e fácil!</p>
            <p>Conte com a gente para deixar sua experiência ainda mais fácil e prática. ☕</p>
        ";

    return "
    <!DOCTYPE html>
<html lang='pt-BR'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>{$title}</title>
  <style>
    body {
      margin: 0;
      padding: 20px;
      font-family: Arial, sans-serif;
      background-color: #f5f7fa;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 12px;
      overflow: hidden;
    }
    .header {
      background-color: #c286ba;
      padding: 30px;
      text-align: center;
      color: #ffffff;
    }
    .header h1 { margin: 0; font-size: 24px; }
    .content { padding: 40px 30px; color: #666; line-height: 1.6; }
    .footer {
      background-color: #f8f9fa;
      padding: 20px;
      text-align: center;
      color: #999;
      font-size: 12px;
    }
  </style>
</head>
<body>
  <div class='container'>
    <div class='header'><h1>{$title}</h1></div>
    <div class='content'>{$message}</div>
    <div class='footer'>
      <p>© 2025 Facilita - Este é um e-mail automático, não responda.</p>
    </div>
  </div>
</body>
</html>
    ";
}



}