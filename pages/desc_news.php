<?php

/**
 * Plugin de noticias do moodle - Arquivo de visualização da notícia 📰
 *
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

require_once __DIR__ . '/../../../config.php';
//fazendo a chamada do namespace dentro de pages
use local_fourtnews\News;
use local_fourtnews\NewsForms;
require_login();

//Contexto definido para criação de capabilities
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url($CFG->wwwroot . '/local/fourtnews/pages/creating_news.php', []);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('news_category', 'local_fourtnews'));
$PAGE->set_heading(get_string('create_news', 'local_fourtnews'));
//require_once '../classes/forms.php';
echo $OUTPUT->header();
