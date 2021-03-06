<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Recipe
 *
 * @ORM\Table(name="recipe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecipeRepository")
 */
class Recipe
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="making", type="text")
     */
    private $making;

    /**
     * @var int
     *
     * @ORM\Column(name="bakingDuration", type="integer")
     */
    private $bakingDuration;

    /**
     * @var int
     *
     * @ORM\Column(name="makingDuration", type="integer")
     */
    private $makingDuration;

    /**
     * @var int
     *
     * @ORM\Column(name="guest", type="integer")
     */
    private $guest;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ingredient", mappedBy="recipe", cascade={"all"})
     */
    private $ingredients;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Recipe
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Recipe
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set making
     *
     * @param string $making
     *
     * @return Recipe
     */
    public function setMaking($making)
    {
        $this->making = $making;

        return $this;
    }

    /**
     * Get making
     *
     * @return string
     */
    public function getMaking()
    {
        return $this->making;
    }

    /**
     * Set bakingDuration
     *
     * @param integer $bakingDuration
     *
     * @return Recipe
     */
    public function setBakingDuration($bakingDuration)
    {
        $this->bakingDuration = $bakingDuration;

        return $this;
    }

    /**
     * Get bakingDuration
     *
     * @return int
     */
    public function getBakingDuration()
    {
        return $this->bakingDuration;
    }

    /**
     * Set makingDuration
     *
     * @param integer $makingDuration
     *
     * @return Recipe
     */
    public function setMakingDuration($makingDuration)
    {
        $this->makingDuration = $makingDuration;

        return $this;
    }

    /**
     * Get makingDuration
     *
     * @return int
     */
    public function getMakingDuration()
    {
        return $this->makingDuration;
    }

    /**
     * Set guest
     *
     * @param integer $guest
     *
     * @return Recipe
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;

        return $this;
    }

    /**
     * Get guests
     *
     * @return int
     */
    public function getGuest()
    {
        return $this->guest;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ingredients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ingredient
     *
     * @param \AppBundle\Entity\Ingredient $ingredient
     *
     * @return Recipe
     */
    public function addIngredient(\AppBundle\Entity\Ingredient $ingredient)
    {
        $ingredient->setRecipe($this);
        $this->ingredients[] = $ingredient;
        return $this;
    }

    /**
     * Remove ingredient
     *
     * @param \AppBundle\Entity\Ingredient $ingredient
     */
    public function removeIngredient(\AppBundle\Entity\Ingredient $ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
}
