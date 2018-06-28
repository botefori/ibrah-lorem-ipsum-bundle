<?php
/**
 * Created by PhpStorm.
 * User: icamara
 * Date: 27/06/18
 * Time: 17:09
 */

namespace KnpU\LoremIpsumIbrahBundle\Event;


final class KnpULoremIpsumEvents
{
    /**
     * Called directly before the Lorem Ipsum API data is returned
     *
     * Listener have the opportunity to change that data
     *
     * @Event("KnpU\LoremIpsumIbrahBundle\Event\FilterApiResponseEvent")
     */
  const FILTER_API = 'knpu_lorem_ipsum.filter_api';
}