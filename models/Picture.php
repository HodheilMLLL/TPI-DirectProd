<?php
class Picture
{
    private $idPicture;
    private $path;
    private $idAdvert;

    /**
     * Get the value of idPicture
     */
    public function getIdPicture()
    {
        return $this->idPicture;
    }

    /**
     * Get the value of path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the value of idAdvert
     */
    public function getIdAdvert()
    {
        return $this->idAdvert;
    }

    /**
     * Set the value of idAdvert
     *
     * @return  self
     */
    public function setIdAdvert($idAdvert)
    {
        $this->idAdvert = $idAdvert;

        return $this;
    }

    /**
     * Création d'une image
     * 
     * @param  mixed $picture
     * @return void
     */
    public static function addPicture(Picture $picture)
    {
        $path = $picture->getPath();
        $idAdvert = $picture->getIdAdvert();

        $req = MonPdo::getInstance()->prepare("INSERT INTO `PICTURE`(`path`, `ADVERTISEMENT_idAdvertisement`) VALUES (:myPath, :idAdvert)");
        $req->bindParam(':myPath', $path);
        $req->bindParam(':idAdvert', $idAdvert);
        $req->execute();
    }

    /**
     * Récupère une image par son id
     *
     * @param  mixed $idPicture
     * @return object
     */
    public static function getPictureById($idPicture)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM `PICTURE` WHERE `idPicture` = :idPicture");
        $req->bindParam(':idPicture', $idPicture);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Picture');
        $req->execute();
        $res = $req->fetch();

        return $res;
    }

    /**
     * Récupère toutes les images en fonction de leur id d'annonce
     *
     * @param  mixed $idAdvert
     * @return object
     */
    public static function getPictureByAdvertId($idAdvert)
    {
        $req = MonPdo::getInstance()->prepare("SELECT * FROM `PICTURE` WHERE `ADVERTISEMENT_idAdvertisement` = :idAdvert");
        $req->bindParam(':idAdvert', $idAdvert);
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Picture');
        $req->execute();
        $res = $req->fetchAll();

        return $res;
    }


    /**
     * Supprime une image par son id
     *
     * @param  mixed $idPicture
     * @return void
     */
    public static function deletePictureById($idPicture)
    {
        $req = MonPdo::getInstance()->prepare("DELETE FROM `PICTURE` WHERE `idPicture` = :idPicture");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Picture');
        $req->bindParam(':idPicture', $idPicture);
        $req->execute();
    }
}
