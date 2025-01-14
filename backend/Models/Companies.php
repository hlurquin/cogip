<?php

namespace App\Models;

use PDO;
use PDOException;

class Companies
{
    private $id;
    private $name;
    private $type_id;
    private $country;
    private $tva;
    private $created_at;
    private $updated_at;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getTypeid()
    {
        return $this->type_id;
    }

    public function setTypeid($type_id)
    {
        $this->type_id = $type_id;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getTva()
    {
        return $this->tva;
    }

    public function setTva($tva)
    {
        $this->tva = $tva;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}