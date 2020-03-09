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

//Cabeçalho
$PAGE->set_url($CFG->wwwroot . '/local/fourtnews/pages/desc_news.php', []);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('news_display_desc', 'local_fourtnews'));
$PAGE->set_heading(get_string('news_display_desc', 'local_fourtnews'));

echo $OUTPUT->header();

//instanciando a classe
$obj = new News();
$news = $obj->get_all_news();

$out = html_writer::start_tag('div');
$out .= html_writer::tag('h1', 'G1 do Moodle 2.0');
//estrutura de repetição
foreach ($news as $key => $value) {

    $out .= html_writer::start_tag('div', null, ['class' => 'mb-3']);
    $out .= html_writer::tag('img', null, ['class' => 'card-img-top img-test', 'src' => $value->img_banner_url, 'alt' => 'img_teste']);
    $out .= html_writer::start_tag('div', ['class' => 'card-body']);
    $out .= html_writer::start_tag('a', ['href' => $CFG->wwwroot . "/local/fourtnews/pages/index.php?id=" . $value->id]);
    $out .= html_writer::tag('h2', $value->title, ['class' => 'card-title']);
    $out .= html_writer::end_tag('a');
    $out .= html_writer::tag('p', $value->description, ['class' => 'card-text']);
    $out .= html_writer::end_tag('div');

}

echo $out;

echo $OUTPUT->footer();
