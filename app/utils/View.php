<?php

namespace App\utils;

class View 
{
    /**
     * Metodo responsavel por retornar o conteudo da view
     * @param string $view
     * @return string
     */
    private static function getContentView($view)
    {
        $file = __DIR__.'../../../resources/view/'.$view.'.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Metodo responsavel por retornar o conteudo renderizado da view
     * @param string $view
     * @param array $vars (string/numeric)
     * @return string
     */
    public static function render($view, $vars = []) 
    {
        $contentView = self::getContentView($view);

        $keys = array_keys($vars);
        $keys = array_map(function($item) {
          return '{{'.$item.'}}';
        }, $keys);

        return str_replace($keys, array_values($vars), $contentView);
    }
}