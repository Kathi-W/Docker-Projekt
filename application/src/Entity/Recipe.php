<?php

namespace src\Entity;

class Recipe
{
    protected $id;

    protected $title;

    protected $ingredients;

    protected $note;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

}