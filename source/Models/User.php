<?php

namespace Source\Models;

use Source\Core\Connect;
use Source\Core\Model;
use PDO;

class User extends Model
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $phone;
    protected $photo;
    protected $role;
    protected $verification_code;
    protected $code_expires_at;
    protected $deleted;
    protected $cafe_id;

    public function __construct(
        int $id = null,
        string $name = null,
        string $email = null,
        string $password = null,
        string $phone = null,
        string $photo = null,
        string $role = null,
        string $verification_code = null,
        string $code_expires_at=null,
        bool $deleted = false,
        int $cafe_id = null
    )
    {
        $this->table = "users";
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->photo = $photo;
        $this->role = $role;
        $this->verification_code = $verification_code;
        $this->code_expires_at = $code_expires_at;
        $this->deleted = $deleted;
        $this->cafe_id = $cafe_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): void
    {
        $this->role = $role;
    }

        public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

    }

        public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;

    }


        public function getDeleted()
    {
        return $this->deleted;
    }

    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

    }

    public function getVerificationCode()
    {
        return $this->verification_code;
    }

    public function setVerificationCode(?string $code): void
    {
        $this->verification_code = $code;
    }

    public function getCodeExpiresAt()
    {
        return $this->code_expires_at;
    }
    
    public function setCodeExpiresAt(?string $dateTime): void
    {
        $this->code_expires_at = $dateTime;
    }
    
    public function getCafeId()
    {
        return $this->cafe_id;
    }
    
    public function setCafeId(?int $cafeId): void
    {
        $this->cafe_id = $cafeId;
    }

    public function validateVerificationCode(string $code): bool
    {
        $sql = "SELECT verification_code, code_expires_at FROM users WHERE email = :email";
        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) return false;

        if ($user['verification_code'] !== $code) return false;

        if (strtotime($user['code_expires_at']) < time()) return false;

        $sql = "UPDATE users 
                SET verification_code = NULL, code_expires_at = NULL 
                WHERE email = :email";
        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();

        return true;
    }


    public function insert (): bool
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage = "E-mail inválido";
            return false;
        }

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(":email", $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $this->errorMessage = "E-mail já cadastrado";
            return false;
        }

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        if(!parent::insert()){
            $this->errorMessage = "Erro ao inserir o registro: {$this->getErrorMessage()}";
            return false;
        }

        return true;
    }
public function findByEmail(string $email): bool
{
    try {
        $stmt = Connect::getInstance()->prepare("SELECT * FROM users WHERE email = :email AND deleted = 0");
        $stmt->bindValue(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return false;
        }

        // atribuir valores ao objeto
        $reflection = new \ReflectionClass($this);
        foreach ($result as $column => $value) {
            if ($reflection->hasProperty($column)) {
                $property = $reflection->getProperty($column);
                $property->setAccessible(true);
                $property->setValue($this, $value);
            }
        }

        return true;
    } catch (PDOException $e) {
        $this->errorMessage = "Erro na busca por email: {$e->getMessage()}";
        return false;
    }
}

public function findByPhone(string $phone): bool
{
    try {
        $stmt = Connect::getInstance()->prepare("SELECT * FROM users WHERE phone = :phone AND deleted = 0");
        $stmt->bindValue(":phone", $phone);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return false;
        }

        // atribuir valores ao objeto
        $reflection = new \ReflectionClass($this);
        foreach ($result as $column => $value) {
            if ($reflection->hasProperty($column)) {
                $property = $reflection->getProperty($column);
                $property->setAccessible(true);
                $property->setValue($this, $value);
            }
        }

        return true;
    } catch (PDOException $e) {
        $this->errorMessage = "Erro na busca por telefone: {$e->getMessage()}";
        return false;
    }
}

    public function findAll(): array
    {
        $sql = "SELECT * FROM users WHERE deleted = 0";
        $stmt = Connect::getInstance()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


public function deleteUser(int $id): bool
{
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = Connect::getInstance()->prepare($sql);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    try {
        return $stmt->execute(); // Retorna true se deletou
    } catch (PDOException $e) {
        $this->errorMessage = "Erro ao deletar usuário: {$e->getMessage()}";
        return false;
    }
}

    public function update(array $data): bool
    {

        if (empty($data["id"])) {
        $this->errorMessage = "ID não informado para atualização.";
        return false;
        }

        $this->id = (int)$data["id"];

        if (!$this->findById($this->id)) {
        $this->errorMessage = "Usuário não encontrado.";
        return false;
        }

        if (!empty($data["name"])) {
        $this->setName($data["name"]);
        }

        if (!empty($data["phone"])) {
        $this->setPhone($data["phone"]);
        }

        if (!empty($data["photo"])) {
        $this->setPhoto($data["photo"]);
        }

        if (!empty($data["cafe_id"])) {
        $this->setCafeId($data["cafe_id"]);
        }

         if (!empty($data["password"])) {
        $this->setPassword($data["password"]);
        }


        if (!empty($data["email"])) {
        if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $this->errorMessage = "E-mail inválido.";
        return false;
        }
        $this->setEmail($data["email"]);
        }

        return $this->updateById();

        // não atualiza o tipo pois o usuário não pode mudar seu tipo
        // não atualiza a senha pois tem um update apenas pra isso
    }



    public function findById(int $id): bool
{
    $sql = "SELECT * FROM users WHERE id = :id AND deleted = 0 LIMIT 1";
    $stmt = Connect::getInstance()->prepare($sql);
    $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetch(\PDO::FETCH_ASSOC);

    if ($data) {
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->password = $data["password"];
        $this->phone = $data["phone"];
        $this->role = $data["role"];
        $this->deleted = (bool)$data["deleted"];
        return true;
    }

    return false;
}


public function updateCafeId(): bool
{
    $sql = "UPDATE users SET cafe_id = :cafe_id WHERE id = :id";
    $stmt = Connect::getInstance()->prepare($sql);
    return $stmt->execute([
        "cafe_id" => $this->cafe_id,
        "id" => $this->id
    ]);
}


public function getVerificationCodeByEmail(string $email): ?string
{
    $sql = "SELECT verification_code FROM users WHERE email = :email";
    $stmt = Connect::getInstance()->prepare($sql);
    $stmt->execute([":email" => $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result["verification_code"] : null;
}


public function findUserByEmail(string $email): ?User
{
    if ($this->findByEmail($email)) { 
        return $this; // retorna o objeto completo
    }
    return null;
}

}