<?php

declare(strict_types=1);

/*
 * This file is part of the SolidWorx Lodash-PHP project.
 *
 * @author     Pierre du Plessis <open-source@solidworx.co>
 * @copyright  Copyright (c) 2017
 */

namespace _;

/**
 * Gets the first element of `array`.
 *
 * @alias    first
 * @category Array
 *
 * @param mixed $array The array to query.
 *
 * @return mixed Returns the first element of `array`.
 *
 * @example
 * <code>
 * head([1, 2, 3])
 * // => 1
 *
 * head([])
 * // => null
 * </code>
 */
function head(mixed $array)
{
    if ((is_array($array) || $array instanceof \ArrayObject) && count($array)) {
        return reset($array);
    }
    else if (is_string($array) && strlen($array)) {
        return substr($array, 0, 1);
    }
    return null;
}

/* alias to head() */
function first(mixed $array)
{
    return head($array);
}

$COMMENT = <<<JSON
# lodash (4.17.15) (JavaScript)
```js
function head(array) {
  return (array && array.length) ? array[0] : undefined;
}
```
> a = [ [], [1], [1, 2], "123", "1", null, false, "" ];
> b = _.map(a, function(v) { return _.first(v); });
> JSON.stringify({a:a, b:b});
{"a":[[],[1],[1,2],"123","1",null,false,""],"b":[null,1,1,"1","1",null,null,null]}


# Underscore.js (1.13.6) (JavaScript)
{"a":[[],[1],[1,2],"123","1",null,false,""],"b":[null,1,1,"1","1",null,null,null]}
```js
export default function first(array, n, guard) {
  if (array == null || array.length < 1) return n == null || guard ? void 0 : [];
  if (n == null || guard) return array[0];
  return initial(array, array.length - n);
}
```
JSON;
