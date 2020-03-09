<?php

/**
 * Plugin de noticias do moodle - Arquivo de formulários
 *
 * @package local_fourtnews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */
namespace local_fourtnews;

require_once $CFG->libdir . '/formslib.php';

class NewsForms extends \moodleform
{

    //adicionando elementos no formulário
    public function definition()
    {
        global $CFG;

        //chamada do form
        $mform = $this->_form;

        /**
         * o primeiro parâmetro é o tipo do elemento
         * o segundo parâmetro é o id
         * o terceiro é o conteúdo
         * o quarto é um array de atributos
         */

        $mform->addElement('header', 'head_guide', get_string('news_guide', 'local_fourtnews'));
        $mform->addElement('text', 'txt_title', get_string('news_title', 'local_fourtnews'), ['placeholder' => get_string('news_title_placeholder', 'local_fourtnews'), 'size' => 48]);
        $mform->addElement('textarea', 'txta_desc', get_string('news_description', 'local_fourtnews'), ['placeholder' => get_string('news_description_placeholder', 'local_fourtnews'), 'cols' => 50, 'rows' => 3]);
        $mform->addElement('textarea', 'txta_content', get_string('news_content', 'local_fourtnews'), ['placeholder' => get_string('news_content_placeholder', 'local_fourtnews'), 'cols' => 50, 'rows' => 5]);
        $mform->addElement('text', 'source_img', get_string('news_image', 'local_fourtnews'), ['placeholder' => get_string('news_image_placeholder', 'local_fourtnews'), 'size' => 48]);
        $mform->addElement('text', 'banner_img', get_string('news_banner', 'local_fourtnews'), ['placeholder' => get_string('news_banner_placeholder', 'local_fourtnews'), 'size' => 48]);

        //definindo os tipos
        $mform->setType('head_guide', PARAM_TEXT);
        $mform->setType('txt_title', PARAM_TEXT);
        $mform->setType('txta_desc', PARAM_TEXT);
        $mform->setType('txta_content', PARAM_TEXT);
        $mform->setType('sourceimg', PARAM_TEXT);
        $mform->setType('bannerimg', PARAM_TEXT);

        //Adicionando regras
        $mform->addRule('txt_title', get_string('news_required_title', 'local_fourtnews'), 'required', 'server');
        $mform->addRule('txta_desc', get_string('news_required_desc', 'local_fourtnews'), 'required', 'server');
        $mform->addRule('txta_content', get_string('news_required_content', 'local_fourtnews'), 'required', 'server');
        $mform->addRule('source_img', get_string('news_required_source_img', 'local_fourtnews'), 'required', 'server');
        $mform->addRule('banner_img', get_string('news_required_banner_img', 'local_fourtnews'), 'required', 'server');

        //Definindo os helpers
        $mform->addHelpButton('source_img', 'news_sourceimg', 'local_moodlenews');
        $mform->addHelpButton('banner_img', 'news_bannerimg', 'local_moodlenews');

        //botão de ação moodle
        $this->add_action_buttons(true, 'Criar notícia');
    }

}
