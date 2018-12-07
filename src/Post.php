<?php
/** j4s\superglobals */

declare(strict_types=1);

namespace j4s\superglobals;

/**
 * Данный класс нужен для работы с Post параметрами(в частности с $_POST
 * массивом), с предварительной обработкой данных полученных в этих параметрах
 * с целью более безопасной работы, и оптимизации работы программиста.
 * 
 * Важное замечание:
 * Исходя из специфики данного класса он обрабатывает $_POST ключи и значения 
 * неожиданным способом: например, если не заданы запрашиваемый ключ либо
 * его значение, методы класса возвращают не undefined и null соответственно,
 * а именно значение по-умолчанию передаваемое заданным атрибутом методов.
 * Если же нужно определить, задан ли ключ, нужно использовать методы 
 * isDefined() или isNotSet();
 * 
 * @package     superglobals
 * @author      Eugeniy Makarkin <soloscriptura@mail.ru>
 * @version     v3.0.0 2018-12-06 10:05:21
 */
class Post extends Superglobals implements SuperglobalStrictInterface
{
    /** @var string $arrayName Имя массива для валидатора */
    public static $arrayName = '_POST';
    /** @var int $inputConstant Константа для фильтра */
    public static $inputConstant = INPUT_POST;
    /** @var bool $convertNumeric пытаться ли конвертировать строку в число? */
    public static $convertNumeric = true;

    /**
     * Возвращает значение заданного ключа либо значение по умолчанию.
     *                      |   ключ определен  | ключ не определен |
     * значение не заданно  |1      default     |2     default      |
     * значение заданно     |3       value      |XXXXXXXXXXXXXXXXXXX|
     * @version v2.0.1 2018-12-06 15:10:28
     * @param string $key - ключ
     * @param string $default - значение по умолчанию
     * @return string - значение ключа или значение по умолчанию
     */
    public static function get(string $key, string $default = '') : string
    {
        $r = $_POST[$key] ?? $default;

        return $r;
    }

    /**
     * Возвращает true если определен ключ. Если же ключ не задан вернет false
     *                      |   ключ определен  | ключ не определен |
     * значение не заданно  |1       TRUE       |2      FALSE       |
     * значение заданно     |3       TRUE       |XXXXXXXXXXXXXXXXXXX|
     * @version v1.0.3 2018-12-06 15:11:49
     * @param string $key - Ключ
     * @return bool
     */
    public static function isDefined(string $key) : bool
    {
        return isset($_POST[$key]);
    }

}
