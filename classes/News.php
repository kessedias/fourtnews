<?php

/**
 * Plugin de noticias do moodle - Arquivo de classes
 *
 * @package local_fourtnews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

namespace local_fourtnews;

class News
{
    private $id;
    private $title;
    private $description;
    private $content;
    private $img_content_url;
    private $img_banner_url;

    //construtor
    public function __construct($id = null, $title = null, $description = null, $content = null, $img_content_url = null, $img_banner_url = null, $timecreated = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->description = $description;
        $this->img_content_url = $img_content_url;
        $this->img_banner_url = $img_banner_url;
        $this->timecreated = $timecreated;
    }

    //Getters -> funções de acesso
    public function get_id()
    {
        return $this->id;
    }

    public function get_title()
    {
        return $this->title;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_content()
    {
        return $this->content;
    }

    public function get_img_content_url()
    {
        return $this->img_content_url;
    }

    public function get_img_banner_url()
    {
        return $this->img_banner_url;
    }

    public function get_timecreated()
    {
        return $this->timecreated;
    }

    //Setters -> funções de atribuição de valores
    public function set_id($id)
    {
        return $this->id = $id;
    }

    public function set_title($title)
    {
        return $this->title = $title;
    }

    public function set_description($description)
    {
        return $this->description = $description;
    }

    public function set_content($content)
    {
        return $this->content = $content;
    }

    public function set_img_content_url($img_content_url)
    {
        return $this->img_content_url = $img_content_url;
    }

    public function set_img_banner_url($img_banner_url)
    {
        return $this->img_banner_url = $img_banner_url;
    }

    //método de inserção de notícia - INSERT
    public function insert_news()
    {
        global $DB;

        $news = (object) [
            'title' => $this->get_title(),
            'description' => $this->get_description(),
            'content' => $this->get_content(),
            'img_content_url' => $this->get_img_content_url(),
            'img_banner_url' => $this->get_img_banner_url(),
            'timecreated' => $this->get_timecreated(),
        ];

        $id = $DB->insert_record('fourtnews', $news);

        return $id;
    }

    //método de consulta - SELECT
    public function get_all_news()
    {
        global $DB;

        $response = $DB->get_records('fourtnews', []);

        return $response;
    }

    //chamada dos dados
    public function get_info_news()
    {
        $data = [
            'id' => $this->get_id(),
            'title' => $this->get_title(),
            'description' => $this->get_description(),
            'content' => $this->get_content(),
            'sourceimg' => $this->get_sourceimg(),
            'bannerimg' => $this->get_bannerimg(),
            'timecreated' => $this->get_timecreated(),
        ];
    }
}
