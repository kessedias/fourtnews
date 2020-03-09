<?php

/**
 * Plugin de noticias do moodle - Arquivo de index de uma notícia 📰
 *
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

require_once __DIR__ . '/../../../config.php';
require_once $CFG->libdir . '/adminlib.php';
$CFG->cachejs = false; //não permite js cache
//fazendo a chamada do namespace dentro de pages
use local_fourtnews\News;
use local_fourtnews\NewsForms;
require_login();

$id = required_param('id', PARAM_INT);

//Contexto definido para criação de capabilities
$PAGE->set_url($CFG->wwwroot . '/local/fourtnews/pages/desc_news.php', []);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('news_display_desc', 'local_fourtnews'));
$PAGE->set_heading(get_string('news_display_desc', 'local_fourtnews'));
//fazendo a chamada do css
$PAGE->requires->css('/local/fourtnews/styles.css');

echo $OUTPUT->header();
//chamada do arquivo de js
$PAGE->requires->js_call_amd('local_fourtnews/main', 'init');

//instanciando a classe
$obj = new News();
$news = $obj->get_all_news();

//inicio
$out = html_writer::start_tag('div');
$out .= html_writer::tag('h1', $news[$id]->title);
$out .= html_writer::tag('p', $news[$id]->content);
$out .= html_writer::start_tag('div', ['class' => 'image-wrapper']);
$out .= html_writer::tag('img', null, ['src' => $news[$id]->img_content_url, 'alt' => 'img_news', 'width' => 600, 'height' => 'auto', 'id' => 'change_img']);
$out .= html_writer::tag('p', 'Data: ' . date('d/m/Y à\s H:i', $news[$id]->timecreated));
$out .= html_writer::tag('p', 'Faça a sua avaliação!');
$out .= html_writer::start_tag('div', ['class' => 'btn-wrapper']);
$out .= html_writer::tag('button', null, ['class' => 'btn-noclick', 'id' => 'btn1']);
$out .= html_writer::tag('button', null, ['class' => 'btn-noclick', 'id' => 'btn2']);
$out .= html_writer::tag('button', null, ['class' => 'btn-noclick', 'id' => 'btn3']);
$out .= html_writer::tag('button', null, ['class' => 'btn-noclick', 'id' => 'btn4']);
$out .= html_writer::tag('button', null, ['class' => 'btn-noclick', 'id' => 'btn5']);
$out .= html_writer::end_tag('div');

//printando a saída do html
echo $out;

//printando a saída do rodapé;
echo $OUTPUT->footer();
