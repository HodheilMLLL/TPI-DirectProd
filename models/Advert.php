<?php
class Advert
{
    private $idAdvertisement;
    private $title;
    private $description;
    private $isOrganic;
    private $isValid;
    private $idUser;

    /**
     * Get the value of idAdvert
     */
    public function getIdAdvert()
    {
        return $this->idAdvertisement;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Get the value of isOrganic
     */
    public function getIsOrganic()
    {
        return $this->isOrganic;
    }

    /**
     * Set the value of isOrganic
     *
     * @return  self
     */
    public function setIsOrganic($isOrganic)
    {
        $this->isOrganic = $isOrganic;

        return $this;
    }

    /**
     * Get the value of isValid
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * Set the value of isValid
     *
     * @return  self
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;

        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Création d'une annonce
     * 
     * @param  mixed $advert
     * @return int id de l'annonce
     */
    public static function addAdvert(Advert $advert)
    {
        $title = $advert->getTitle();
        $description = $advert->getDescription();
        $isOrganic = $advert->getIsOrganic();
        $idUser = $advert->getIdUser();


        $req = MonPdo::getInstance()->prepare("INSERT INTO `ADVERTISEMENT`(`title`, `description`, `isOrganic`, `USER_idUser`) VALUES (:title, :myDescription, :isOrganic, :idUser)");
        $req->bindParam(':title', $title);
        $req->bindParam(':myDescription', $description);
        $req->bindParam(':isOrganic', $isOrganic);
        $req->bindParam(':idUser', $idUser);

        $req->execute();

        // Retourne l'id de l'annonce
        return MonPdo::getInstance()->lastInsertId();
    }

    /**
     * Récupère une annonce par son id
     *
     * @param  mixed $idAdvert
     * @return object
     */
    public static function getAdvertById($idAdvert)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM `ADVERTISEMENT` WHERE `idAdvertisement` = :idAdvert");
        $req->bindParam(':idAdvert', $idAdvert);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Advert');
        $req->execute();
        $res = $req->fetch();

        return $res;
    }

    /**
     * Récupère les annonces en fonction d'un id d'utilisateur
     *
     * @param  mixed $idUser
     * @return array
     */
    public static function getAdvertsByUserId($idUser): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM `ADVERTISEMENT` WHERE `USER_idUser` = :idUser");
        $req->bindParam(':idUser', $idUser);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Advert');
        $req->execute();
        $res = $req->fetchAll();

        return $res;
    }

    /**
     * Supprime une annonce par son id
     *
     * @param  mixed $idAdvert
     * @return void
     */
    public static function deleteAdvertById($idAdvert)
    {
        $req = MonPdo::getInstance()->prepare("DELETE FROM `ADVERTISEMENT` WHERE `idAdvertisement` = :idAdvert");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Advert');
        $req->bindParam(':idAdvert', $idAdvert);
        $req->execute();
    }
  
    /**
     * updateAdvert
     *
     * @param  mixed $advert
     * @param  mixed $idAdvert
     * @return void
     */
    public static function updateAdvert(Advert $advert, $idAdvert)
    {
        $title = $advert->getTitle();
        $description = $advert->getDescription();
        $isOrganic = $advert->getIsOrganic();

        $req = MonPdo::getInstance()->prepare("UPDATE `ADVERTISEMENT` SET `title` = :title, `description` = :myDescription, `isOrganic` = :isOrganic WHERE `idAdvertisement` = :idAdvert");
        $req->bindParam(':idAdvert', $idAdvert);
        $req->bindParam(':title', $title);
        $req->bindParam(':myDescription', $description);
        $req->bindParam(':isOrganic', $isOrganic);    
        $req->execute();
    }

    /**
     * Récupère toutes les annonces invalides
     *
     * @return array
     */
    public static function getAllInvalidAdverts(): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM `ADVERTISEMENT` WHERE `isValid` = 0");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Advert');
        $req->execute();
        $res = $req->fetchAll();

        return $res;
    }
    
    /**
     * Validation d'une annonce
     *
     * @param  mixed $idAdvert
     * @return void
     */
    public static function validateAdvert($idAdvert)
    {       
        $req = MonPdo::getInstance()->prepare("UPDATE `ADVERTISEMENT` SET `isValid` = 1 WHERE `idAdvertisement` = :idAdvert");  
        $req->bindParam(':idAdvert', $idAdvert);
        $req->execute();
    }

    /**
     * Refus d'une annonce
     *
     * @param  mixed $idAdvert
     * @return void
     */
    public static function rejectAdvert($idAdvert)
    {       
        $req = MonPdo::getInstance()->prepare("UPDATE `ADVERTISEMENT` SET `isValid` = 2 WHERE `idAdvertisement` = :idAdvert");  
        $req->bindParam(':idAdvert', $idAdvert);
        $req->execute();
    }
}
