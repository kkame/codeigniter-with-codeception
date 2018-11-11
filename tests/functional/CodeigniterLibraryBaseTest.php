<?php

class CodeigniterLibraryBaseTest extends \Codeception\Test\Unit
{

    protected $ci;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->ci = &get_instance();

        //ci 내장 loader의 경우 ci 내에서 검증이 끝났다고 믿고 사용해야 하므로 이 부분에 대한 테스트는 하지 않는다.
        $this->ci->load->library('board_library');
    }


    /**
     * @expectedException Exception
     */
    public function test_관리자_미지정_게시판_생성()
    {

        $result = $this->ci->board_library->make_board([]);

        //PHP의 return type 제한을 통해 integer 값을 보장 받고 있지만 테스트 를 assert 하는 과정을 보여주기 위해 추가했습니다
        $this->assertTrue(is_int($result));
    }

    public function test_게시판_생성()
    {

        $result = $this->ci->board_library->make_board(['admin_id'=>'admin']);

        //PHP의 return type 제한을 통해 integer 값을 보장 받고 있지만 테스트 를 assert 하는 과정을 보여주기 위해 추가했습니다
        $this->assertTrue(is_int($result));
    }
}