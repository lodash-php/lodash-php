# Lodash-PHP

Lodash-PHP is a port of the [Lodash JS library](https://lodash.com/) to PHP. It is a set of easy to use utility functions for everyday PHP projects.

Lodash-PHP tries to mimick lodash.js as close as possible

# Installation

Install Lodash-PHP through composer:

```bash
$ composer require lodash-php/lodash-php
```

# Usage

Each method in Lodash-PHP is a separate function that can be imported and used on it's own.

```php
<?php

use function _\each;

each([1, 2, 3], function (int $item) {
    var_dump($item);
});
```

Lodash-PHP also comes with a global `_` class that can be used globally.

```php
<?php

_::each([1, 2, 3], function (int $item) {
    var_dump($item);
});
```

# Methods
- [Array](#array)
- [Collection](#collection)
- [Date](#date)
- [Lang](#lang)
- [Number](#number)
- [String](#string)
- [Util](#util)

## Array

### chunk

Creates an array of elements split into groups the length of `size`.

If `array` can't be split evenly, the final chunk will be the remaining
elements.

**Arguments:**

@param array $array array The array to process.

@param int $number [size=1] The length of each chunk



**Return:**

@return array Returns the new array of chunks.

Example:
```php
<?php
 use function _\chunk;

chunk(['a', 'b', 'c', 'd'], 2)
// => [['a', 'b'], ['c', 'd']]

chunk(['a', 'b', 'c', 'd'], 3)
// => [['a', 'b', 'c'], ['d']]

```
### compact

Creates an array with all falsey values removed. The values `false`, `null`,
`0`, `""`, `undefined`, and `NaN` are falsey.



**Arguments:**

@param array $array The array to compact.



**Return:**

@return array Returns the new array of filtered values.

Example:
```php
<?php
 use function _\compact;

compact([0, 1, false, 2, '', 3])
// => [1, 2, 3]

```
### concat

Creates a new array concatenating `array` with any additional arrays
and/or values.



**Arguments:**

@param array $array The array to concatenate.

@param mixed $values The values to concatenate.



**Return:**

@return array Returns the new concatenated array.

Example:
```php
<?php
 use function _\concat;

$array = [1];
$other = concat($array, 2, [3], [[4]]);

var_dump(other)
// => [1, 2, 3, [4]]

var_dump(array)
// => [1]

```
### difference

Creates an array of `array` values not included in the other given arrays
using [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
for equality comparisons. The order and references of result values are
determined by the first array.

**Note:** Unlike `pullAll`, this method returns a new array.

**Arguments:**

@param array $array The array to inspect.

@param array $values The values to exclude.



**Return:**

@return array Returns the new array of filtered values.

Example:
```php
<?php
 use function _\difference;

difference([2, 1], [2, 3])
// => [1]

```
### differenceBy

This method is like `difference` except that it accepts `iteratee` which
is invoked for each element of `array` and `values` to generate the criterion
by which they're compared. The order and references of result values are
determined by the first array. The iteratee is invoked with one argument:
(value).

**Note:** Unlike `pullAllBy`, this method returns a new array.

**Arguments:**

@param array $array The array to inspect.

@param array $values The values to exclude.

@param callable $ iteratee The iteratee invoked per element.



**Return:**

@return array Returns the new array of filtered values.

Example:
```php
<?php
 use function _\differenceBy;
differenceBy([2.1, 1.2], [2.3, 3.4], 'floor')
// => [1.2]
```
### differenceWith

This method is like `difference` except that it accepts `comparator`
which is invoked to compare elements of `array` to `values`. The order and
references of result values are determined by the first array. The comparator
is invoked with two arguments: (arrVal, othVal).

**Note:** Unlike `pullAllWith`, this method returns a new array.

**Arguments:**

@param array $array The array to inspect.

@param array[] $values The values to exclude.

@param callable $comparator The comparator invoked per element.



**Return:**

@return array Returns the new array of filtered values.

Example:
```php
<?php
 use function _\differenceWith;

$objects = [[ 'x' => 1, 'y' => 2 ], [ 'x' => 2, 'y' => 1 ]]

differenceWith($objects, [[ 'x' => 1, 'y' => 2 ]], '_::isEqual')
// => [[ 'x' => 2, 'y' => 1 ]]

```
### drop

Creates a slice of `array` with `n` elements dropped from the beginning.

**NOTE:** This function will reorder and reset the array indices

**Arguments:**

@param array $array The array to query.

@param int $n The number of elements to drop.



**Return:**

@return array the slice of `array`.

Example:
```php
<?php
 use function _\drop;

drop([1, 2, 3])
// => [2, 3]

drop([1, 2, 3], 2)
// => [3]

drop([1, 2, 3], 5)
// => []

drop([1, 2, 3], 0)
// => [1, 2, 3]

```
### dropRight

Creates a slice of `array` with `n` elements dropped from the end.

**NOTE:** This function will reorder and reset the array indices

**Arguments:**

@param array $array The array to query.

@param int $n The number of elements to drop.



**Return:**

@return array the slice of `array`.

Example:
```php
<?php
 use function _\dropRight;

dropRight([1, 2, 3])
// => [1, 2]

dropRight([1, 2, 3], 2)
// => [1]

dropRight([1, 2, 3], 5)
// => []

dropRight([1, 2, 3], 0)
// => [1, 2, 3]

```
### dropRightWhile

Creates a slice of `array` excluding elements dropped from the end.

Elements are dropped until `predicate` returns falsey. The predicate is
invoked with three arguments: (value, index, array).

**Arguments:**

@param array $array The array to query.

@param callable $predicate The function invoked per iteration.



**Return:**

@return array the slice of `array`.

Example:
```php
<?php
 use function _\dropRightWhile;

$users = [
  [ 'user' => 'barney',  'active' => false ],
  [ 'user' => 'fred',    'active' => true ],
  [ 'user' => 'pebbles', 'active' => true ]
]

dropRightWhile($users, function($user) { return $user['active']; })
// => objects for ['barney']

```
### dropWhile

Creates a slice of `array` excluding elements dropped from the beginning.

Elements are dropped until `predicate` returns falsey. The predicate is
invoked with three arguments: (value, index, array).

**Arguments:**

@param array $array The array to query.

@param callable $predicate The function invoked per iteration.



**Return:**

@return array the slice of `array`.

Example:
```php
<?php
 use function _\dropWhile;

$users = [
  [ 'user' => 'barney',  'active' => true ],
  [ 'user' => 'fred',    'active' => true ],
  [ 'user' => 'pebbles', 'active' => false ]
]

dropWhile($users, function($user) { return $user['active']; } )
// => objects for ['pebbles']

```
### findIndex

This method is like `find` except that it returns the index of the first element predicate returns truthy for instead of the element itself.



**Arguments:**

@param array $array The array to inspect.

@param callable $predicate The function invoked per iteration.

@param int $fromIndex The index to search from.



**Return:**

@return int the index of the found element, else `-1`.

Example:
```php
<?php
 use function _\findIndex;

$users = [
    ['user' => 'barney',  'active' => false],
    ['user' => 'fred',    'active' => false],
    ['user' => 'pebbles', 'active' => true],
];

findIndex($users, function($o) { return $o['user'] s== 'barney'; });
// => 0

// The `matches` iteratee shorthand.
findIndex($users, ['user' => 'fred', 'active' => false]);
// => 1

// The `matchesProperty` iteratee shorthand.
findIndex($users, ['active', false]);
// => 0

// The `property` iteratee shorthand.
findIndex($users, 'active');
// => 2

```
### findLastIndex

This method is like `findIndex` except that it iterates over elements
of `collection` from right to left.



**Arguments:**

@param array $array The array to inspect.

@param mixed $predicate The function invoked per iteration.

@param int $fromIndex The index to search from.



**Return:**

@return int the index of the found element, else `-1`.

Example:
```php
<?php
 use function _\findLastIndex;

$users = [
  ['user' => 'barney',  'active' => true ],
  ['user' => 'fred',    'active' => false ],
  ['user' => 'pebbles', 'active' => false ]
]

findLastIndex($users, function($user) { return $user['user'] === 'pebbles'; })
// => 2

```
### flatten

Flattens `array` a single level deep.



**Arguments:**

@param array $array The array to flatten.



**Return:**

@return array the new flattened array.

Example:
```php
<?php
 use function _\flatten;
flatten([1, [2, [3, [4]], 5]])
// => [1, 2, [3, [4]], 5]
```
### flattenDeep

Recursively flattens `array`.



**Arguments:**

@param array $array The array to flatten.



**Return:**

@return array Returns the new flattened array.

Example:
```php
<?php
 use function _\flattenDeep;

flattenDeep([1, [2, [3, [4]], 5]]);
// => [1, 2, 3, 4, 5]

```
### flattenDepth

Recursively flatten `array` up to `depth` times.



**Arguments:**

@param array $array The array to flatten.

@param int $depth The maximum recursion depth.



**Return:**

@return array the new flattened array.

Example:
```php
<?php
 use function _\flattenDepth;

$array = [1, [2, [3, [4]], 5]]

flattenDepth($array, 1)
// => [1, 2, [3, [4]], 5]

flattenDepth($array, 2)
// => [1, 2, 3, [4], 5]

```
### fromPairs

The inverse of `toPairs`, this method returns an object composed
from key-value `pairs`.



**Arguments:**

@param array $pairs The key-value pairs.



**Return:**

@return object the new object.

Example:
```php
<?php
 use function _\fromPairs;

fromPairs([['a', 1], ['b', 2]])
// => stdClass(
// 'a' => 1,
//'b' => 2,
// )

```
### head

Gets the first element of `array`.



**Arguments:**

@param array $array The array to query.



**Return:**

@return mixed Returns the first element of `array`.

Example:
```php
<?php
 use function _\head;

head([1, 2, 3])
// => 1

head([])
// => null

```
### indexOf

Gets the index at which the first occurrence of `value` is found in `array`
using [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
for equality comparisons. If `fromIndex` is negative, it's used as the
offset from the end of `array`.



**Arguments:**

@param array $array The array to inspect.

@param mixed $value The value to search for.

@param int $fromIndex The index to search from.



**Return:**

@return int the index of the matched value, else `-1`.

Example:
```php
<?php
 use function _\indexOf;

indexOf([1, 2, 1, 2], 2)
// => 1

// Search from the `fromIndex`.
indexOf([1, 2, 1, 2], 2, 2)
// => 3

```
### initial

Gets all but the last element of `array`.



**Arguments:**

@param array $array The array to query.



**Return:**

@return array the slice of `array`.

Example:
```php
<?php
 use function _\initial;
initial([1, 2, 3])
// => [1, 2]
```
### intersection

Creates an array of unique values that are included in all given arrays
using [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
for equality comparisons. The order and references of result values are
determined by the first array.



**Arguments:**

@param array[] $arrays



**Return:**

@return array the new array of intersecting values.

Example:
```php
<?php
 use function _\intersection;
intersection([2, 1], [2, 3])
// => [2]
```
### intersectionBy

This method is like `intersection` except that it accepts `iteratee`
which is invoked for each element of each `arrays` to generate the criterion
by which they're compared. The order and references of result values are
determined by the first array. The iteratee is invoked with one argument:
(value).



**Arguments:**

@param array[] $arrays

@param callable $iteratee The iteratee invoked per element.



**Return:**

@return array the new array of intersecting values.

Example:
```php
<?php
 use function _\intersectionBy;

intersectionBy([2.1, 1.2], [2.3, 3.4], Math.floor)
// => [2.1]

// The `property` iteratee shorthand.
intersectionBy([[ 'x' => 1 ]], [[ 'x' => 2 ], [ 'x' => 1 ]], 'x');
// => [[ 'x' => 1 ]]

```
### intersectionWith

This method is like `intersection` except that it accepts `comparator`
which is invoked to compare elements of `arrays`. The order and references
of result values are determined by the first array. The comparator is
invoked with two arguments: (arrVal, othVal).



**Arguments:**

@param array[] $arrays

@param callable $comparator The comparator invoked per element.



**Return:**

@return array the new array of intersecting values.

Example:
```php
<?php
 use function _\intersectionWith;

$objects = [[ 'x' => 1, 'y' => 2 ], [ 'x' => 2, 'y' => 1 ]]
$others = [[ 'x' => 1, 'y' => 1 ], [ 'x' => 1, 'y' => 2 ]]

intersectionWith($objects, $others, '_::isEqual')
// => [[ 'x' => 1, 'y' => 2 ]]

```
### last

Gets the last element of `array`.



**Arguments:**

@param array $array The array to query.



**Return:**

@return mixed Returns the last element of `array`.

Example:
```php
<?php
 use function _\last;

last([1, 2, 3])
// => 3

```
### lastIndexOf

This method is like `indexOf` except that it iterates over elements of
`array` from right to left.



**Arguments:**

@param array $array The array to inspect.

@param mixed $value The value to search for.

@param int $fromIndex The index to search from.



**Return:**

@return int the index of the matched value, else `-1`.

Example:
```php
<?php
 use function _\lastIndexOf;

lastIndexOf([1, 2, 1, 2], 2)
// => 3

// Search from the `fromIndex`.
lastIndexOf([1, 2, 1, 2], 2, 2)
// => 1

```
### nth

Gets the element at index `n` of `array`. If `n` is negative, the nth
element from the end is returned.



**Arguments:**

@param array $array The array to query.

@param int $n The index of the element to return.



**Return:**

@return mixed Returns the nth element of `array`.

Example:
```php
<?php
 use function _\nth;
$array = ['a', 'b', 'c', 'd']

nth($array, 1)
// => 'b'

nth($array, -2)
// => 'c'
```
### pull

Removes all given values from `array` using
[`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
for equality comparisons.

**Note:** Unlike `without`, this method mutates `array`. Use `remove`
to remove elements from an array by predicate.

**Arguments:**

@param array $array The array to modify.

@param array $values The values to remove.



**Return:**

@return array

Example:
```php
<?php
 use function _\pull;

$array = ['a', 'b', 'c', 'a', 'b', 'c']

pull($array, 'a', 'c')
var_dump($array)
// => ['b', 'b']

```
### pullAll

This method is like `pull` except that it accepts an array of values to remove.

**Note:** Unlike `difference`, this method mutates `array`.

**Arguments:**

@param array $array The array to modify.

@param array $values The values to remove.



**Return:**

@return array `array`.

Example:
```php
<?php
 use function _\pullAll;

$array = ['a', 'b', 'c', 'a', 'b', 'c']

pullAll($array, ['a', 'c'])
var_dump($array)
// => ['b', 'b']

```
### pullAllBy

This method is like `pullAll` except that it accepts `iteratee` which is
invoked for each element of `array` and `values` to generate the criterion
by which they're compared. The iteratee is invoked with one argument: (value).

**Note:** Unlike `differenceBy`, this method mutates `array`.

**Arguments:**

@param array $array The array to modify.

@param array $values The values to remove.

@param callable $iteratee The iteratee invoked per element.



**Return:**

@return array `array`.

Example:
```php
<?php
 use function _\pullAllBy;
$array = [[ 'x' => 1 ], [ 'x' => 2 ], [ 'x' => 3 ], [ 'x' => 1 ]]

pullAllBy($array, [[ 'x' => 1 ], [ 'x' => 3 ]], 'x')
var_dump($array)
// => [[ 'x' => 2 ]]
```
### pullAllWith

This method is like `pullAll` except that it accepts `comparator` which
is invoked to compare elements of `array` to `values`. The comparator is
invoked with two arguments: (arrVal, othVal).

**Note:** Unlike `differenceWith`, this method mutates `array`.

**Arguments:**

@param array $array The array to modify.

@param array $values The values to remove.

@param callable $comparator The comparator invoked per element.



**Return:**

@return array `array`.

Example:
```php
<?php
 use function _\pullAllWith;

$array = [[ 'x' => 1, 'y' => 2 ], [ 'x' => 3, 'y' => 4 ], [ 'x' => 5, 'y' => 6 ]]

pullAllWith($array, [[ 'x' => 3, 'y' => 4 ]], '_\isEqual')
var_dump($array)
// => [[ 'x' => 1, 'y' => 2 ], [ 'x' => 5, 'y' => 6 ]]

```
### pullAt

Removes elements from `array` corresponding to `indexes` and returns an
array of removed elements.

**Note:** Unlike `at`, this method mutates `array`.

**Arguments:**

@param array $array The array to modify.

@param int|int[] $indexes The indexes of elements to remove.



**Return:**

@return array the new array of removed elements.

Example:
```php
<?php
 use function _\pullAt;

$array = ['a', 'b', 'c', 'd']
$pulled = pullAt($array, [1, 3])

var_dump($array)
// => ['a', 'c']

var_dump($pulled)
// => ['b', 'd']

```
### remove

Removes all elements from `array` that `predicate` returns truthy for
and returns an array of the removed elements. The predicate is invoked
with three arguments: (value, index, array).

**Note:** Unlike `filter`, this method mutates `array`. Use `pull`
to pull elements from an array by value.

**Arguments:**

@param array $array The array to modify.

@param callable $predicate The function invoked per iteration.



**Return:**

@return array the new array of removed elements.

Example:
```php
<?php
 use function _\remove;
$array = [1, 2, 3, 4]
$evens = remove($array, function ($n) { return $n % 2 === 0; })

var_dump($array)
// => [1, 3]

var_dump($evens)
// => [2, 4]
```
### slice

Creates a slice of `array` from `start` up to, but not including, `end`.



**Arguments:**

@param array $array The array to slice.

@param int $start The start position.

@param int $end The end position.



**Return:**

@return array the slice of `array`.

### tail

Gets all but the first element of `array`.



**Arguments:**

@param array $array The array to query.



**Return:**

@return array the slice of `array`.

Example:
```php
<?php
 use function _\tail;

tail([1, 2, 3])
// => [2, 3]

```
### take

Creates a slice of `array` with `n` elements taken from the beginning.



**Arguments:**

@param array $array The array to query.

@param int $n The number of elements to take.



**Return:**

@return array the slice of `array`.

Example:
```php
<?php
 use function _\take;

take([1, 2, 3])
// => [1]

take([1, 2, 3], 2)
// => [1, 2]

take([1, 2, 3], 5)
// => [1, 2, 3]

take([1, 2, 3], 0)
// => []

```
### takeRight

Creates a slice of `array` with `n` elements taken from the end.



**Arguments:**

@param array $array The array to query.

@param int $n The number of elements to take.



**Return:**

@return array the slice of `array`.

Example:
```php
<?php
 use function _\takeRight;

takeRight([1, 2, 3])
// => [3]

takeRight([1, 2, 3], 2)
// => [2, 3]

takeRight([1, 2, 3], 5)
// => [1, 2, 3]

takeRight([1, 2, 3], 0)
// => []

```
### takeRightWhile

Creates a slice of `array` with elements taken from the end. Elements are
taken until `predicate` returns falsey. The predicate is invoked with
three arguments: (value, index, array).



**Arguments:**

@param array $array The array to query.

@param callable $predicate The function invoked per iteration.



**Return:**

@return array the slice of `array`.

Example:
```php
<?php
 use function _\takeRightWhile;

$users = [
  [ 'user' => 'barney',  'active' => false ],
  [ 'user' => 'fred',    'active' => true ],
  [ 'user' => 'pebbles', 'active' => true ]
];

takeRightWhile($users, function($value) { return $value['active']; })
// => objects for ['fred', 'pebbles']

```
### takeWhile

Creates a slice of `array` with elements taken from the beginning. Elements
are taken until `predicate` returns falsey. The predicate is invoked with
three arguments: (value, index, array).



**Arguments:**

@param array $array The array to query.

@param mixed $predicate The function invoked per iteration.



**Return:**

@return array the slice of `array`.

Example:
```php
<?php
 use function _\takeWhile;

$users = [
  [ 'user' => 'barney',  'active' => true ],
  [ 'user' => 'fred',    'active' => true ],
  [ 'user' => 'pebbles', 'active' => false ]
]

takeWhile($users, function($value) { return $value['active']; })
// => objects for ['barney', 'fred']

```
### union

Creates an array of unique values, in order, from all given arrays using
[`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
for equality comparisons.



**Arguments:**

@param array[] $arrays The arrays to inspect.



**Return:**

@return array the new array of combined values.

Example:
```php
<?php
 use function _\union;

union([2], [1, 2])
// => [2, 1]

```
## Collection

### each

Iterates over elements of `collection` and invokes `iteratee` for each element.

The iteratee is invoked with three arguments: (value, index|key, collection).
Iteratee functions may exit iteration early by explicitly returning `false`.

**Note:** As with other "Collections" methods, objects with a "length"
property are iterated like arrays. To avoid this behavior use `forIn`
or `forOwn` for object iteration.

**Arguments:**

@param array|object $collection The collection to iterate over.

@param callable $iteratee The function invoked per iteration.



**Return:**

@return array|object Returns `collection`.

Example:
```php
<?php
 use function _\each;

each([1, 2], function ($value) { echo $value; })
// => Echoes `1` then `2`.

each((object) ['a' => 1, 'b' => 2], function ($value, $key) { echo $key; });
// => Echoes 'a' then 'b' (iteration order is not guaranteed).

```
### map

Creates an array of values by running each element in `collection` through
`iteratee`. The iteratee is invoked with three arguments:
(value, index|key, collection).

Many lodash-php methods are guarded to work as iteratees for methods like
`_::every`, `_::filter`, `_::map`, `_::mapValues`, `_::reject`, and `_::some`.

The guarded methods are:
`ary`, `chunk`, `curry`, `curryRight`, `drop`, `dropRight`, `every`,
`fill`, `invert`, `parseInt`, `random`, `range`, `rangeRight`, `repeat`,
`sampleSize`, `slice`, `some`, `sortBy`, `split`, `take`, `takeRight`,
`template`, `trim`, `trimEnd`, `trimStart`, and `words`

**Arguments:**

@param array|object $collection The collection to iterate over.

@param callable|string|array $iteratee The function invoked per iteration.



**Return:**

@return array Returns the new mapped array.

Example:
```php
<?php
 use function _\map;

function square(int $n) {
  return $n * $n;
}

map([4, 8], $square);
// => [16, 64]

map((object) ['a' => 4, 'b' => 8], $square);
// => [16, 64] (iteration order is not guaranteed)

$users = [
  [ 'user' => 'barney' ],
  [ 'user' => 'fred' ]
];

// The `property` iteratee shorthand.
map($users, 'user');
// => ['barney', 'fred']

```
### sortBy

Creates an array of elements, sorted in ascending order by the results of
running each element in a collection through each iteratee. This method
performs a stable sort, that is, it preserves the original sort order of
equal elements. The iteratees are invoked with one argument: (value).



**Arguments:**

@param array|object $collection The collection to iterate over.

@param callable|callable[] $iteratees The iteratees to sort by.



**Return:**

@return array Returns the new sorted array.

Example:
```php
<?php
 use function _\sortBy;

$users = [
  [ 'user' => 'fred',   'age' => 48 ],
  [ 'user' => 'barney', 'age' => 36 ],
  [ 'user' => 'fred',   'age' => 40 ],
  [ 'user' => 'barney', 'age' => 34 ],
];

sortBy($users, [function($o) { return $o['user']; }]);
// => [['user' => 'barney', 'age' => 36], ['user' => 'barney', 'age' => 34], ['user' => 'fred', 'age' => 48], ['user' => 'fred', 'age' => 40]]

sortBy($users, ['user', 'age']);
// => [['user' => 'barney', 'age' => 34], ['user' => 'barney', 'age' => 36], ['user' => 'fred', 'age' => 40], ['user' => 'fred', 'age' => 48]]

```
## Date

### now

Gets the timestamp of the number of milliseconds that have elapsed since the Unix epoch (1 January 1970 00:00:00 UTC).



**Arguments:**



**Return:**

@return int Returns the timestamp.

Example:
```php
<?php
 use function _\now;

now();
// => 1511180325735

```
## Lang

### isEqual

Performs a deep comparison between two values to determine if they are
equivalent.

**Note:** This method supports comparing arrays, booleans,
DateTime objects, exception objects, SPLObjectStorage, numbers,
strings, typed arrays, resources, DOM Nodes. objects are compared
by their own, not inherited, enumerable properties.

**Arguments:**

@param mixed $value The value to compare.

@param mixed $other The other value to compare.



**Return:**

@return bool Returns `true` if the values are equivalent, else `false`.

Example:
```php
<?php
 use function _\isEqual;


$object = [ 'a' => 1]
$other = ['a' => '1']

isEqual($object, $other)
// => true

$object === $other
// => false

```
### isError

Checks if `value` is an `\Exception`, `\ParseError`, \Error`, \Throwable`, \SoapFault`, \DOMException`, \PDOException`, object.



**Arguments:**

@param mixed $value The value to check.



**Return:**

@return bool Returns `true` if `value` is an error object, else `false`.

Example:
```php
<?php
 use function _\isError;

isError(new \Exception())
// => true

isError(\Exception::Class)
// => false
```
## Number

### clamp

Clamps `number` within the inclusive `lower` and `upper` bounds.



**Arguments:**

@param int $ number The number to clamp.

@param int $ lower The lower bound.

@param int $ upper The upper bound.



**Return:**

@return int Returns the clamped number.

Example:
```php
<?php
 use function _\clamp;

clamp(-10, -5, 5)
// => -5

clamp(10, -5, 5)
// => 5

```
### inRange

Checks if `number` is between `start` and up to, but not including, `end`. If
`end` is not specified, it's set to `start` with `start` then set to `0`.

If `start` is greater than `end` the params are swapped to support
negative ranges.

**Arguments:**

@param float $ number The number to check.

@param float $start The start of the range.

@param float $end The end of the range.



**Return:**

@return bool Returns `true` if `number` is in the range, else `false`.

Example:
```php
<?php
 use function _\inRange;

inRange(3, 2, 4)
// => true

inRange(4, 8)
// => true

inRange(4, 2)
// => false

inRange(2, 2)
// => false

inRange(1.2, 2)
// => true

inRange(5.2, 4)
// => false

inRange(-3, -2, -6)
// => true

```
### random

Produces a random number between the inclusive `lower` and `upper` bounds.

If only one argument is provided a number between `0` and the given number
is returned. If `floating` is `true`, or either `lower` or `upper` are
floats, a floating-point number is returned instead of an integer.

**Arguments:**

@param int|float $lower The lower bound.

@param int|float $upper The upper bound.

@param bool $floating Specify returning a floating-point number.



**Return:**

@return int|float Returns the random number.

Example:
```php
<?php
 use function _\random;
random(0, 5)
// => an integer between 0 and 5

random(5)
// => also an integer between 0 and 5

random(5, true)
// => a floating-point number between 0 and 5

random(1.2, 5.2)
// => a floating-point number between 1.2 and 5.2
```
## String

### camelCase

Converts `string` to [camel case](https://en.wikipedia.org/wiki/CamelCase).



**Arguments:**

@param string $string The string to convert.



**Return:**

@return string Returns the camel cased string.

Example:
```php
<?php
 use function _\camelCase;

camelCase('Foo Bar')
// => 'fooBar'

camelCase('--foo-bar--')
// => 'fooBar'

camelCase('__FOO_BAR__')
// => 'fooBar'

```
### capitalize

Converts the first character of `string` to upper case and the remaining
to lower case.



**Arguments:**

@param string $string The string to capitalize.



**Return:**

@return string Returns the capitalized string.

Example:
```php
<?php
 use function _\capitalize;

capitalize('FRED')
// => 'Fred'

```
### deburr

Deburrs `string` by converting
[Latin-1 Supplement](https =>//en.wikipedia.org/wiki/Latin-1_Supplement_(Unicode_block)#Character_table)
and [Latin Extended-A](https =>//en.wikipedia.org/wiki/Latin_Extended-A)
letters to basic Latin letters and removing
[combining diacritical marks](https =>//en.wikipedia.org/wiki/Combining_Diacritical_Marks).



**Arguments:**

@param string $string The string to deburr.



**Return:**

@return string Returns the deburred string.

Example:
```php
<?php
 use function _\deburr;
deburr('déjà vu')
// => 'deja vu'
```
### endsWith

Checks if `string` ends with the given target string.



**Arguments:**

@param string $string The string to inspect.

@param string $target The string to search for.

@param int $position The position to search up to.



**Return:**

@return bool Returns `true` if `string` ends with `target`, else `false`.

Example:
```php
<?php
 use function _\endsWith;

endsWith('abc', 'c')
// => true

endsWith('abc', 'b')
// => false

endsWith('abc', 'b', 2)
// => true

```
### escape

Converts the characters "&", "<", ">", '"', and "'" in `string` to their
corresponding HTML entities.

Though the ">" character is escaped for symmetry, characters like
">" and "/" don't need escaping in HTML and have no special meaning
unless they're part of a tag or unquoted attribute value. See
[Mathias Bynens's article](https://mathiasbynens.be/notes/ambiguous-ampersands)
(under "semi-related fun fact") for more details.

When working with HTML you should always
[quote attribute values](http://wonko.com/post/html-escaping) to reduce
XSS vectors.

**Arguments:**

@param string $string The string to escape.



**Return:**

@return string Returns the escaped string.

Example:
```php
<?php
 use function _\escape;

escape('fred, barney, & pebbles')
// => 'fred, barney, &amp pebbles'

```
### escapeRegExp

Escapes the `RegExp` special characters "^", "$", "\", ".", "*", "+",
"?", "(", ")", "[", "]", "{", "}", and "|" in `string`.



**Arguments:**

@param string $string The string to escape.



**Return:**

@return string Returns the escaped string.

Example:
```php
<?php
 use function _\escapeRegExp;

escapeRegExp('[lodash](https://lodash.com/)')
// => '\[lodash\]\(https://lodash\.com/\)'

```
### kebabCase

Converts `string` to
[kebab case](https://en.wikipedia.org/wiki/Letter_case#Special_case_styles).



**Arguments:**

@param string $string The string to convert.



**Return:**

@return string Returns the kebab cased string.

Example:
```php
<?php
 use function _\kebabCase;

kebabCase('Foo Bar')
// => 'foo-bar'

kebabCase('fooBar')
// => 'foo-bar'

kebabCase('__FOO_BAR__')
// => 'foo-bar'

```
### lowerCase

Converts `string`, as space separated words, to lower case.



**Arguments:**

@param string $string The string to convert.



**Return:**

@return string Returns the lower cased string.

Example:
```php
<?php
 use function _\lowerCase;

lowerCase('--Foo-Bar--')
// => 'foo bar'

lowerCase('fooBar')
// => 'foo bar'

lowerCase('__FOO_BAR__')
// => 'foo bar'

```
### lowerFirst

Converts the first character of `string` to lower case.



**Arguments:**

@param string $string The string to convert.



**Return:**

@return string Returns the converted string.

Example:
```php
<?php
 use function _\lowerFirst;

lowerFirst('Fred')
// => 'fred'

lowerFirst('FRED')
// => 'fRED'

```
### pad

Pads `string` on the left and right sides if it's shorter than `length`.

Padding characters are truncated if they can't be evenly divided by `length`.

**Arguments:**

@param string $string The string to pad.

@param int $length The padding length.

@param string $chars The string used as padding.



**Return:**

@return string Returns the padded string.

Example:
```php
<?php
 use function _\pad;

pad('abc', 8)
// => '  abc   '

pad('abc', 8, '_-')
// => '_-abc_-_'

pad('abc', 2)
// => 'abc'

```
### padEnd

Pads `string` on the right side if it's shorter than `length`. Padding
characters are truncated if they exceed `length`.



**Arguments:**

@param string $string The string to pad.

@param int $length The padding length.

@param string $chars The string used as padding.



**Return:**

@return string Returns the padded string.

Example:
```php
<?php
 use function _\padEnd;

padEnd('abc', 6)
// => 'abc   '

padEnd('abc', 6, '_-')
// => 'abc_-_'

padEnd('abc', 2)
// => 'abc'

```
### padStart

Pads `string` on the left side if it's shorter than `length`. Padding
characters are truncated if they exceed `length`.



**Arguments:**

@param string $string ='' The string to pad.

@param int $length The padding length.

@param string $chars The string used as padding.



**Return:**

@return string Returns the padded string.

Example:
```php
<?php
 use function _\padStart;

padStart('abc', 6)
// => '   abc'

padStart('abc', 6, '_-')
// => '_-_abc'

padStart('abc', 2)
// => 'abc'
s
```
### parseInt

Converts `string` to an integer of the specified radix. If `radix` is
`undefined` or `0`, a `radix` of `10` is used unless `string` is a
hexadecimal, in which case a `radix` of `16` is used.

**Note:** This method uses PHP's built-in integer casting, which does not necessarily align with the
[ES5 implementation](https://es5.github.io/#x15.1.2.2) of `parseInt`.

**Arguments:**

@param int|float|string $string The string to convert.

@param int $radix The radix to interpret `string` by.



**Return:**

@return int Returns the converted integer.

Example:
```php
<?php
 use function _\parseInt;

parseInt('08')
// => 8

```
### repeat

Repeats the given string `n` times.



**Arguments:**

@param string $string The string to repeat.

@param int $n The number of times to repeat the string.



**Return:**

@return string Returns the repeated string.

Example:
```php
<?php
 use function _\repeat;

repeat('*', 3)
// => '***'

repeat('abc', 2)
// => 'abcabc'

repeat('abc', 0)
// => ''

```
### replace

Replaces matches for `pattern` in `string` with `replacement`.

**Note:** This method is based on
[`String#replace`](https://mdn.io/String/replace).

**Arguments:**

@param string $string The string to modify.

@param string $pattern The pattern to replace.

@param callable|string $ replacement The match replacement.



**Return:**

@return string Returns the modified string.

Example:
```php
<?php
 use function _\replace;

replace('Hi Fred', 'Fred', 'Barney')
// => 'Hi Barney'

```
### snakeCase

Converts `string` to
[snake case](https://en.wikipedia.org/wiki/Snake_case).



**Arguments:**

@param string $string The string to convert.



**Return:**

@return string Returns the snake cased string.

Example:
```php
<?php
 use function _\snakeCase;
snakeCase('Foo Bar')
// => 'foo_bar'

snakeCase('fooBar')
// => 'foo_bar'

snakeCase('--FOO-BAR--')
// => 'foo_bar'
```
### split

Splits `string` by `separator`.

**Note:** This method is based on
[`String#split`](https://mdn.io/String/split).

**Arguments:**

@param string $ string The string to split.

@param string $separator The separator pattern to split by.

@param int $limit The length to truncate results to.



**Return:**

@return array Returns the string segments.

Example:
```php
<?php
 use function _\split;

split('a-b-c', '-', 2)
// => ['a', 'b']

```
### startCase

Converts `string` to
[start case](https://en.wikipedia.org/wiki/Letter_case#Stylistic_or_specialised_usage).



**Arguments:**

@param string $string The string to convert.



**Return:**

@return string Returns the start cased string.

Example:
```php
<?php
 use function _\startCase;

startCase('--foo-bar--')
// => 'Foo Bar'

startCase('fooBar')
// => 'Foo Bar'

startCase('__FOO_BAR__')
// => 'FOO BAR'

```
### startsWith

Checks if `string` starts with the given target string.



**Arguments:**

@param string $string The string to inspect.

@param string $target The string to search for.

@param int $position The position to search from.



**Return:**

@return bool Returns `true` if `string` starts with `target`, else `false`.

Example:
```php
<?php
 use function _\startsWith;

startsWith('abc', 'a')
// => true

startsWith('abc', 'b')
// => false

startsWith('abc', 'b', 1)
// => true

```
### template

Creates a compiled template function that can interpolate data properties
in "interpolate" delimiters, HTML-escape interpolated data properties in
"escape" delimiters, and execute PHP in "evaluate" delimiters. Data
properties may be accessed as free variables in the template. If a setting
object is given, it takes precedence over `$templateSettings` values.



**Arguments:**

@param string $string The template string.

@param array $options The options array.
RegExp $options['escape'] = _::$templateSettings['escape'] The HTML "escape" delimiter.
RegExp $options['evaluate'] = _::$templateSettings['evaluate'] The "evaluate" delimiter.
array  $options['imports'] = _::$templateSettings['imports'] An object to import into the template as free variables.
RegExp $options['interpolate'] = _::$templateSettings['interpolate'] The "interpolate" delimiter.



**Return:**

@return callable Returns the compiled template function.

Example:
```php
<?php
 use function _\template;

// Use the "interpolate" delimiter to create a compiled template.
$compiled = template('hello <%= user %>!')
$compiled([ 'user' => 'fred' ])
// => 'hello fred!'

// Use the HTML "escape" delimiter to escape data property values.
$compiled = template('<b><%- value %></b>')
$compiled([ 'value' => '<script>' ])
// => '<b>&lt;script&gt;</b>'

// Use the "evaluate" delimiter to execute JavaScript and generate HTML.
$compiled = template('<% foreach($users as $user) { %><li><%- user %></li><% }%>')
$compiled([ 'users' => ['fred', 'barney'] ])
// => '<li>fred</li><li>barney</li>'

// Use the internal `print` function in "evaluate" delimiters.
$compiled = template('<% print("hello " + $user)%>!')
$compiled([ 'user' => 'barney' ])
// => 'hello barney!'

// Use backslashes to treat delimiters as plain text.
$compiled = template('<%= "\\<%- value %\\>" %>')
$compiled([ 'value' => 'ignored' ])
// => '<%- value %>'

// Use the `imports` option to import functions or classes with aliases.
$text = '<% all($users, function($user) { %><li><%- user %></li><% })%>'
$compiled = template($text, { 'imports': { '_\each': 'all' } })
$compiled([ 'users' => ['fred', 'barney'] ])
// => '<li>fred</li><li>barney</li>'

// Use custom template delimiters.
\_::$templateSettings['interpolate'] = '{{([\s\S]+?)}}'
$compiled = template('hello {{ user }}!')
$compiled([ 'user' => 'mustache' ])
// => 'hello mustache!'

// Use the `source` property to access the compiled source of the template
template($mainText)->source;

```
### toLower

Converts `string`, as a whole, to lower case



**Arguments:**

@param string $string The string to convert.



**Return:**

@return string Returns the lower cased string.

Example:
```php
<?php
 use function _\toLower;

toLower('--Foo-Bar--')
// => '--foo-bar--'

toLower('fooBar')
// => 'foobar'

toLower('__FOO_BAR__')
// => '__foo_bar__'

```
### toUpper

Converts `string`, as a whole, to upper case



**Arguments:**

@param string $string The string to convert.



**Return:**

@return string Returns the upper cased string.

Example:
```php
<?php
 use function _\toUpper;

toUpper('--foo-bar--')
// => '--FOO-BAR--'

toUpper('fooBar')
// => 'FOOBAR'

toUpper('__foo_bar__')
// => '__FOO_BAR__'
```
### trim

Removes leading and trailing whitespace or specified characters from `string`.



**Arguments:**

@param string $string The string to trim.

@param string $chars The characters to trim.



**Return:**

@return string Returns the trimmed string.

Example:
```php
<?php
 use function _\trim;

trim('  abc  ')
// => 'abc'

trim('-_-abc-_-', '_-')
// => 'abc'

```
### trimEnd

Removes trailing whitespace or specified characters from `string`.



**Arguments:**

@param string $string The string to trim.

@param string $chars The characters to trim.



**Return:**

@return string Returns the trimmed string.

Example:
```php
<?php
 use function _\trimEnd;
trimEnd('  abc  ')
// => '  abc'

trimEnd('-_-abc-_-', '_-')
// => '-_-abc'
```
### trimStart

Removes leading whitespace or specified characters from `string`.



**Arguments:**

@param string $string The string to trim.

@param string $chars The characters to trim.



**Return:**

@return string Returns the trimmed string.

Example:
```php
<?php
 use function _\trimStart;

trimStart('  abc  ')
// => 'abc  '

trimStart('-_-abc-_-', '_-')
// => 'abc-_-'

```
### truncate

Truncates `string` if it's longer than the given maximum string length.

The last characters of the truncated string are replaced with the omission
string which defaults to "...".

**Arguments:**

@param string $string The string to truncate.

@param array $options The options object.
length = 30 The maximum string length.
omission = '...' The string to indicate text is omitted.
separator The separator pattern to truncate to.



**Return:**

@return string Returns the truncated string.

Example:
```php
<?php
 use function _\truncate;

truncate('hi-diddly-ho there, neighborino')
// => 'hi-diddly-ho there, neighbo...'

truncate('hi-diddly-ho there, neighborino', [
  'length' => 24,
  'separator' => ' '
])
// => 'hi-diddly-ho there,...'

truncate('hi-diddly-ho there, neighborino', [
  'length' => 24,
  'separator' => '/,? +/'
])
// => 'hi-diddly-ho there...'

truncate('hi-diddly-ho there, neighborino', [
  'omission' => ' [...]'
])
// => 'hi-diddly-ho there, neig [...]'

```
### unescape

The inverse of `escape`this method converts the HTML entities
`&amp;`, `&lt;`, `&gt;`, `&quot;` and `&#39;` in `string` to
their corresponding characters.



**Arguments:**

@param string $string The string to unescape.



**Return:**

@return string Returns the unescaped string.

Example:
```php
<?php
 use function _\unescape;

unescape('fred, barney, &amp; pebbles')
// => 'fred, barney, & pebbles'

```
### upperCase

Converts `string`, as space separated words, to upper case.



**Arguments:**

@param string $string The string to convert.



**Return:**

@return string Returns the upper cased string.s

Example:
```php
<?php
 use function _\upperCase;

upperCase('--foo-bar')
// => 'FOO BAR'

upperCase('fooBar')
// => 'FOO BAR'

upperCase('__foo_bar__')
// => 'FOO BAR'

```
### upperFirst

Converts the first character of `string` to upper case.



**Arguments:**

@param string $string The string to convert.



**Return:**

@return string Returns the converted string.

Example:
```php
<?php
 use function _\upperFirst;

upperFirst('fred')
// => 'Fred'

upperFirst('FRED')
// => 'FRED'

```
### words

Splits `string` into an array of its words.



**Arguments:**

@param string $string The string to inspect.

@param string $pattern The pattern to match words.



**Return:**

@return array Returns the words of `string`.

Example:
```php
<?php
 use function _\words;

words('fred, barney, & pebbles')
// => ['fred', 'barney', 'pebbles']

words('fred, barney, & pebbles', '/[^, ]+/g')
// => ['fred', 'barney', '&', 'pebbles']

```
## Util

### attempt

Attempts to invoke `func`, returning either the result or the caught error
object. Any additional arguments are provided to `func` when it's invoked.



**Arguments:**

@param callable $func The function to attempt.

@param array $args The arguments to invoke `func` with.



**Return:**

@return mixed|\Throwable Returns the `func` result or error object.

Example:
```php
<?php
 use function _\attempt;

// Avoid throwing errors for invalid PDO data source.
$elements = attempt(function () {
   new \PDO(null);
});

if (isError($elements)) {
  $elements = [];
}
s
```
### identity

This method returns the first argument it receives.



**Arguments:**

@param mixed $value Any value.



**Return:**

@return mixed Returns `value`.

Example:
```php
<?php
 use function _\identity;

$object = ['a' => 1];

identity($object) === $object;
// => true

```
### property

Creates a function that returns the value at `path` of a given object.



**Arguments:**

@param array|string $ path The path of the property to get.



**Return:**

@return callable Returns the new accessor function.

Example:
```php
<?php
 use function _\property;

$objects = [
  [ 'a' => [ 'b' => 2 ] ],
  [ 'a' => [ 'b' => 1 ] ]
];

map($objects, property('a.b'));
// => [2, 1]

map(sortBy($objects, property(['a', 'b'])), 'a.b');
// => [1, 2]

```
