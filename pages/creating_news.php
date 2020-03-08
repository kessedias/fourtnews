<?php

/**
 * Plugin de noticias do moodle - Arquivo de criação da notícia 📰 
 * 
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

 require_once(__DIR__.'/../../../config.php');
 require_once('../classes/forms.php');

 //fazendo a chamada do namespace dentro de pages
 use local_fourtnews\fourtnews;

 require_login();

 //Contexto definido para criação de capabilities
 $context = context_system::instance();
 $PAGE->set_context($context);
 $PAGE->set_url($CFG->wwwroot. '/local/fourtnews/pages/creating_news.php', []);
 $PAGE->set_pagelayout('admin');
 $PAGE->set_title(get_string('news_category', 'local_fourtnews'));
 $PAGE->set_heading(get_string('create_news', 'local_fourtnews'));

 echo $OUTPUT->header();

 //instanciando o formulário
 $mform = new news_forms();

 //o formulário tem 3 estados: cancel, submit e display

 if($mform->is_cancelled()){

    //quando eu dou o submiy, ele cria um objeto e manda o get_data
 }else if($data = $mform->get_data()){
     //chama o global session que tem como objetivo, gerenciar a sessão do moodle
     GLOBAL $_SESSION;

     $mform->display();
     $out = html_writer::start_tag('div', ['id' => 'alert', 'class' => 'alert alert-success']);
     $out .= html_writer::tag('p', (get_string('news_success_message', 'local_fourtnews')));
     $out .= html_writer::end_tag('div');

    
     var_dump('<pre>');
     var_dump($data->txt_title);
     var_dump('</pre>');
 }else{
     $mform->display(); //exibe os elementos na tela
 }

 echo $out;

 echo $OUTPUT->footer();