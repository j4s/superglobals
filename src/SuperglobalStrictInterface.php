<?php
/** j4s\superglobals */

declare(strict_types=1);

namespace j4s\superglobals;

/**
 * Интерфейс для классов, работающих с суперглобальными переменными, с более строгой типизацией.
 * В частности сейчас он подходит для классов Get, Post и Cookie
 * @version v0.1.0 2018-12-07 12:27:24
 * @since v1.0.0-alpha.3
 */
interface SuperglobalStrictInterface
{

    /**
     * Возвращает значение заданного ключа либо значение по умолчанию.
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |        value      |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |       default     |      default      |
     * @version v1.0.2 2018-12-06 11:12:39
     * @since v1.0.0-alpha.3
     * @param string $key - ключ
     * @param string $default - значение по умолчанию
     * @return string - значение ключа или значение по умолчанию
     */
    public static function get(string $key, string $default = '') : string;

    /**
     * Возаращает true если определен ключ. Если же ключ не задан вернет false.
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |        TRUE       |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |        TRUE       |       FALSE       |
     * @version v1.0.1 2018-11-09 08:23:44
     * @param string $key - Ключ
     * @return bool
     */
    public static function isDefined(string $key) : bool;

}
