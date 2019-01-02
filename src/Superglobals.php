<?php
/** j4s\superglobals */

declare(strict_types=1);

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
 * @property    inputConstant
 * @package     superglobals
 * @author      Eugeniy Makarkin <soloscriptura@mail.ru>
 * @version     v2.0.0 2018-11-09 11:59:24
 * @method static get($key, $default)
 * @method static isDefined(string $key)
 */
abstract class Superglobals extends ValidateSuperglobalsOrNot
{

    /**
     * Возвращает заданное значение, если оно является идентификатором.
     * Возвращает значение ключа, если оно содержит только следущие символы (a-zA-Z0-9_-)
     *       Значение       |   ключ определен  | ключ не определен |
     *      не заданно      |1      default     |2     default      |
     *         Ident        |3       value      |XXXXXXXXXXXXXXXXXXX|
     *       не Ident       |4      default     |XXXXXXXXXXXXXXXXXXX|
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
     * значение не заданно  |1       FALSE      |2      TRUE        |
     * значение заданно     |3       FALSE      |XXXXXXXXXXXXXXXXXXX|
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
     * значение не заданно  |1       TRUE       |2      FALSE       |
     * значение заданно     |3       FALSE      |XXXXXXXXXXXXXXXXXXX|
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
     * is1 - Возвращает true только если значение ключа == 1
     *                      |   ключ определен  | ключ не определен |
     * значение не заданно  |1       FALSE      |2      FALSE       |
     *     значение == 1    |3       TRUE       |XXXXXXXXXXXXXXXXXXX|
     *     значение != 1    |4       FALSE      |XXXXXXXXXXXXXXXXXXX|
     * @version v1.0.4 2018-12-06 12:03:25
     * @param string $key - Ключ
     * @return bool
     */
    public static function is1(string $key) : bool
    {
        return static::get($key) == '1';
    }

    /**
     * Возвращает значение ключа, если целое число, либо значение по умолчанию.
     * Внимание! Данный метод не будет приводить float к int, а выдаст занчение по умолчанию.
     *       Значение       |   ключ определен  | ключ не определен |
     *     не заданно       |1      default     |2     default      |
     *     целое число      |3    (int)value    |XXXXXXXXXXXXXXXXXXX|
     *    не целое число    |4      default     |XXXXXXXXXXXXXXXXXXX|
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
     * Возвращает true если значение атрибута = ''.
     * Если значение не заданно, либо ключ не определен возвращает ifNotSet
     *                      |   ключ определен  | ключ не определен |
     * значение не заданно  |1      default     |2     default      |
     * значение = ''        |3       TRUE       |XXXXXXXXXXXXXXXXXXX|
     * значение != ''       |4       FALSE      |XXXXXXXXXXXXXXXXXXX|
     * @version v2.0.1 2018-11-13 10:22:49
     * @param string $key - Ключ
     * @param bool $ifNotSet - Значение по умолчанию
     * @return bool
     */
    public static function isEmpty(string $key, bool $ifNotSet = false) : bool
    {
        // q2
        if (!static::isDefined($key)) {
            return $ifNotSet;
        // q1
        } elseif (static::isNull($key)) {
            return $ifNotSet;
        // q3 До этого варианта не доходит, потому что перед этим проверка на isNull С которой $_GET не может справиться по определению (если не считать вопроса с яваскриптовой реализацией).
        } elseif (static::get($key) == '') {
            return true;
        // q4
        } else {
            return false;
        }
    }

    /**
     * Возвращает значение ключа, если оно - число с плавающей точкой, либо значение по умолчанию.
     *       Значение       |   ключ определен  | ключ не определен |
     *     не заданно       |1      default     |2     default      |
     *     float число      |3   (float)value   |XXXXXXXXXXXXXXXXXXX|
     *    не float число    |4      default     |XXXXXXXXXXXXXXXXXXX|
     * @version v0.1.0 2018-12-06 09:52:25
     * @since v1.0.0-alpha.3
     * @param string $key - ключ
     * @param float $default - значение по умолчанию
     * @return float
     */
    public static function float(string $key, float $default = 0) : float
    {
        $r = filter_input(static::$inputConstant, $key, FILTER_VALIDATE_FLOAT);
        $r = $r === false || $r === null ? $default : $r;

        return $r;
    }

}
