<?php

class HelperTest extends \Codeception\Test\Unit
{

    protected $ci;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->ci = &get_instance();

        //ci 내장 loader의 경우 ci 내에서 검증이 끝났다고 믿고 사용해야 하므로 이 부분에 대한 테스트는 하지 않는다.
        $this->ci->load->helper('custom_helper');
    }


    public function test_헬퍼_테스트()
    {


        $target_string = "";
        $result_string = custom_str_replace($target_string);

        $this->assertTrue($result_string==="");


        $target_string = "지워지면 안됨";
        $result_string = custom_str_replace($target_string);

        $this->assertTrue($result_string===$target_string);


        $target_string = "지워야됨 그리고 일반 문자";
        $result_string = custom_str_replace($target_string);
        $accepted_string = " 그리고 일반 문자";

        $this->assertTrue($result_string===$accepted_string);
    }
}