<?php
/** j4s\superglobals */

namespace j4s\superglobals;

/**
 * Данный класс нужен для работы с Session параметрами(в частности с $_SESSION
 * массивом), с предварительной обработкой данных полученных в этих параметрах
 * с целью более безопасной работы, и оптимизации работы программиста.
 * 
 * Важное замечание:
 * Исходя из специфики данного класса он обрабатывает $_SESSION ключи и значения 
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
class Session extends Superglobals implements SuperglobalInterface
{
    /** @var string $arrayName Имя массива для валидатора */
    public static $arrayName = '_SESSION';
    /** @var int $inputConstant Константа для фильтра */
    public static $inputConstant = INPUT_SESSION;

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
        $r = $_SESSION[$key] ?? $default;
        return $r;
    }

    /**
     * Возвращает значение ключа, если целое число, либо значение по умолчанию
     *       Значение       |   ключ определен  | ключ не определен |
     *     целое число      |        value      |XXXXXXXXXXXXXXXXXXX|
     *    не целое число    |       default     |XXXXXXXXXXXXXXXXXXX|
     *     не заданно       |       default     |      default      |
     * @version v1.0.1 2018-11-05 13:17:18
     * @param string $key - ключ
     * @param int $default - значение по умолчанию
     * @return int - Значение ключа, если целое число, либо значение по умолчанию
     */
    public static function int(string $key, int $default = 0) : int
    {
        $r = static::get($key, $default);
        $r = ((int) $r) == $r ? $r : $default;
        return $r;
    }

    /**
     * Возвращает true, если ключ определен.
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |1       TRUE       |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |2       TRUE       |3      FALSE       |
     * (на столе стоит стакан)
     * 
     * @version v1.0.5 2018-11-10 11:24:24
     * @param string $key - Ключ
     * @return bool
     */
    public static function isDefined(string $key) : bool
    {
        return array_key_exists($key, $_SESSION);
    }

    /**
     * Возвращает true, только если ключ определен, но его значение не заданно
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |1       FALSE      |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |2       TRUE       |3      FALSE       |
     * (стакан, стоящий на столе - пуст)
     * 
     * @version v1.0.5 2018-11-10 11:22:54
     * @param string $key - Ключ
     * @return bool
     */
    public static function isNull(string $key) : bool
    {
        // q3 - Если не установлен ключ
        if (! self::isDefined($key)) {
            return false;
        // q2 Если ключ установлен, но не установлено значение
        } else if (is_null($_SESSION[$key])) {
            return true;
        // q1 Если ключ установлен и значение установлено
        } else {
            return false;
        }
    }

}
