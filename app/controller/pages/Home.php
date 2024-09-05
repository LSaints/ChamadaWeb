<?php

namespace App\controller\pages;

use \App\utils\View;
use \App\model\entity\Discipline;

class Home extends Page
{
    /**
     * Metodo responsavel por retornar o conteudo (view) da nossa home
     * @return string
     */
    public static function getHome() 
    {
        $mockDiscipline = new Discipline;
        $mockDiscipline->id = "2ab";
        $mockDiscipline->name = "Dev web";
        $mockDiscipline->capacity = 20;
        $mockDiscipline->teacherId = 1;

        $content = View::render('pages/home', [
            'id'                    => $mockDiscipline->id,
            'name'                  => $mockDiscipline->name,
            'capacity'              => $mockDiscipline->capacity,
            'teacherId'             => $mockDiscipline->teacherId,
        ]);
        return parent::getPage('ChamadaWEB', $content);
    }
}
