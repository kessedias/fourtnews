<?php

/**
 * Plugin de noticias do moodle - Arquivo de criação da notícia 📰 
 * 
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

 require_once(__DIR__.'/../../../config.php');
 require_once('../classes/forms.php');

 require_login();

 //Contexto definido para criação de capabilities
 $context = context_system::instance();
 $PAGE->set_context($context);
 $PAGE->set_url($CFG->wwwroot. '/local/fourtnews/pages/creating_news.php', []);
 $PAGE->set_pagelayout('admin');
 $PAGE->set_title('Criando Notícias');
 $PAGE->set_heading('Criando Notícias');

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
     $out .= html_writer::tag('p', 'Notícia criada com sucesso');
     $out .= html_writer::end_tag('div');
 }else{
     $mform->display(); //exibe os elementos na tela
 }

 echo $out;

 echo $OUTPUT->footer();