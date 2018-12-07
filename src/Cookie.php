<?php
/** j4s\superglobals */

declare(strict_types=1);

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
 * @version     v1.0.0 2018-12-06 10:06:39
 * @since       v0.2.0
 */
class Cookie extends Superglobals implements SuperglobalStrictInterface
{
    /** @var string $arrayName Имя массива для валидатора */
    public static $arrayName = '_COOKIE';
    /** @var int $inputConstant Константа для фильтра */
    public static $inputConstant = INPUT_COOKIE;
    /** @var bool $convertNumeric пытаться ли конвертировать строку в число? */
    public static $convertNumeric = true;

    /**
     * Возвращает значение заданного ключа либо значение по умолчанию.
     *                      |   ключ определен  | ключ не определен |
     * значение не заданно  |1      default     |2     default      |
     * значение заданно     |3       value      |XXXXXXXXXXXXXXXXXXX|
     * @version v1.0.1 2018-12-06 15:10:58
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
     * Возвращает true если определен ключ. Если же ключ не задан вернет false.
     *                      |   ключ определен  | ключ не определен |
     * значение не заданно  |1       TRUE       |2      FALSE       |
     * значение заданно     |3       TRUE       |XXXXXXXXXXXXXXXXXXX|
     * @version v0.1.2 2018-12-06 15:12:16
     * @since   v0.2.0
     * @param string $key - Ключ
     * @return bool
     */
    public static function isDefined(string $key) : bool
    {
        return isset($_COOKIE[$key]);
    }

}
