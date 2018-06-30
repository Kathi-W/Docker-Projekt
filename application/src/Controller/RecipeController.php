<?php
// src/Controller/RecipeController.php
namespace App\Controller;

use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\RecipeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RecipeController extends Controller
{
    private $recipeRepository;

    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function homepageAction()
    {
        return $this->render('homepage.html.twig', array());
    }

    public function newRecipeAction()
    {
        return $this->render('new_recipe.html.twig', array());
    }

    public function saveAction(Request $request) {
        $recipe = new Recipe();

        $title = $request->request->get("title");
        $note = $request->request->get("note");
        $recipe->setTitle($title);
        $recipe->setNote($note);

        $ingredients = explode("\n", $request->request->get('ingredient'));

        foreach ($ingredients as $string) {
            $ingredient = new Ingredient();
            $ingredient->setIngredient($string);
            $ingredient->setRecipe($recipe);
            $recipe->addIngredient($ingredient);
        }

        $this->recipeRepository->save($recipe);

        return $this->redirect("/show/".$recipe->getId());
    }

    public function dokuAction()
    {
        return $this->render('doku.html.twig', array());
    }

    public function showRecipeAction(Request $request)
    {
        $recipeId = $request->attributes->get('id');
        $recipe = $this->recipeRepository->find($recipeId);

        return $this->render('showRecipe.html.twig', array('recipe' => $recipe));
    }

    public function listRecipesAction()
    {
        $recipes = $this->recipeRepository->findAll();
        return $this->render('listRecipes.html.twig', array('recipes' => $recipes));
    }

    public function deleteRecipeAction()
    {

    }

    public function updateRecipeAction()
    {

    }
}
