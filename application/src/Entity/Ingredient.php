<?php

namespace src\Entity;

class Ingredient
{

    protected $id;

    protected $recipe;

    protected $ingredient;

    public function __construct($id)
    {
        $this->id = $id;
    }

}