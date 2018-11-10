<?php
/** j4s\superglobals */

namespace j4s\superglobals;

/**
 * Данный класс нужен для работы с Cookie параметрами(в частности с $_COOKIE
 * массивом), с предварительной обработкой данных полученных в этих параметрах
 * с целью более безопасной работы, и оптимизации работы программиста.
 * 
 * Важное замечание:
 * Исходя из специфики данного класса он обрабатывает $_COOKIE ключи и значения 
 * неожиданным способом: например, если не заданы запрашиваемый ключ либо
 * его значение, методы класса возвращают не undefined и null соответственно,
 * а именно значение по-умолчанию передаваемое заданным атрибутом методов.
 * Если же нужно определить, задан ли ключ, нужно использовать методы 
 * isDefined() или isNotSet();
 * 
 * @package     superglobals
 * @author      Eugeniy Makarkin <soloscriptura@mail.ru>
 * @version     v0.1.0 2018-11-10 14:49:10
 * @since       v0.2.0
 */
class Cookie extends Superglobals implements SuperglobalInterface
{
    /** @var string $arrayName Имя массива для валидатора */
    public static $arrayName = '_COOKIE';
    /** @var int $inputConstant Константа для фильтра */
    public static $inputConstant = INPUT_COOKIE;

    /**
     * Возвращает значение заданного ключа либо значение по умолчанию.
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |        value      |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |       default     |      default      |
     * @version v0.1.0 2018-11-10 14:49:23
     * @since   v0.2.0
     * @param string $key - ключ
     * @param string $default - значение по умолчанию
     * @return string - значение ключа или значение по умолчанию
     */
    public static function get(string $key, string $default = '') : string
    {
        $r = $_COOKIE[$key] ?? $default;
        return $r;
    }

    /**
     * Возаращает true если определен ключ. Если же ключ не задан вернет false.
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |        TRUE       |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |        TRUE       |       FALSE       |
     * @version v0.1.0 2018-11-10 14:49:38
     * @since   v0.2.0
     * @param string $key - Ключ
     * @return bool
     */
    public static function isDefined(string $key) : bool
    {
        return isset($_COOKIE[$key]);
    }
}
