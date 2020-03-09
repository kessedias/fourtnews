<?php

/**
 * Plugin de noticias do moodle - Arquivo de criação da notícia 📰 
 * 
 * @package local_moodlenews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

 require_once(__DIR__.'/../../../config.php');
 require_once('../classes/forms.php');
 require_once('../classes/fourtnews.php');
 //fazendo a chamada do namespace dentro de pages
 //use local_fourtnews\fourtnews;
 //use local_fourtnews\forms;
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

     $mform->display();
     var_dump('<pre>');
     var_dump($data);
     var_dump('</pre>');
     //var_dump($news);
     //instância da classe de notas
     $news = new News($data->id, $data->txt_title, $data->txta_desc, $data->txta_content, $data->source_img, $data->banner_img);
     $response = $news->insert_news();
     
   
     
     if($response){
        $out = html_writer::start_tag('div', ['id' => 'alert_s', 'class' => 'alert alert-success']);
        $out .= html_writer::tag('p', (get_string('news_success_message', 'local_fourtnews')));
        $out .= html_writer::end_tag('div');
        echo $out;
     }else{
        $out  = html_writer::start_tag('div', ['id' => 'alert_d', 'class' => 'alert alert-danger']);
        $out .= html_writer::tag('p', 'Deu muito errado isso ai');
        $out .= html_writer::end_tag('div');
        echo $out;
     }
    
 }else{
     $mform->display(); //exibe os elementos na tela
 }



 echo $OUTPUT->footer();