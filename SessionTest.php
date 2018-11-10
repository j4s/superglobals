<?php
/** j4s\superglobals */

namespace j4s\superglobals;

/**
 * Class SessionTest - Тесты для класса Session
 *
 * @package     superglobals
 * @author      Eugeniy Makarkin <soloscriptura@mail.ru>
 * @version     v1.0.2 2018-11-10 16:25:13
 * @todo Покрыть тестами остальные методы
 * @todo Проверить комментарии phpDocumentor!!
 */
class SessionTest
{

    /**
     * run() - запускает тесты данного класса
     * @version v1.0.0 2018-10-18 11:20:28
     * @return Null
     */
    public static function run()
    {
        echo '<div class="utest__section">';
        echo '<h5>Session:</h5>';
        echo self::getTest();
        echo self::intTest();
        echo self::isNullTest();
        echo '</div>';
    }

    /**
     * getTest() - тест для метода get
     * @version v1.0.0 2018-10-18 11:24:16
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function getTest()
    {
        global $UTest;

        $UTest->methodName = 'get';


        // Arrange Test
        $UTest->nextHint = 'Запрос неустановленного ключа';
        $expect = '';
        // Act
        $act = Session::get('utest_value');
        // Assert Test
        $UTest->isEqual("Session::get('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'Запрос неустановленного ключа со значением по-умолчанию';
        $expect = 'hi';
        // Act
        $act = Session::get('utest_value', 'hi');
        // Assert Test
        $UTest->isEqual("Session::get('utest_value', 'hi');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'Запрос установленного ключа';
        $_SESSION['utest_value'] = 'hi test';
        $expect = 'hi test';
        // Act
        $act = Session::get('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::get('utest_value');", $expect, $act);


        return $UTest->functionResults;
    }

    /**
     * intTest() - тест для метода int
     * @version v0.1.0 2018-11-10 16:25:34
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function intTest()
    {
        global $UTest;

        $UTest->methodName = 'int';


        // Arrange Test
        $UTest->nextHint = 'Запрос неустановленного ключа';
        $expect = 0;
        // Act
        $act = Session::int('utest_value');
        // Assert Test
        $UTest->isEqual("Session::int('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'Запрос неустановленного ключа со значением по-умолчанию';
        $expect = 8;
        // Act
        $act = Session::int('utest_value', 8);
        // Assert Test
        $UTest->isEqual("Session::int('utest_value', 8);", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'Запрос установленного ключа';
        $_SESSION['utest_value'] = 7;
        $expect = 7;
        // Act
        $act = Session::int('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::int('utest_value');", $expect, $act);

        return $UTest->functionResults;
    }

    /**
     * isNullTest() - тест для метода isNull
     * @version v1.0.0 2018-10-18 11:25:08
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function isNullTest()
    {
        global $UTest;

        $UTest->methodName = 'isNull';


        // Arrange Test quadrant 1
        $UTest->nextHint = 'Запрос установленного ключа, со значением';
        $_SESSION['utest_value'] = 5;
        $expect = false;
        // Act
        $act = Session::isNull('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::isNull('utest_value');", $expect, $act);


        // Arrange Test quadrant 2
        $UTest->nextHint = 'Запрос установленного ключа, без значения';
        $_SESSION['utest_value'] = NULL;
        $expect = true;
        // Act
        $act = Session::isNull('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::isNull('utest_value');", $expect, $act);


        // Arrange Test quadrant 3
        $UTest->nextHint = 'Запрос неустановленного ключа';
        $expect = false;
        // Act
        $act = Session::isNull('utest_value');
        // Assert Test
        $UTest->isEqual("Session::isNull('utest_value');", $expect, $act);

        return $UTest->functionResults;
    }
}
