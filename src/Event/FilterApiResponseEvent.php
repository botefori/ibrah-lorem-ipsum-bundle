<?php
/**
 * Created by PhpStorm.
 * User: icamara
 * Date: 27/06/18
 * Time: 15:39
 */

namespace KnpU\LoremIpsumIbrahBundle\Event;


use Symfony\Component\EventDispatcher\Event;

class FilterApiResponseEvent extends Event
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }



}