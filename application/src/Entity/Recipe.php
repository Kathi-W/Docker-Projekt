<?php

namespace src\Entity;

class Recipe
{
    protected $id;

    protected $title;

//    protected $ingredients;

    protected $note;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getId()
    {
        return $this->id;
    }

}