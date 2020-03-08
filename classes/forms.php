<?php

/**
 * Plugin de noticias do moodle - Arquivo de formulários
 * 
 * @package local_fourtnews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

require_once("$CFG->libdir/formslib.php");

class news_forms extends moodleform{
   
    //adicionando elementos no formulário
    public function definition(){
        global $CFG;

        //chamada do form
        $mform = $this->_form;

        /**
         * o primeiro parâmetro é o tipo do elemento
         * o segundo parâmetro é o id
         * o terceiro é o conteúdo
         * o quarto é um array de atributos
         */

        $mform->addElement('header', 'head_guide', 'Dados da notícia');
        $mform->addElement('text', 'txt_title', 'Título', ['placeholder' => 'Digite o título da notícia', 'size' => 48]);
        $mform->addElement('textarea', 'txta_desc', 'Descrição', ['placeholder' => 'Digite a descrição da notícia', 'cols' => 50, 'rows' => 3]);
        $mform->addElement('textarea', 'txta_content', 'Conteúdo', ['placeholder' => 'Digite o conteúdo da notícia', 'cols' => 50, 'rows' => 5]);
        $mform->addElement('text', 'sourceimg', 'Imagem do conteúdo', ['placeholder' => 'Insira a url da imagem do conteúdo aqui', 'size' => 48]);
        $mform->addElement('text', 'bannerimg', 'Imagem da capa', ['placeholder' => 'Insira a url do banner da capa aqui', 'size' => 48]);

        //definindo os tipos
        $mform->setType('head_guide',PARAM_TEXT);
        $mform->setType('txt_title',PARAM_TEXT);
        $mform->setType('txta_desc',PARAM_TEXT);
        $mform->setType('txta_content',PARAM_TEXT);
        $mform->setType('sourceimg',PARAM_TEXT);
        $mform->setType('bannerimg',PARAM_TEXT);

        //Adicionando regras
        $mform->addRule('txt_title', 'O campo título é obrigatório', 'required', 'server');
        $mform->addRule('txta_desc', 'O campo descrição é obrigatório', 'required', 'server');
        $mform->addRule('txta_content', 'O campo conteúdo é obrigatório', 'required', 'server');
        $mform->addRule('sourceimg', 'A inserção do link da imagem de capa é obrigatória', 'required', 'server');
        $mform->addRule('bannerimg', 'A inserção do link de imagem do banner é obrigatória', 'required', 'server');

        //botão de ação moodle
        $this->add_action_buttons(true, 'Criar notícia');
    }



}