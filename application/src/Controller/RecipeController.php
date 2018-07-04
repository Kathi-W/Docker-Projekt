<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Entity\IngredientRepository;
use App\Entity\Recipe;
use App\Entity\RecipeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class RecipeController extends Controller
{
    private $recipeRepository;

    private $ingredientRepository;

    public function __construct(RecipeRepository $recipeRepository, IngredientRepository $ingredientRepository)
    {
        $this->recipeRepository = $recipeRepository;
        $this->ingredientRepository = $ingredientRepository;
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
        $recipes = $this->recipeRepository->findBy(array(), array("title" => 'ASC'));
        return $this->render('listRecipes.html.twig', array('recipes' => $recipes));
    }

    public function showDeleteRecipeAction(Request $request)
    {
        $recipeId = $request->attributes->get('id');
        $recipe = $this->recipeRepository->find($recipeId);

        return $this->render('deleteRecipe.html.twig', array('recipe' => $recipe));
    }

    public function deleteRecipeAction(Request $request)
    {
        $recipeId = $request->attributes->get('id');
        $recipe = $this->recipeRepository->find($recipeId);

        $this->recipeRepository->delete($recipe);

        return $this->redirect("/list");
    }

    public function showUpdateRecipeAction(Request $request)
    {
        $recipeId = $request->attributes->get('id');
        $recipe = $this->recipeRepository->find($recipeId);

        return $this->render('updateRecipe.html.twig', array('recipe' => $recipe));
    }

    public function updateRecipeAction(Request $request)
    {
        $recipeId = $request->attributes->get('id');
        $recipe = $this->recipeRepository->find($recipeId);

        $recipe->setTitle($request->request->get("title"));
        $recipe->setNote($request->request->get("note"));

        foreach ($recipe->getIngredients() as $ingredient)
        {
            $this->ingredientRepository->delete($ingredient);
        }
        $recipe->setIngredients([]);

        $ingredients = explode("\n", $request->request->get('ingredient'));
        foreach ($ingredients as $string) {
            $ingredient = new Ingredient();
            $ingredient->setIngredient($string);
            $ingredient->setRecipe($recipe);
            $recipe->addIngredient($ingredient);
        }

        $this->recipeRepository->save($recipe);

        return $this->redirect("/show/". $recipeId);
    }
}
