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

    public function delete(Recipe $recipe)
    {
        $ingredients = $recipe->getIngredients();
        foreach ($ingredients as $ingredient) {
            $this->getEntityManager()->remove($ingredient);
            $this->getEntityManager()->flush();
        }
        $this->getEntityManager()->remove($recipe);
        $this->getEntityManager()->flush();
    }
}