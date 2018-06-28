<?php

namespace src\Entity;

class Ingredients
{

    protected $id;

    protected $recipe;

    protected $ingredient;

    public function __construct($id)
    {
        $this->id = $id;
    }

}