<?php

namespace App\Entity;

use Doctrine\ORM\EntityRepository;

class IngredientRepository extends EntityRepository
{
    public function save(Ingredient $ingredient)
    {
        $this->getEntityManager()->persist($ingredient);
        $this->getEntityManager()->flush();
    }

}