<?php

namespace src\Entity;

class Recipe
{
    protected $id;

    protected $title;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

}