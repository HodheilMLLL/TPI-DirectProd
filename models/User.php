<?php
class User
{
    private $idUser;
    private $password;
    private $email;
    private $username;
    private $city;
    private $canton;
    private $postalCode;
    private $address;
    private $isAdmin;
    private $description;

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of canton
     */ 
    public function getCanton()
    {
        return $this->canton;
    }

    /**
     * Set the value of canton
     *
     * @return  self
     */ 
    public function setCanton($canton)
    {
        $this->canton = $canton;

        return $this;
    }

    /**
     * Get the value of postalCode
     */ 
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set the value of postalCode
     *
     * @return  self
     */ 
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of isAdmin
     */ 
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set the value of isAdmin
     *
     * @return  self
     */ 
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

        
    /**
     * Ajout d'un utilisateur
     * 
     * @param  mixed $user
     * @return int
     */    
    public static function addUser(User $user){
        $password = $user->getPassword();
        $email = $user->getEmail();
        $username =$user->getUsername();
        $city = $user->getCity();
        $canton = $user->getCanton();
        $postalCode = $user->getPostalCode();
        $address =$user->getAddress();
        $description = $user->getDescription();


        $req = MonPdo::getInstance()->prepare("INSERT INTO `USER`(`password`, `email`, `username`, `city`, `canton`, `postalCode`, `address`, `description`) VALUES (:myPassword, :email, :username, :city, :canton, :postalCode, :myAddress, :myDescription)");
        $req->bindParam(':myPassword', $password);
        $req->bindParam(':email', $email);
        $req->bindParam(':username', $username);
        $req->bindParam(':city', $city);
        $req->bindParam(':canton', $canton);
        $req->bindParam(':postalCode', $postalCode);
        $req->bindParam(':myAddress', $address);
        $req->bindParam(':myDescription', $description);
        $req->execute();

        return MonPdo::getInstance()->lastInsertId();
    }
        
    /**
     * Vérifie si l'email est déjà utilisé
     *
     * @param  mixed $email
     * @return bool
     */
    public static function emailExists($email){
        $req = MonPdo::getInstance()->prepare("SELECT * FROM USER WHERE email = :email");
        $req->bindParam(':email', $email);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'User');
        $req->execute();
        $res=$req->fetch();

        if ($res == null) {
            return false;
        } else {
            return true;
        }        
    }
        
    /**
     * Cryptage du mot de passe en sha256
     *
     * @param  mixed $password
     * @return string
     */
    public static function sha256Converter($password)
    {
        $hashedPassword = hash('sha256', $password);
        return $hashedPassword;
    }
    
    /**
     * Connexion de l'utilisateur
     *
     * @param  mixed $givenUser
     * @return object
     */
    public static function connect(User $givenUser)
    {
        $mdpHash = User::sha256Converter($givenUser->getPassword());

        $req = MonPdo::getInstance()->prepare("SELECT * FROM USER");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $req->execute();
        $users = $req->fetchALL();
        foreach ($users as $user) {
            // Si l'email et le mot de passe correspondent
            if ($user->getEmail() == $givenUser->getEmail() && $user->getPassword() == $mdpHash) {
                return $user;
            }
        }
        return false;
    }
}
?>