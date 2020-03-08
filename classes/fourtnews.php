<?php

/**
 * Plugin de noticias do moodle - Arquivo de classes
 * 
 * @package local_fourtnews
 * @author 2020, Kesse Dias <kesse@eadskill.com.br>
 */

 namespace local_fourtnews;

 class News {
     private $id;
     private $title;
     private $description;
     private $content;
     private $sourceimg;
     private $bannerimg;

     //construtor
     public function __construct($id = null, $title = null, $description = null, $content = null, $sourceimg = null, $bannerimg = null){
         $this->id          = $id;
         $this->title       = $title;
         $this->content     = $description;
         $this->description = $content;
         $this->sourceimg   = $sourceimg;
         $this->bannerimg   = $bannerimg;
     }

     //Getters -> funções de acesso
     public function get_id(){
         return $this->$id;
     }

     public function get_title(){
        return $this->$title;
    }

    public function get_description(){
        return $this->$description;
    }

    public function get_content(){
        return $this->$content;
    }

    public function get_sourceimg(){
        return $this->$id;
    }

    public function get_bannerimg(){
        return $this->$id;
    }

    //Setters -> funções de atribuição de valores
    public function set_id($id){
        return $this->id = $id;
    }

    public function set_title($title){
        return $this->title = $title;
    }

    public function set_description($description){
        return $this->descrpition = $description;
    }

    public function set_content($content){
        return $this->content = $content;
    }

    public function set_sourceimg($sourceimg){
        return $this->sourceimg = $sourceimg;
    }

    public function set_bannerimg($bannerimg){
        return $this->bannerimg = $bannerimg;
    }

    //método de inserção de notícia - INSERT
    public function insert_news(){
        GLOBAL $DB;
        
        $news = (object)[
            'title'         =>$this->get_title(),
            'description'   =>$this->get_description(),
            'content'       =>$this->get_content(),
            'sourceimg'     =>$this->get_sourceimg(),
            'bannerimg'     =>$this->get_bannerimg(),
        ];

        $id = $DB->insert_record('fourtnews', $news);

        return $id;
    }

    //método de consulta - SELECT
    public function get_all_news(){
        GLOBAL $DB;

        $response = $DB->get_records('fourtnews', []);

        return $response;
    }

    //chamada dos dados
    public function get_info_news(){
        $data = [
            'id'            => $this->get_id(),
            'title'         => $this->get_title(),
            'description'   => $this->get_description(),
            'content'       => $this->get_content(),
            'sourceimg'     => $this->get_sourceimg(),
            'bannerimg'     => $this->get_bannerimg(),
        ];
    }
 }