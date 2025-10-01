<?php

namespace Source\WebService;

use SorFabioSantos\Uploader\Uploader;
use Source\Models\User;
use Source\Core\JWTToken;


class Users extends Api
{
    public function listUsers (): void
    {
        $users = new User();
        //var_dump($users->findAll());
        $this->call(200, "success", "Lista de usuários", "success")
            ->back($users->findAll());
    }


public function createUser(array $data)
{
    if (empty($data["name"]) || empty($data["email"]) || empty($data["password"]) || empty($data["phone"])) {
        $this->call(400, "bad_request", "Dados obrigatórios faltando", "error")->back();
        return;
    }

    
    if (!isset($data["confirm-password"]) || $data["password"] !== $data["confirm-password"]) {
        $this->call(400, "bad_request", "Senha e confirmação não conferem", "error")->back();
        return;
    }
    $userCheck = new User();
    if ($userCheck->findByEmail($data["email"])) {
        $this->call(400, "bad_request", "Email já cadastrado", "error")->back();
        return;
    }
    $cafeId = $data["cafe_id"] ?? null;

    $user = new User(
        null,
        $data["name"],
        $data["email"],
        $data["password"],
        $data["phone"],
        $data["photo"] ?? "https://upload.wikimedia.org/wikipedia/commons/0/03/Twitter_default_profile_400x400.png",
        $data["role"],
        false,
        $cafeId
    );

    if (!$user->insert()) {
        $this->call(500, "internal_server_error", $user->getErrorMessage(), "error")->back();
        return;
    }

    $response = [
        "name" => $user->getName(),
        "email" => $user->getEmail(),
        "role" => $user->getRole(),
        "phone" => $user->getPhone(),
        "cafe_id" => $user->getCafeId()
    ];

    $this->call(201, "created", "Usuário criado com sucesso", "success")->back($response);
}


    public function listUserById (array $data): void
    {

        if(!isset($data["id"])) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        if(!filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $user = new User();
        if(!$user->findById($data["id"])){
            $this->call(200, "success", "Usuário não encontrado", "error")->back();
            return;
        }
        $response = [
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "role" => $user->getRole(),
            "phone" => $user->getPhone()
        ];
        $this->call(200, "success", "Encontrado com sucesso", "success")->back($response);
    }
    public function updateUser(array $data): void
    {
        $this->auth();
        $user = new User();
        $user->findByEmail($this->userAuth->email);
        //var_dump($user);
        
        $user->setName($data["name"]);
        $user->setEmail($data["email"]);
        $user->setPhone($data["phone"]);
        if (!$user->update($data)) {
        $this->call(400, "bad_request", $user->getErrorMessage() ?? "Erro ao atualizar o usuário.", "error")->back();
        return; }

        $userData = [
            "id" => $user->getId(),
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "phone" => $user->getPhone(),
            "photo" => $user->getPhoto()
        ];

        if ($data["email"] !== $this->userAuth->email) {
            echo json_encode([
                "success" => true,
                "message" => "usuario atualizado com sucesso",
                "data" => $userData,
                "trocouEmail" => true
            ]);            
        } else {
            echo json_encode([
                "success" => true,
                "message" => "usuario atualizado com sucesso",
                "data" => $userData,
                "trocouEmail" => false
            ]);           
        }


        //$this->call(200, "success", "Usuário atualizado com sucesso!", "success")->back();
    }
    public function updateCafeId(array $data): void
    {
        $this->auth();
        $user = new User();
        $user->findByEmail($this->userAuth->email);
        //var_dump($user);
        
        $user->setCafeID($data["cafe_id"]);

        if (!$user->update($data)) {
        $this->call(400, "bad_request", $user->getErrorMessage() ?? "Erro ao atualizar o usuário.", "error")->back();
        return; }

        $userData = [
            "id" => $user->getId(),
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "phone" => $user->getPhone(),
            "photo" => $user->getPhoto()
        ];
            echo json_encode([
                "success" => true,
                "message" => "usuario atualizado com sucesso",
                "data" => $userData,
                "trocouEmail" => false
            ]);           


        //$this->call(200, "success", "Usuário atualizado com sucesso!", "success")->back();
    }


        public function login(array $data): void
    {

        if (empty($data["email"]) || empty($data["password"])) {
            $data["email"] = $_GET["email"] ?? null;
            $data["password"] = $_GET["password"] ?? null;
            
        }

        $user = new User();

        if(!$user->findByEmail($data["email"])){
            $this->call(401, "unauthorized", "Usuário não encontrado", "error")->back();
            return;
        }

        if(!password_verify($data["password"], $user->getPassword())){
            $this->call(401, "unauthorized", "Senha inválida", "error")->back();
            return;
        }

        $jwt = new JWTToken();
        $token = $jwt->create([
            "email" => $user->getEmail(),
            "name" => $user->getName(),
            "role" => $user->getRole()
        ]);


        $this->call(200, "success", "Login realizado com sucesso", "success")
            ->back([
                "token" => $token,
                "user" => [
                    "id" => $user->getId(),
                    "name" => $user->getName(),
                    "email" => $user->getEmail(),
                    "phone" => $user->getPhone(),
                    "photo" => $user->getPhoto(),
                    "role" => $user->getRole(),
                "cafe_id" => $user->getCafeId()
                ]
            ]);

    }
    
     public function deleteUser(array $data): void
    {
        $this->auth();

        if (empty($data['id']) || !filter_var($data['id'], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $user = new User();
        if (!$user->deleteUser((int)$data['id'])) {
            $this->call(500, "internal_server_error", $user->getErrorMessage() ?? "Erro ao excluir usuário", "error")->back();
            return;
        }

        $this->call(200, "success", "Usuário excluído com sucesso", "success")->back();
    }

   

public function updatePhoto(): void
{
    $this->auth();

    if (empty($_FILES["photo"]["name"])) {
        $this->call(400, "bad_request", "Nenhuma foto enviada", "error")->back();
        return;
    }

    $photo = $_FILES["photo"];

    $upload = new Uploader();
    $path = $upload->Image($photo); 

    if (!$path) {
        $this->call(400, "bad_request", $upload->getMessage(), "error")->back();
        return;
    }

    $fileName = basename($path);

    $user = new User();
    if (!$user->findByEmail($this->userAuth->email)) {
        $this->call(404, "not_found", "Usuário não encontrado", "error")->back();
        return;
    }

    $user->setPhoto($fileName);
    if (!$user->updateById()) {
        $this->call(500, "internal_server_error", "Erro ao atualizar foto: " . $user->getErrorMessage(), "error")->back();
        return;
    }

    $imageUrl =$user->getPhoto();

    echo json_encode([
        'status' => 200,
        'type' => 'success',
        'message' => 'Foto atualizada com sucesso',
        'data' => [
            'photo' => $imageUrl
        ]
    ]);
    exit;
}

public function updatePassword(array $data = []): void {
    $this->auth();
    $user = new User();
    $user->findByEmail($this->userAuth->email);


        if (empty($data["oldPassword"]) || empty($data["newPassword"])) {
            $this->call(400, "bad_request", "Senhas não podem estar vazias", "error")->back();
            return;
        }

        if (!password_verify($data["oldPassword"], $user->getPassword())) {
            $this->call(401, "unauthorized", "Senha antiga incorreta", "error")->back();
            return;
        }

        if (password_verify($data["newPassword"], $user->getPassword())) {
            $this->call(400, "bad_request", "A nova senha não pode ser igual à antiga", "error")->back();
            return;
        }

        $user->setPassword(password_hash($data["newPassword"], PASSWORD_DEFAULT));

        if (!$user->updateById()) {
            $this->call(500, "internal_server_error", "Erro ao atualizar senha", "error")->back();
            return;
        }

        $this->call(200, "success", "Senha alterada com sucesso", "success")->back();
    }
}

