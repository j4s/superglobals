<?php
/** j4s\superglobals */

declare(strict_types=1);

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
        echo self::isDefinedTest();
        echo self::isNullTest();
        echo self::setTest();
        echo self::isEmptyTest();
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
        $UTest->nextHint = 'q1';
        $_SESSION['utest_value'] = NULL;
        $expect = '';
        // Act
        $act = Session::get('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::get('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = '';
        // Act
        $act = Session::get('utest_value');
        // Assert Test
        $UTest->isEqual("Session::get('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2 со значением по умолчанию';
        $expect = 'hi';
        // Act
        $act = Session::get('utest_value', 'hi');
        // Assert Test
        $UTest->isEqual("Session::get('utest_value', 'hi');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $_SESSION['utest_value1'] = 'hi test';
        $expect = 'hi test';
        // Act
        $act = Session::get('utest_value1');
        unset($_SESSION['utest_value1']);
        // Assert Test
        $UTest->isEqual("Session::get('utest_value1');", $expect, $act);


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
        $UTest->nextHint = 'q1';
        $_SESSION['utest_value'] = NULL;
        $expect = 0;
        // Act
        $act = Session::int('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::int('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = 0;
        // Act
        $act = Session::int('utest_value');
        // Assert Test
        $UTest->isEqual("Session::int('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2 со значением по умолчанию';
        $expect = 8;
        // Act
        $act = Session::int('utest_value', 8);
        // Assert Test
        $UTest->isEqual("Session::int('utest_value', 8);", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $_SESSION['utest_value'] = 7;
        $expect = 7;
        // Act
        $act = Session::int('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::int('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q4';
        $_SESSION['utest_value2'] = 'bp1';
        $expect = 0;
        // Act
        $act = Session::int('utest_value2');
        unset($_SESSION['utest_value2']);
        // Assert Test
        $UTest->isEqual("Session::int('utest_value2');", $expect, $act);

        return $UTest->functionResults;
    }

    /**
     * isDefinedTest() - тест для метода isDefined
     * @version v1.0.0 2018-10-18 11:25:08
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function isDefinedTest()
    {
        global $UTest;

        $UTest->methodName = 'isDefined';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $_SESSION['utest_value'] = NULL;
        $expect = true;
        // Act
        $act = Session::isDefined('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::isDefined('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = false;
        // Act
        $act = Session::isDefined('utest_value');
        // Assert Test
        $UTest->isEqual("Session::isDefined('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $_SESSION['utest_value'] = 5;
        $expect = true;
        // Act
        $act = Session::isDefined('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::isDefined('utest_value');", $expect, $act);

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


        // Arrange Test
        $UTest->nextHint = 'q1';
        $_SESSION['utest_value'] = NULL;
        $expect = true;
        // Act
        $act = Session::isNull('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::isNull('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = false;
        // Act
        $act = Session::isNull('utest_value');
        // Assert Test
        $UTest->isEqual("Session::isNull('utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $_SESSION['utest_value'] = 5;
        $expect = false;
        // Act
        $act = Session::isNull('utest_value');
        unset($_SESSION['utest_value']);
        // Assert Test
        $UTest->isEqual("Session::isNull('utest_value');", $expect, $act);

        return $UTest->functionResults;
    }

    /**
     * setTest() - тест для метода set
     * @version v1.0.0 2018-10-18 11:25:08
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function setTest()
    {
        global $UTest;

        $UTest->methodName = 'set';


        // Arrange Test
        $UTest->nextHint = 'Записывает в сессию строку';
        $expect = true;
        // Act
        $act = Session::set('day', '12.06.18');
        // Assert Test
        $UTest->isEqual("Session::set('day', '12.06.18');", $expect, $act);


        return $UTest->functionResults;
    }

    /**
     * isEmptyTest() - тест для метода isEmpty
     * @version v1.0.1 2018-10-17 08:54:48
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function isEmptyTest()
    {
        global $UTest;

        $UTest->methodName = 'isEmpty';

        // Arrange Tests
        $_SESSION['onlykey'] = NULL;
        $_SESSION['emptyValue'] = '';
        $_SESSION['key'] = 'value';
        $_SESSION['boolean'] = 1;

        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = false;
        // Act
        $act = Session::isEmpty('onlykey');
        // Assert Test
        $UTest->isEqual("isEmpty('onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q1 со значением по умолчанию';
        $expect = true;
        // Act
        $act = Session::isEmpty('onlykey', true);
        // Assert Test
        $UTest->isEqual("isEmpty('onlykey', true);", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = false;
        // Act
        $act = Session::isEmpty('notdefined');
        // Assert Test
        $UTest->isEqual("isEmpty('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2 со значением по умолчанию';
        $expect = true;
        // Act
        $act = Session::isEmpty('notdefined', true);
        // Assert Test
        $UTest->isEqual("isEmpty('notdefined', true);", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = true;
        // Act
        $act = Session::isEmpty('emptyValue');
        // Assert Test
        $UTest->isEqual("isEmpty('emptyValue');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q4';
        $expect = false;
        // Act
        $act = Session::isEmpty('key');
        // Assert Test
        $UTest->isEqual("isEmpty('key');", $expect, $act);

        // UnArange Tests
        unset($_SESSION['onlykey']);
        unset($_SESSION['emptyValue']);
        unset($_SESSION['key']);
        unset($_SESSION['boolean']);

        return $UTest->functionResults;
    }
}
