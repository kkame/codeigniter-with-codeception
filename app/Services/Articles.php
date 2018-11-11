<?php

namespace App\Services;


/**
 * CI와 종속된 도메인입니다
 * Class Articles
 * @package App\Services
 */
class Articles
{


    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('article_model');
    }


    public function write(array $args): int
    {

        if(empty($args['title']))
            throw new \Exception("글 작성시 제목은 필수 입력 값 입니다");

        if(empty($args['body']))
            throw new \Exception("글 작성시 본문은 필수 입력 값 입니다");

        return $this->ci->article_model->write_article($args);

    }

}