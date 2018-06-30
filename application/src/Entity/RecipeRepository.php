<?php

namespace App\Entity;

use Doctrine\ORM\EntityRepository;

class RecipeRepository extends EntityRepository
{
    public function save(Recipe $recipe)
    {
        $this->getEntityManager()->persist($recipe);
        $this->getEntityManager()->flush();
    }

    public function findRecipes($recipeId)
    {
        return $this->findBy(["recipe" => $recipeId]);
    }

}