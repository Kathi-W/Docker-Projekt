<?php

namespace App\Entity;

class Ingredient
{
    protected $id;

    protected $recipe;

    protected $ingredient;

    public function __construct()
    {
    }

    public function setIngredient($ingredient)
    {
        return $this->ingredient = $ingredient;
    }

    public function getIngredient()
    {
        return $this->ingredient;
    }

    public function setRecipe($recipe)
    {
        return $this->recipe = $recipe;
    }

}