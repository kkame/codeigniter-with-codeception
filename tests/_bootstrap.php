<?php

// ci redirect 함수가 동작할 경우 테스트가 종료되어버리는 관계로 강제로 등록해준다
function redirect()
{
    return true;
}

//cli 에서 codeception 인자값으로 인해 route 동작이 이상하게 되는 것 제거
$_SERVER['argv'] = [];

//default controller가 실행된 결과가 출력되는 것을 지워버린다
ob_start();
require_once __DIR__ . "/../public/index.php";
ob_clean();