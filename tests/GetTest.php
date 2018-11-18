<?php
/** j4s\superglobals */

declare(strict_types=1);

namespace j4s\superglobals;

/**
 * Class GetTest - Тесты для класса Get
 *
 * @package     superglobals
 * @author      Eugeniy Makarkin <soloscriptura@mail.ru>
 * @version     v1.0.2 2018-11-05 13:24:07
 * @todo Проверить комментарии phpDocumentor!!
 */
class GetTest
{

    /**
     * run() - запускает тесты данного класса
     * @version v1.0.1 2018-10-17 08:50:28
     * @return Null
     */
    public static function run()
    {
        echo '<div class="utest__section">';
        echo '<h5>Get:</h5>';
        echo self::getTest();
        echo self::intTest();
        echo self::identTest();
        echo self::isDefinedTest();
        echo self::isNotSetTest();
        echo self::isNullTest();
        echo self::is1Test();
        echo self::isEmptyTest();
        echo '</div>';
    }

    /**
     * getTest() - тест для метода get
     * @version v1.0.2 2018-11-05 13:24:14
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function getTest()
    {
        global $UTest;

        $UTest->methodName = 'get';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = '';
        // Act
        $act = Get::get('onlykey');
        // Assert Test
        $UTest->isEqual("get('onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = '';
        // Act
        $act = Get::get('notdefined');
        // Assert Test
        $UTest->isEqual("get('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2 со значением по умолчанию';
        $expect = 'Hello';
        // Act
        $act = Get::get('notdefined', 'Hello');
        // Assert Test
        $UTest->isEqual("get('notdefined', 'Hello');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = 'value';
        // Act
        $act = Get::get('key');
        // Assert Test
        $UTest->isEqual("get('key');", $expect, $act);


        return $UTest->functionResults;
    }

    /**
     * intTest() - тест для метода int
     * @version v1.0.1 2018-10-17 08:51:55
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function intTest()
    {
        global $UTest;

        $UTest->methodName = 'int';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = 0;
        // Act
        $act = Get::int('onlykey');
        // Assert Test
        $UTest->isEqual("int('onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = 0;
        // Act
        $act = Get::int('notdefined');
        // Assert Test
        $UTest->isEqual("int('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = 1;
        // Act
        $act = Get::int('boolean');
        // Assert Test
        $UTest->isEqual("int('boolean');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q4';
        $expect = 0;
        // Act
        $act = Get::int('key');
        // Assert Test
        $UTest->isEqual("int('key');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q4 со значением по умолчанию';
        $expect = 10;
        // Act
        $act = Get::int('key', 10);
        // Assert Test
        $UTest->isEqual("int('key', 10);", $expect, $act);


        return $UTest->functionResults;
    }

    /**
     * identTest() - тест для метода ident
     * @version v1.0.2 2018-11-05 13:24:31
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function identTest()
    {
        global $UTest;

        $UTest->methodName = 'ident';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = '';
        // Act
        $act = Get::ident('onlykey');
        // Assert Test
        $UTest->isEqual("ident('onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = '';
        // Act
        $act = Get::ident('notdefined');
        // Assert Test
        $UTest->isEqual("ident('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = 'error';
        // Act
        $act = Get::ident('notdefined', 'error');
        // Assert Test
        $UTest->isEqual("ident('notdefined', 'error');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = 'value';
        // Act
        $act = Get::ident('key');
        // Assert Test
        $UTest->isEqual("ident('key');", $expect, $act);


        return $UTest->functionResults;
    }

    /**
     * isDefinedTest() - тест для метода isDefined
     * @version v1.0.1 2018-10-17 08:52:53
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function isDefinedTest()
    {
        global $UTest;

        $UTest->methodName = 'isDefined';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = true;
        // Act
        $act = Get::isDefined('onlykey');
        // Assert Test
        $UTest->isEqual("isDefined('onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = false;
        // Act
        $act = Get::isDefined('notdefined');
        // Assert Test
        $UTest->isEqual("isDefined('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = true;
        // Act
        $act = Get::isDefined('key');
        // Assert Test
        $UTest->isEqual("isDefined('key');", $expect, $act);


        return $UTest->functionResults;
    }

    /**
     * isNotSetTest() - тест для метода isNotSet
     * @version v1.0.1 2018-10-17 08:53:24
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function isNotSetTest()
    {
        global $UTest;

        $UTest->methodName = 'isNotSet';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = false;
        // Act
        $act = Get::isNotSet('onlykey');
        // Assert Test
        $UTest->isEqual("isNotSet('onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = true;
        // Act
        $act = Get::isNotSet('notdefined');
        // Assert Test
        $UTest->isEqual("isNotSet('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = false;
        // Act
        $act = Get::isNotSet('key');
        // Assert Test
        $UTest->isEqual("isNotSet('key');", $expect, $act);


        return $UTest->functionResults;
    }

    /**
     * isNullTest() - тест для метода isNull
     * @version v1.0.1 2018-10-17 08:53:59
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function isNullTest()
    {
        global $UTest;

        $UTest->methodName = 'isNull';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = true;
        // Act
        $act = Get::isNull('onlykey');
        // Assert Test
        $UTest->isEqual("isNull('onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = false;
        // Act
        $act = Get::isNull('notdefined');
        // Assert Test
        $UTest->isEqual("isNull('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = false;
        // Act
        $act = Get::isNull('key');
        // Assert Test
        $UTest->isEqual("isNull('key');", $expect, $act);


        return $UTest->functionResults;
    }

    /**
     * is1Test() - тест для метода is1
     * @version v1.0.1 2018-10-17 08:54:19
     * @return string - html тег с сообщением результата прохождения теста
     */
    public static function is1Test()
    {
        global $UTest;

        $UTest->methodName = 'is1';


        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = false;
        // Act
        $act = Get::is1('onlykey');
        // Assert Test
        $UTest->isEqual("is1('onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = false;
        // Act
        $act = Get::is1('notdefined');
        // Assert Test
        $UTest->isEqual("is1('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q3';
        $expect = true;
        // Act
        $act = Get::is1('boolean');
        // Assert Test
        $UTest->isEqual("is1('boolean');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q4';
        $expect = false;
        // Act
        $act = Get::is1('key');
        // Assert Test
        $UTest->isEqual("is1('key');", $expect, $act);


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


        // Arrange Test
        $UTest->nextHint = 'q1';
        $expect = false;
        // Act
        $act = Get::isEmpty('onlykey');
        // Assert Test
        $UTest->isEqual("isEmpty('onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q1 со значением по умолчанию';
        $expect = true;
        // Act
        $act = Get::isEmpty('onlykey', true);
        // Assert Test
        $UTest->isEqual("isEmpty('onlykey', true);", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2';
        $expect = false;
        // Act
        $act = Get::isEmpty('notdefined');
        // Assert Test
        $UTest->isEqual("isEmpty('notdefined');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q2 со значением по умолчанию';
        $expect = true;
        // Act
        $act = Get::isEmpty('notdefined', true);
        // Assert Test
        $UTest->isEqual("isEmpty('notdefined', true);", $expect, $act);


        // Arrange Test
        // $UTest->nextHint = 'q3';
        // $expect = true;
        // // Act
        // $act = Get::isEmpty('onlykey');
        // // Assert Test
        // $UTest->isEqual("isEmpty('onlykey');", $expect, $act);


        // Arrange Test
        $UTest->nextHint = 'q4';
        $expect = false;
        // Act
        $act = Get::isEmpty('key');
        // Assert Test
        $UTest->isEqual("isEmpty('key');", $expect, $act);


        return $UTest->functionResults;
    }

}
