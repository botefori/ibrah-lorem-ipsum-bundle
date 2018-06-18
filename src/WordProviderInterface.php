<?php
/**
 * Created by PhpStorm.
 * User: icamara
 * Date: 14/06/18
 * Time: 12:22
 */

namespace KnpU\LoremIpsumIbrahBundle;


interface WordProviderInterface
{
    /**
     * Returns an array of words to use for fake text.
     *
     * @return array
     */
    public function getWordList(): array ;

}