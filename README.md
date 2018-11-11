SuperGlobals
=========

SuperGlobals is a PHP library for safe and convenient handling of SuperGlobals such as ```$_GET```, ```$_POST```, ```$_SESSION```, ```$_COOKIE```.
- Safe because you can use special <b>methods</b> to validate or filter requested value "on the fly"
- Convenient because it makes application code short and meaningful, without useless repetitions, making it ''extra'' <abbr title="Don't Repeat Yourself">DRY</abbr>

Using this library you can:
 
 - write ```Get::get('key');``` instead of ```isset($_GET['key']) ? $_GET['key'] : '';```
 
 - put a default value as a second attribute like this: ```Get::get('foo', 'bar');``` this returns 'bar' when $_GET['foo'] is not set.
 
 - use methods like ```Get::int('p');``` for getting an integer value, for page number. If you want to use default "1" in this keys, you should write ```Get::int('p', 1);```
 
 - use the same interface for different SuperGlobals: ```$_GET```, ```$_POST```, ```$_SESSION```, ```$_COOKIE``` (use ```Get::get('foo');``` for $_GET['foo'], or ```Cookie::get('foo');``` for $_COOKIE['foo'])

 We have such a methods:
 * **get(string $key, string $default = '')** : string - Returns the value of ```preset``` key, or ```preset``` default value.
 
 * **int(string $key, int $default = 0)** : int - Returns the value of ```preset``` key, if it is intager or ```preset``` default value.
 
 * **ident(string $key, string $default = '')** : string - Returns the value of ```preset``` key, if it contains only this: a-zA-Z0-9_- symbols, or ```preset``` default value.
 
 * **isDefined(string $key)** : bool - Returns ```TRUE``` if the the ```preset``` key is defined, or ```FALSE``` if it is not.
 
 * **isNull(string $key)** : bool - Returns ```TRUE``` if the value of the ```preset``` key is not set, or ```FALSE``` otherwise.
 
 * **isNotSet(string $key)** : bool - Returns ```FALSE``` if the value of the ```preset``` key is not set, or ```TRUE``` otherwise.
 
 * **is1(string $key)** : bool - Returns ```TRUE``` only if value of the $key == 1;
 
 * **isEmpty(string $key, bool $ifNotSet = false)** : bool - Returns ```TRUE``` if value of the $key == ''
 
 
 Current Diagram of classes:
 ![alt text](https://yuml.me/diagram/plain;dir:td/class/[j4s/superglobals/ValidateSuperglobalsOrNot%7C%7C()],[j4s/superglobals/Superglobals%7C%7Cident();isNotSet();isNull();is1();int();isEmpty()],[j4s/superglobals/Get%7CarrayName;inputConstant%7Cget();isDefined();ident();isNotSet();isNull();is1();int();isEmpty()],[j4s/superglobals/SuperglobalInterface%7C%7Cget();isDefined()],[j4s/superglobals/Post%7CarrayName;inputConstant%7Cget();isDefined();ident();isNotSet();isNull();is1();int();isEmpty()],[j4s/superglobals/Session%7CarrayName;inputConstant%7Cget();int();isDefined();isNull();ident();isNotSet();is1();isEmpty()],[j4s/superglobals/Cookie%7CarrayName;inputConstant%7Cget();isDefined();ident();isNotSet();isNull();is1();int();isEmpty()],[j4s/superglobals/ValidateSuperglobalsOrNot]%5E-[j4s/superglobals/Superglobals],[j4s/superglobals/Superglobals]%5E-[j4s/superglobals/Get],[j4s/superglobals/SuperglobalInterface]%5E-.-[j4s/superglobals/Get],[j4s/superglobals/Superglobals]%5E-[j4s/superglobals/Post],[j4s/superglobals/SuperglobalInterface]%5E-.-[j4s/superglobals/Post],[j4s/superglobals/Superglobals]%5E-[j4s/superglobals/Session],[j4s/superglobals/SuperglobalInterface]%5E-.-[j4s/superglobals/Session],[j4s/superglobals/Superglobals]%5E-[j4s/superglobals/Cookie],[j4s/superglobals/SuperglobalInterface]%5E-.-[j4s/superglobals/Cookie])