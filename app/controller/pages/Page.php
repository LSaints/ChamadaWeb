<?php

namespace App\controller\pages;

use \App\utils\View;

class Page
{
    /**
     * Metodo responsavel por renderizar o topo da pagina
     * @return string
     */
    private static function getHeader()
    {
        return View::render('pages/header');
    }

    /**
     * Metodo responsavel por renderizar o rodape da pagina
     * @return string
     */
    private static function getFooter()
    {
        return View::render('pages/footer');
    }

    /**
     * Metodo responsavel por retornar o conteudo (view) da nossa pagina generica
     * @return string
     */
    public static function getPage($title, $content) 
    {
        return View::render('pages/page', [
            'title'     => $title,
            'header'    => self::getHeader(),
            'footer'    => self::getFooter(),
            'content'   => $content,
        ]);
    }
}
