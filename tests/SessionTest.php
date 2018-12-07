<?php
/** j4s\superglobals */

declare(strict_types=1);

namespace j4s\superglobals;

/**
 * Тесты для класса Session
 *
 * @package     superglobals
 * @author      Eugeniy Makarkin <soloscriptura@mail.ru>
 * @version     v1.0.3 2018-12-06 12:50:01
 * @todo Покрыть тестами остальные методы
 */
class SessionTest
{

    /**
     * Запускает тесты данного класса
     * @version v1.0.2 2018-12-06 12:50:29
     * @return void
     */
    public static function run()
    {
        echo '<div class="utest__section">';
        echo '<h5>Session:</h5>';
        echo self::getTest();
        echo self::intTest();
        echo self::identTest();
        echo self::isDefinedTest();
        echo self::isNotSetTest();
        echo self::isNullTest();
        echo self::is1Test();
        echo self::isEmptyTest();
        echo self::floatTest();
        echo self::setTest();
        echo '</div>';
    }

    /**
     * Тест для метода get
     * @version v1.0.1 2018-12-06 11:49:31
     * @global object $UTest - Глобальный объект UTest
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function getTest()
    {
        global $UTest;

        $UTest->methodName = 'get';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $_SESSION['ut_utest_value'] = NULL;
        $expect = '';
        // Act
        $act = Session::get('ut_utest_value');
        unset($_SESSION['ut_utest_value']);
        // Assert Test
        $UTest->isEqual("Session::get('ut_utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = '';
        // Act
        $act = Session::get('ut_utest_value');
        // Assert Test
        $UTest->isEqual("Session::get('ut_utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2 со значением по умолчанию';
        $expect = 'hi';
        // Act
        $act = Session::get('ut_utest_value', 'hi');
        // Assert Test
        $UTest->isEqual("Session::get('ut_utest_value', 'hi');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $_SESSION['ut_utest_value1'] = 'hi test';
        $expect = 'hi test';
        // Act
        $act = Session::get('ut_utest_value1');
        unset($_SESSION['ut_utest_value1']);
        // Assert Test
        $UTest->isEqual("Session::get('ut_utest_value1');", $expect, $act);


        return $UTest->functionResults;
    }

    /**
     * Тест для метода int
     * @version v0.1.1 2018-12-06 11:50:13
     * @global object $UTest - Глобальный объект UTest
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function intTest()
    {
        global $UTest;

        $UTest->methodName = 'int';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $_SESSION['ut_utest_value'] = NULL;
        $expect = 0;
        // Act
        $act = Session::int('ut_utest_value');
        unset($_SESSION['ut_utest_value']);
        // Assert Test
        $UTest->isEqual("Session::int('ut_utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = 0;
        // Act
        $act = Session::int('ut_utest_value');
        // Assert Test
        $UTest->isEqual("Session::int('ut_utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2 со значением по умолчанию';
        $expect = 8;
        // Act
        $act = Session::int('ut_utest_value', 8);
        // Assert Test
        $UTest->isEqual("Session::int('ut_utest_value', 8);", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $_SESSION['ut_utest_value'] = 7;
        $expect = 7;
        // Act
        $act = Session::int('ut_utest_value');
        unset($_SESSION['ut_utest_value']);
        // Assert Test
        $UTest->isEqual("Session::int('ut_utest_value');", $expect, $act);


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
     * Тест для метода ident
     * @version v1.0.0 2018-12-06 13:18:30
     * @global object $UTest - Глобальный объект UTest
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function identTest()
    {
        global $UTest;

        $UTest->methodName = 'ident';

        // Arrange Tests
        $_SESSION['ut_onlykey'] = NULL;
        $_SESSION['ut_key1'] = 'value';
        $_SESSION['ut_key2'] = 'value*';

        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = '';
        // Act
        $act = Session::ident('ut_onlykey');
        // Assert Test
        $UTest->isEqual("ident('ut_onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = '';
        // Act
        $act = Session::ident('notdefined');
        // Assert Test
        $UTest->isEqual("ident('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2 со значением по умолчанию';
        $expect = 'error';
        // Act
        $act = Session::ident('notdefined', 'error');
        // Assert Test
        $UTest->isEqual("ident('notdefined', 'error');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = 'value';
        // Act
        $act = Session::ident('ut_key1');
        // Assert Test
        $UTest->isEqual("ident('ut_key1');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q4';
        $expect = '';
        // Act
        $act = Session::ident('ut_key2');
        // Assert Test
        $UTest->isEqual("ident('ut_key2');", $expect, $act);

        // UnArange Tests
        unset($_SESSION['ut_onlykey']);
        unset($_SESSION['ut_key1']);
        unset($_SESSION['ut_key2']);

        return $UTest->functionResults;
    }

    /**
     * Тест для метода isDefined
     * @version v1.0.1 2018-12-06 11:49:31
     * @global object $UTest - Глобальный объект UTest
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function isDefinedTest()
    {
        global $UTest;

        $UTest->methodName = 'isDefined';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $_SESSION['ut_utest_value'] = NULL;
        $expect = true;
        // Act
        $act = Session::isDefined('ut_utest_value');
        unset($_SESSION['ut_utest_value']);
        // Assert Test
        $UTest->isEqual("Session::isDefined('ut_utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = false;
        // Act
        $act = Session::isDefined('ut_utest_value');
        // Assert Test
        $UTest->isEqual("Session::isDefined('ut_utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $_SESSION['ut_utest_value'] = 5;
        $expect = true;
        // Act
        $act = Session::isDefined('ut_utest_value');
        unset($_SESSION['ut_utest_value']);
        // Assert Test
        $UTest->isEqual("Session::isDefined('ut_utest_value');", $expect, $act);

        return $UTest->functionResults;
    }

    /**
     * Тест для метода isNotSet
     * @version v1.0.0 2018-12-06 13:21:56
     * @global object $UTest - Глобальный объект UTest
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function isNotSetTest()
    {
        global $UTest;

        $UTest->methodName = 'isNotSet';

        // Arrange Tests
        $_SESSION['ut_onlykey'] = NULL;
        $_SESSION['ut_key'] = 'value';

        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = false;
        // Act
        $act = Session::isNotSet('ut_onlykey');
        // Assert Test
        $UTest->isEqual("isNotSet('ut_onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = true;
        // Act
        $act = Session::isNotSet('notdefined');
        // Assert Test
        $UTest->isEqual("isNotSet('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = false;
        // Act
        $act = Session::isNotSet('ut_key');
        // Assert Test
        $UTest->isEqual("isNotSet('ut_key');", $expect, $act);

        // UnArange Tests
        unset($_SESSION['ut_onlykey']);
        unset($_SESSION['ut_key']);

        return $UTest->functionResults;
    }

    /**
     * Тест для метода isNull
     * @version v1.0.1 2018-12-06 11:49:31
     * @global object $UTest - Глобальный объект UTest
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function isNullTest()
    {
        global $UTest;

        $UTest->methodName = 'isNull';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $_SESSION['ut_utest_value'] = NULL;
        $expect = true;
        // Act
        $act = Session::isNull('ut_utest_value');
        unset($_SESSION['ut_utest_value']);
        // Assert Test
        $UTest->isEqual("Session::isNull('ut_utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = false;
        // Act
        $act = Session::isNull('ut_utest_value');
        // Assert Test
        $UTest->isEqual("Session::isNull('ut_utest_value');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $_SESSION['ut_utest_value'] = 5;
        $expect = false;
        // Act
        $act = Session::isNull('ut_utest_value');
        unset($_SESSION['ut_utest_value']);
        // Assert Test
        $UTest->isEqual("Session::isNull('ut_utest_value');", $expect, $act);

        return $UTest->functionResults;
    }

    /**
     * Тест для метода is1
     * @version v1.0.2 2018-12-06 11:19:13
     * @global object $UTest - Глобальный объект UTest
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function is1Test()
    {
        global $UTest;

        $UTest->methodName = 'is1';

        // Arrange Tests
        $_SESSION['ut_onlykey'] = NULL;
        $_SESSION['ut_emptyValue'] = '';
        $_SESSION['ut_str1'] = '1';
        $_SESSION['ut_int1'] = 1;
        $_SESSION['ut_int2'] = 2;

        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = false;
        // Act
        $act = Session::is1('ut_onlykey');
        // Assert Test
        $UTest->isEqual("is1('ut_onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = false;
        // Act
        $act = Session::is1('ut_notdefined');
        // Assert Test
        $UTest->isEqual("is1('ut_notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = true;
        // Act
        $act = Session::is1('ut_int1');
        // Assert Test
        $UTest->isEqual("is1('ut_int1');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q4';
        $expect = false;
        // Act
        $act = Session::is1('ut_str1');
        // Assert Test
        $UTest->isEqual("is1('ut_str1');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q5';
        $expect = false;
        // Act
        $act = Session::is1('ut_int2');
        // Assert Test
        $UTest->isEqual("is1('ut_int2');", $expect, $act);

        // UnArange Tests
        unset($_SESSION['ut_onlykey']);
        unset($_SESSION['ut_emptyValue']);
        unset($_SESSION['ut_str1']);
        unset($_SESSION['ut_int1']);
        unset($_SESSION['ut_int2']);

        return $UTest->functionResults;
    }

    /**
     * Тест для метода isEmpty
     * @version v1.0.2 2018-12-06 11:50:31
     * @global object $UTest - Глобальный объект UTest
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function isEmptyTest()
    {
        global $UTest;

        $UTest->methodName = 'isEmpty';

        // Arrange Tests
        $_SESSION['ut_onlykey'] = NULL;
        $_SESSION['ut_emptyValue'] = '';
        $_SESSION['ut_key'] = 'value';
        $_SESSION['ut_boolean'] = 1;

        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = false;
        // Act
        $act = Session::isEmpty('ut_onlykey');
        // Assert Test
        $UTest->isEqual("isEmpty('ut_onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q1 со значением по умолчанию';
        $expect = true;
        // Act
        $act = Session::isEmpty('ut_onlykey', true);
        // Assert Test
        $UTest->isEqual("isEmpty('ut_onlykey', true);", $expect, $act);


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
        $act = Session::isEmpty('ut_emptyValue');
        // Assert Test
        $UTest->isEqual("isEmpty('ut_emptyValue');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q4';
        $expect = false;
        // Act
        $act = Session::isEmpty('ut_key');
        // Assert Test
        $UTest->isEqual("isEmpty('ut_key');", $expect, $act);

        // UnArange Tests
        unset($_SESSION['ut_onlykey']);
        unset($_SESSION['ut_emptyValue']);
        unset($_SESSION['ut_key']);
        unset($_SESSION['ut_boolean']);

        return $UTest->functionResults;
    }

    /**
     * Тест для метода floatTest
     * @version v1.0.2 2018-12-06 11:40:04
     * @global object $UTest - Глобальный объект UTest
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function floatTest()
    {
        global $UTest;

        $UTest->methodName = 'float';

        // Arrange Tests
        $_SESSION['ut_onlykey'] = NULL;
        $_SESSION['ut_emptyValue'] = '';
        $_SESSION['ut_float'] = (float) 1;
        $_SESSION['ut_int'] = 1;

        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = (float) 0;
        // Act
        $act = Session::float('ut_onlykey');
        // Assert Test
        $UTest->isEqual("float('ut_onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = (float) 0;
        // Act
        $act = Session::float('notdefined');
        // Assert Test
        $UTest->isEqual("float('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = (float) 1;
        // Act
        $act = Session::float('ut_float');
        // Assert Test
        $UTest->isEqual("float('ut_float');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q4';
        $expect = (float) 0;
        // Act
        $act = Session::float('ut_int');
        // Assert Test
        $UTest->isEqual("float('ut_int');", $expect, $act);


        // UnArange Tests
        unset($_SESSION['ut_onlykey']);
        unset($_SESSION['ut_emptyValue']);
        unset($_SESSION['ut_float']);
        unset($_SESSION['ut_int']);

        return $UTest->functionResults;
    }

    /**
     * Тест для метода set
     * @version v1.0.1 2018-12-06 11:49:31
     * @global object $UTest - Глобальный объект UTest
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
        $act = Session::set('ut_day', '12.06.18');
        // Assert Test
        $UTest->isEqual("Session::set('ut_day', '12.06.18');", $expect, $act);


        return $UTest->functionResults;
    }

}
