<?php
// src/Controller/RecipeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RecipeController extends Controller
{
    public function homepageAction()
    {
        return $this->render('homepage.html.twig', array());
    }

    public function newRecipeAction()
    {
        return $this->render('new_recipe.html.twig', array());;

    }

    public function allRecipesAction()
    {
        return $this->render('all_recipes.html.twig', array());;
    }
}
