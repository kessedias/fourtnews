<?php
/**
 * Arquivo de configuração do plugin
 * @author Kesse Dias
 * @package fourtnews
 */

 defined("MOODLE_INTERNAL") || die;

 $ADMIN->add(
     'root',
     new admin_category('fourtnews', 'Criar Notícia'),
 );

 $ADMIN->add(
    'fourtnews',
     new admin_externalpage(
        'Exibir notícias',
        new moodle_url('local/fourtnews/pages/desc_news.php')
     )
 );

 $ADMIN->add(
     'fourtnews',
     new admin_externalpage(
         'fourtnews',
         'Criar notícia',
         new moodle_url('/local/fourtnews/pages/creating_news')
     )
 );