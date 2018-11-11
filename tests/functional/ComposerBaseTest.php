<?php

class ComposerBaseTest extends \Codeception\Test\Unit
{

    protected $ci;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->ci =& get_instance();
    }

    /**
     * @expectedException Exception
     */
    public function test_제목이_없는_글을_작성하려고_할_때()
    {

        $article = new \App\Services\Articles();

        $article->write(['body' => '본문']);
    }

    /**
     * @expectedException Exception
     */
    public function test_본문이_없는_글을_작성하려고_할_때()
    {

        $article = new \App\Services\Articles();

        $article->write(['title' => '제목']);
    }

    public function test_정상적인_글_작성()
    {

        $article = new \App\Services\Articles();

        $result = $article->write(['title' => '제목', 'body' => '본문']);


        //PHP의 return type 제한을 통해 integer 값을 보장 받고 있지만 테스트 를 assert 하는 과정을 보여주기 위해 추가했습니다
        $this->assertTrue(is_int($result));
    }


}