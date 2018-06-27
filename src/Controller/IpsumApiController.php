<?php
/**
 * Created by PhpStorm.
 * User: icamara
 * Date: 20/06/18
 * Time: 11:02
 */

namespace KnpU\LoremIpsumIbrahBundle\Controller;

use KnpU\LoremIpsumIbrahBundle\Event\FilterApiResponseEvent;
use KnpU\LoremIpsumIbrahBundle\KnpUIpsum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class IpsumApiController extends AbstractController
{
    /**
     * @var KnpUIpsum
     */
    private $knpUIpsum;
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    public function __construct(KnpUIpsum $knpUIpsum, EventDispatcherInterface $dispatcher=null)
    {

        $this->knpUIpsum = $knpUIpsum;
        $this->dispatcher = $dispatcher;
    }

    public function index()
    {
        $data = [
            'paragraphs' => $this->knpUIpsum->getParagraphs(),
            'sentences' => $this->knpUIpsum->getSentences(),
        ];
        $event = new FilterApiResponseEvent($data);
        if($this->dispatcher !==null)
        {
            $this->dispatcher->dispatch('knpu_lorem_ipsum.filter', $event);
        }
        return $this->json($event->getData());
    }
}