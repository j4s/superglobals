<?php
/** j4s\superglobals */

namespace j4s\superglobals;

/**
 * Данный класс нужен для работы с Get параметрами(в частности с $_GET
 * массивом), с предварительной обработкой данных полученных в этих параметрах
 * с целью более безопасной работы, и оптимизации работы программиста.
 * 
 * Важное замечание:
 * Исходя из специфики данного класса он обрабатывает $_GET ключи и значения 
 * неожиданным способом: например, если не заданы запрашиваемый ключ либо
 * его значение, методы класса возвращают не undefined и null соответственно,
 * а именно значение по-умолчанию передаваемое заданным атрибутом методов.
 * Если же нужно определить, задан ли ключ, нужно использовать методы 
 * isDefined() или isNotSet();
 * 
 * @package     superglobals
 * @author      Eugeniy Makarkin <soloscriptura@mail.ru>
 * @version     v2.0.3 2018-11-08 16:52:08
 */
class Get extends Superglobals implements SuperglobalInterface
{
    /** @var string $arrayName Имя массива для валидатора */
    public static $arrayName = '_GET';
    /** @var int $inputConstant Константа для фильтра */
    public static $inputConstant = INPUT_GET;

    /**
     * Возвращает значение заданного ключа либо значение по умолчанию.
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |        value      |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |       default     |      default      |
     * @version v1.0.1 2018-11-05 13:15:41
     * @param string $key - ключ
     * @param string $default - значение по умолчанию
     * @return string - значение ключа или значение по умолчанию
     */
    public static function get(string $key, string $default = '') : string
    {
        $r = $_GET[$key] ?? $default;
        return $r;
    }

    /**
     * Возаращает true если определен ключ. Если же ключ не задан вернет false.
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |        TRUE       |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |        TRUE       |       FALSE       |
     * @version v1.0.1 2018-11-08 16:48:12
     * @param string $key - Ключ
     * @return bool
     */
    public static function isDefined(string $key) : bool
    {
        return isset($_GET[$key]);
    }
}
