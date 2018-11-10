<?php
/** j4s\superglobals */

namespace j4s\superglobals;

/**
 * Данный класс нужен для работы с ключами супергобальных массивов ($_POST, 
 * $_GET, $_SESSION, $_COOKIE)
 * с предварительной обработкой данных полученных в этих параметрах
 * с целью более безопасной работы, и оптимизации работы программиста.
 * 
 * Важное замечание:
 * Исходя из специфики данного класса он обрабатывает ключи и значения 
 * неожиданным способом: например, если не заданы запрашиваемый ключ либо
 * его значение, методы класса возвращают не undefined и null соответственно,
 * а именно значение по-умолчанию передаваемое заданным атрибутом методов.
 * Если же нужно определить, задан ли ключ, нужно использовать методы 
 * isDefined() или isNotSet();
 * 
 * @package     superglobals
 * @author      Eugeniy Makarkin <soloscriptura@mail.ru>
 * @version     v2.0.0 2018-11-09 11:59:24
 */
class Superglobals extends ValidateSuperglobalsOrNot
{

    /**
     * Возвращает заданное значение, если оно является идентификатором.
     * Возвращает значение ключа, если оно содержит только следущие символы (a-zA-Z0-9_-)
     *       Значение       |   ключ определен  | ключ не определен |
     *         Ident        |        value      |XXXXXXXXXXXXXXXXXXX|
     *       не Ident       |       default     |XXXXXXXXXXXXXXXXXXX|
     *      не заданно      |       default     |      default      |
     * @version v1.0.2 2018-11-09 08:27:11
     * @param string $key - Ключ
     * @param string $default - Значение по умолчанию
     * @return string - Значение ключа, если оно содержит только следущие символы (a-zA-Z0-9_-)
     */
    public static function ident(string $key, string $default = '') : string
    {
        $r = static::get($key, $default);
        $r = preg_match("/^[a-zA-Z0-9_-]*$/", $r) ? $r : $default;
        return $r;
    }

    /**
     * isNotSet - Возвращает true, если ключ не определен
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |        FALSE      |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |        FALSE      |       TRUE        |
     * @version v1.0.0 2018-10-17 08:40:48
     * @param string $key - Ключ
     * @return bool
     */
    public static function isNotSet(string $key) : bool
    {
        return !static::isDefined($key);
    }

    /**
     * isNull - Возвращает true, только если ключ определен,
     * но его значение не заданно
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |        FALSE      |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |        TRUE       |       FALSE       |
     * (на столе нет пустого стакана)
     * 
     * @version v1.0.2 2018-11-09 11:56:39
     * @param string $key - Ключ
     * @return bool
     */
    public static function isNull(string $key) : bool
    {
        return static::isDefined($key) && static::get($key) === '';
    }

    /**
     * is1 - Возвращает true только если значение ключа = 1
     *                      |   ключ определен  | ключ не определен |
     *     значение == 1    |        TRUE       |XXXXXXXXXXXXXXXXXXX|
     *     значение != 1    |        FALSE      |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |        FALSE      |       FALSE       |
     * @version v1.0.3 2018-11-09 08:28:59
     * @param string $key - Ключ
     * @return bool
     */
    public static function is1(string $key) : bool
    {
        return static::get($key) == '1';
    }

    /**
     * Возвращает значение ключа, если целое число, либо значение по умолчанию
     *       Значение       |   ключ определен  | ключ не определен |
     *     целое число      |        value      |XXXXXXXXXXXXXXXXXXX|
     *    не целое число    |       default     |XXXXXXXXXXXXXXXXXXX|
     *     не заданно       |       default     |      default      |
     * @version v1.0.2 2018-11-06 08:49:54
     * @param string $key - ключ
     * @param int $default - значение по умолчанию
     * @return int - Значение ключа, если целое число, либо значение по умолчанию
     */
    public static function int(string $key, int $default = 0) : int
    {
        $r = filter_input(static::$inputConstant, $key, FILTER_VALIDATE_INT);
        $r = $r === false || $r === null ? $default : $r;
        return $r;
    }

    /**
     * isEmpty - Возвращает true если значение атрибута = ''
     *                      |   ключ определен  | ключ не определен |
     * значение = ''        |        TRUE       |XXXXXXXXXXXXXXXXXXX|
     * значение != ''       |        FALSE      |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |       default     |      default      |
     * @version v2.0.0 2018-11-06 08:55:19
     * @param string $key - Ключ
     * @return bool
     */
    public static function isEmpty(string $key, bool $ifNotSet = false) : bool
    {
        return !static::isDefined($key) || static::get($key) === '';
    }
}
