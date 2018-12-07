<?php
/** j4s\superglobals */

declare(strict_types=1);

namespace j4s\superglobals;

/**
 * Интерфейс для классов, работающих с суперглобальными переменными
 * @version v1.0.3 2018-12-07 12:36:06
 */
interface SuperglobalInterface
{
    /**
     * Возвращает значение заданного ключа либо значение по умолчанию.
     *                      |   ключ определен  | ключ не определен |
     * значение заданно     |        value      |XXXXXXXXXXXXXXXXXXX|
     * значение не заданно  |       default     |      default      |
     * @version v1.0.3 2018-12-07 12:36:00
     * @param string $key - ключ
     * @param mixed $default - значение по умолчанию
     * @return mixed - значение ключа или значение по умолчанию
     */
    public static function get(string $key, $default = '');

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
