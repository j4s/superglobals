<?php
/** j4s\superglobals */

declare(strict_types=1);

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
 * @version     v2.1.0 2018-11-12 09:37:03
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
     * значение не заданно  |1      default     |2     default      |
     * значение заданно     |3       value      |XXXXXXXXXXXXXXXXXXX|
     * @version v1.0.2 2018-11-12 09:36:41
     * @param string $key - ключ
     * @param mixed $default - значение по умолчанию
     * @return mixed - значение ключа или значение по умолчанию
     */
    public static function get(string $key, $default = '')
    {
        $r = $_SESSION[$key] ?? $default;

        return $r;
    }

    /**
     * Возвращает значение ключа, если целое число, либо значение по умолчанию
     *       Значение       |   ключ определен  | ключ не определен |
     *     не заданно       |1      default     |2     default      |
     *     целое число      |3       value      |XXXXXXXXXXXXXXXXXXX|
     *   другое значение    |4      default     |XXXXXXXXXXXXXXXXXXX|
     * @version v1.0.2 2018-11-12 09:41:14
     * @param string $key - ключ
     * @param int $default - значение по умолчанию
     * @return int - Значение ключа, если целое число, либо значение по умолчанию
     */
    public static function int(string $key, int $default = 0) : int
    {
        $r1 = static::get($key, $default);
        $r = is_int($r1) ? $r1 : $default;

        return $r;
    }

    /**
     * Возвращает true, если ключ определен.
     *                      |   ключ определен  | ключ не определен |
     * значение не заданно  |1       TRUE       |2      FALSE       |
     * значение заданно     |3       TRUE       |XXXXXXXXXXXXXXXXXXX|
     * (на столе стоит стакан)
     * 
     * @version v1.0.6 2018-11-12 09:41:04
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
     * значение не заданно  |1       TRUE       |2      FALSE       |
     * значение заданно     |3       FALSE      |XXXXXXXXXXXXXXXXXXX|
     * (стакан, стоящий на столе - пуст)
     * 
     * @version v1.0.6 2018-11-12 09:41:32
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

    /**
     * Возвращает boolean результат записи в сессию с заданным ключем заданного значения
     * @version v0.1.0 2018-11-12 09:42:01
     * @since v0.1.7
     * @param string $key - Ключ
     * @param mixed $value - Значение
     * @return bool
     */
    public static function set(string $key, $value) : bool
    {
        $_SESSION[$key] = $value;

        return $_SESSION[$key] === $value;
    }

}
