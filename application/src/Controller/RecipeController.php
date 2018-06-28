<?php
// src/Controller/RecipeController.php
namespace App\Controller;

use src\Entity\Recipe;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RecipeController extends Controller
{
    public function homepageAction()
    {
        return $this->render('homepage.html.twig', array());
    }

    public function newRecipeAction(Request $request)
    {
//        $recipe = new Recipe();
        $title = $request->request->get("form")['title'];
        return $this->render('new_recipe.html.twig', array());;

    }

    public function allRecipesAction()
    {
        return $this->render('all_recipes.html.twig', array());;
    }

    public function dokuAction()
    {
        return $this->render('doku.html.twig', array());
    }
}
