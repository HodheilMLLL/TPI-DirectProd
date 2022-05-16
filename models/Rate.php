<?php
/**
 * Hodheil MLLL
 * Mai 2022
 * DirectProd
 * Rate.php - Classe représentant un avis 
 */

class Rate
{
    private $idUser;
    private $idAdvertisement;
    private $rating;
    private $comment;
    private $date;    

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
     * Get the value of idAdvertisement
     */ 
    public function getIdAdvertisement()
    {
        return $this->idAdvertisement;
    }

    /**
     * Set the value of idAdvertisement
     *
     * @return  self
     */ 
    public function setIdAdvertisement($idAdvertisement)
    {
        $this->idAdvertisement = $idAdvertisement;

        return $this;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
 
    /**
     * Création d'une évaluation
     *
     * @param  mixed $rate
     * @param  mixed $idUser
     * @param  mixed $idAdvert
     * @return void
     */
    public static function addRate(Rate $rate, $idUser, $idAdvert)
    {
        $rating = $rate->getRating();
        $comment = $rate->getComment();

        $req = MonPdo::getInstance()->prepare("INSERT INTO `RATE`(`idUser`, `idAdvertisement`, `rating`, `comment`) VALUES (:idUser, :idAdvert, :rating, :comment)");
        $req->bindParam(':idUser', $idUser);
        $req->bindParam(':idAdvert', $idAdvert);
        $req->bindParam(':rating', $rating);
        $req->bindParam(':comment', $comment);
        $req->execute();
    }

     /**
     * Récupère les évaluations en fonction d'un id d'annonce
     *
     * @param  mixed $idAdvert
     * @return array
     */
    public static function getRatesByAdvertId($idAdvert): array
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM `RATE` WHERE `idAdvertisement` = :idAdvert ORDER BY `date` DESC");
        $req->bindParam(':idAdvert', $idAdvert);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Rate');
        $req->execute();
        $res = $req->fetchAll();

        return $res;
    }
    
    /**
     * Compte le nombre d'avis de l'annonce
     *
     * @param  mixed $idAdvert
     * @return int
     */
    public static function countRatingByAdvertId($idAdvert)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM RATE WHERE idAdvertisement = :idAdvert");
        $req->bindParam(':idAdvert', $idAdvert);
        $req->execute();
        $count = $req->rowCount(); 

        return $count;
    }
}
