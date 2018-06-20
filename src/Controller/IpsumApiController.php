<?php
/**
 * Created by PhpStorm.
 * User: icamara
 * Date: 20/06/18
 * Time: 11:02
 */

namespace KnpU\LoremIpsumIbrahBundle\Controller;

use KnpU\LoremIpsumIbrahBundle\KnpUIpsum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IpsumApiController extends AbstractController
{
    /**
     * @var KnpUIpsum
     */
    private $knpUIpsum;

    public function __construct(KnpUIpsum $knpUIpsum)
    {

        $this->knpUIpsum = $knpUIpsum;
    }

    public function index()
    {
       return $this->json([
           'paragraphs' => $this->knpUIpsum->getParagraphs(),
           'sentences' => $this->knpUIpsum->getSentences(),
       ]);
    }
}