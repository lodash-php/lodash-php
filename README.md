# Lodash-PHP

Lodash-PHP is a port of the [Lodash JS library](https://lodash.com/) to PHP. It is a set of easy to use utility functions for everyday PHP projects.

Lodash-PHP tries to mimick lodash.js as close as possible

# Requirements

Lodash-PHP requires minimum PHP 7.2+, but the latest version of PHP is always recommended.

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
- [Function](#function)
- [Lang](#lang)
- [Math](#math)
- [Number](#number)
- [Object](#object)
- [Seq](#seq)
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

@param array<int, mixed> $values The values to concatenate.



**Return:**

@return array Returns the new concatenated array.

Example:
```php
<?php
 use function _\concat;

$array = [1];
$other = concat($array, 2, [3], [[4]]);

var_dump($other)
// => [1, 2, 3, [4]]

var_dump($array)
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

@param array ...$values The values to exclude.



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

@param array<int, mixed> ...$values The values to exclude.

@param callable $iteratee The iteratee invoked per element.



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

@param array<int, mixed> $array The array to inspect.

@param array ...$values The values to exclude.

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
### every

Checks if `predicate` returns truthy for **all** elements of `array`.
Iteration is stopped once `predicate` returns falsey. The predicate is
invoked with three arguments: (value, index, array).

**Note:** This method returns `true` for
[empty arrays](https://en.wikipedia.org/wiki/Empty_set) because
[everything is true](https://en.wikipedia.org/wiki/Vacuous_truth) of
elements of empty arrays.




**Arguments:**

@param iterable $collection The array to iterate over.

@param callable $predicate The function invoked per iteration.



**Return:**

@return bool `true` if all elements pass the predicate check, else `false`.

Example:
```php
<?php
 use function _\every;

every([true, 1, null, 'yes'], function ($value) { return is_bool($value);})
// => false

$users = [
['user' => 'barney', 'age' => 36, 'active' => false],
['user' => 'fred', 'age' => 40, 'active' => false],
];

// The `matches` iteratee shorthand.
$this->assertFalse(every($users, ['user' => 'barney', 'active' => false]));
// false

// The `matchesProperty` iteratee shorthand.
$this->assertTrue(every($users, ['active', false]));
// true

// The `property` iteratee shorthand.
$this->assertFalse(every($users, 'active'));
//false


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

@return \stdClass the new object.

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

@param array ...$arrays



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

@param array<int, mixed> ...$arrays

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

@param array ...$arrays

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

@param array<int, string> $values The values to remove.



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

@param (int | int[]) $indexes The indexes of elements to remove.



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
### sample

Gets a random element from `array`.





**Arguments:**

@param array $array The array to sample.



**Return:**

@return mixed Returns the random element.

Example:
```php
<?php
 use function _\sample;

sample([1, 2, 3, 4])
// => 2

```
### sampleSize

Gets `n` random elements at unique keys from `array` up to the
size of `array`.




**Arguments:**

@param array $array The array to sample.

@param int $n The number of elements to sample.



**Return:**

@return array the random elements.

Example:
```php
<?php
 use function _\sampleSize;

sampleSize([1, 2, 3], 2)
// => [3, 1]

sampleSize([1, 2, 3], 4)
// => [2, 3, 1]

```
### shuffle

Creates an array of shuffled values




**Arguments:**

@param array $array The array to shuffle.



**Return:**

@return array the new shuffled array.

Example:
```php
<?php
 use function _\shuffle;

shuffle([1, 2, 3, 4])
// => [4, 1, 3, 2]

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

@param array ...$arrays The arrays to inspect.



**Return:**

@return array the new array of combined values.

Example:
```php
<?php
 use function _\union;

union([2], [1, 2])
// => [2, 1]

```
### unionBy

This method is like `union` except that it accepts `iteratee` which is
invoked for each element of each `arrays` to generate the criterion by
which uniqueness is computed. Result values are chosen from the first
array in which the value occurs. The iteratee is invoked with one argument:
(value).





**Arguments:**

@param array<int, mixed> ...$arrays The arrays to inspect.

@param callable $iteratee The iteratee invoked per element.



**Return:**

@return array the new array of combined values.

Example:
```php
<?php
 use function _\unionBy;

unionBy([2.1], [1.2, 2.3], 'floor')
// => [2.1, 1.2]

// The `_::property` iteratee shorthand.
unionBy([['x' => 1]], [['x' => 2], ['x' => 1]], 'x');
// => [['x' => 1], ['x' => 2]]

```
### unionWith

This method is like `union` except that it accepts `comparator` which
is invoked to compare elements of `arrays`. Result values are chosen from
the first array in which the value occurs. The comparator is invoked
with two arguments: (arrVal, othVal).






**Arguments:**

@param array<int, mixed> ...$arrays The arrays to inspect.

@param callable $comparator The comparator invoked per element.



**Return:**

@return array the new array of combined values.

Example:
```php
<?php
 use function _\unionWith;

$objects = [['x' => 1, 'y' => 2], ['x' => 2, 'y' => 1]]
$others = [['x' => 1, 'y' => 1], ['x' => 1, 'y' => 2]]

unionWith($objects, $others, '_::isEqual')
// => [['x' => 1, 'y' => 2], ['x' => 2, 'y' => 1], ['x' => 1, 'y' => 1]]

```
### uniq

Creates a duplicate-free version of an array, using
[`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
for equality comparisons, in which only the first occurrence of each element
is kept. The order of result values is determined by the order they occur
in the array.




**Arguments:**

@param array $array The array to inspect.



**Return:**

@return array the new duplicate free array.

Example:
```php
<?php
 use function _\uniq;

uniq([2, 1, 2])
// => [2, 1]s

```
### uniqBy

This method is like `uniq` except that it accepts `iteratee` which is
invoked for each element in `array` to generate the criterion by which
uniqueness is computed. The order of result values is determined by the
order they occur in the array. The iteratee is invoked with one argument:
(value).




**Arguments:**

@param array $array The array to inspect.

@param mixed $iteratee The iteratee invoked per element.



**Return:**

@return array the new duplicate free array.

Example:
```php
<?php
 use function _\uniqBy;

uniqBy([2.1, 1.2, 2.3], 'floor')
// => [2.1, 1.2]

```
### uniqWith

This method is like `uniq` except that it accepts `comparator` which
is invoked to compare elements of `array`. The order of result values is
determined by the order they occur in the array.The comparator is invoked
with two arguments: (arrVal, othVal).




**Arguments:**

@param array $array The array to inspect.

@param callable $comparator The comparator invoked per element.



**Return:**

@return array the new duplicate free array.

Example:
```php
<?php
 use function _\uniqWith;

$objects = [['x' => 1, 'y' => 2], ['x' => 2, 'y' => 1], ['x' => 1, 'y' => 2]]

uniqWith($objects, '_::isEqual')
// => [['x' => 1, 'y' => 2], ['x' => 2, 'y' => 1]]

```
### unzip

This method is like `zip` except that it accepts an array of grouped
elements and creates an array regrouping the elements to their pre-zip
configuration.




**Arguments:**

@param array $array The array of grouped elements to process.



**Return:**

@return array the new array of regrouped elements.

Example:
```php
<?php
 use function _\unzip;

$zipped = zip(['a', 'b'], [1, 2], [true, false])
// => [['a', 1, true], ['b', 2, false]]

unzip($zipped)
// => [['a', 'b'], [1, 2], [true, false]]

```
### unzipWith

This method is like `unzip` except that it accepts `iteratee` to specify
how regrouped values should be combined. The iteratee is invoked with the
elements of each group: (...group).





**Arguments:**

@param array $array The array of grouped elements to process.

@param (callable | null) $iteratee The function to combine regrouped values.



**Return:**

@return array the new array of regrouped elements.

Example:
```php
<?php
 use function _\unzipWith;

$zipped = zip([1, 2], [10, 20], [100, 200])
// => [[1, 10, 100], [2, 20, 200]]

unzipWith(zipped, '_::add')
// => [3, 30, 300]

```
### without

Creates an array excluding all given values using
[`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
for equality comparisons.

**Note:** Unlike `pull`, this method returns a new array.




**Arguments:**

@param array $array The array to inspect.

@param array<int, mixed> $values The values to exclude.



**Return:**

@return array the new array of filtered values.

Example:
```php
<?php
 use function _\without;

without([2, 1, 2, 3], 1, 2)
// => [3]

```
### zip

Creates an array of grouped elements, the first of which contains the
first elements of the given arrays, the second of which contains the
second elements of the given arrays, and so on.




**Arguments:**

@param array ...$arrays The arrays to process.



**Return:**

@return array the new array of grouped elements.

Example:
```php
<?php
 use function _\zip;

zip(['a', 'b'], [1, 2], [true, false])
// => [['a', 1, true], ['b', 2, false]]

```
### zipObject

This method is like `fromPairs` except that it accepts two arrays,
one of property identifiers and one of corresponding values.





**Arguments:**

@param array $props The property identifiers.

@param array $values The property values.



**Return:**

@return object the new object.

Example:
```php
<?php
 use function _\zipObject;

zipObject(['a', 'b'], [1, 2])
/* => object(stdClass)#210 (2) {
["a"] => int(1)
["b"] => int(2)
}
*\/

```
### zipObjectDeep

This method is like `zipObject` except that it supports property paths.





**Arguments:**

@param array $props The property identifiers.

@param array $values The property values.



**Return:**

@return \stdClass the new object.

Example:
```php
<?php
 use function _\zipObjectDeep;

zipObjectDeep(['a.b[0].c', 'a.b[1].d'], [1, 2])
/* => class stdClass#20 (1) {
public $a => class stdClass#19 (1) {
public $b =>
array(2) {
[0] => class stdClass#17 (1) {
public $c => int(1)
}
[1] => class stdClass#18 (1) {
public $d => int(2)
}
}
}
}
*\/

```
### zipWith

This method is like `zip` except that it accepts `iteratee` to specify
how grouped values should be combined. The iteratee is invoked with the
elements of each group: (...group).





**Arguments:**

@param array<int, (array | callable)> ...$arrays The arrays to process.

@param callable $iteratee The function to combine grouped values.



**Return:**

@return array the new array of grouped elements.

Example:
```php
<?php
 use function _\zipWith;

zipWith([1, 2], [10, 20], [100, 200], function($a, $b, $c) { return $a + $b + $c; })
// => [111, 222]

```
## Collection

### countBy

Creates an array composed of keys generated from the results of running
each element of `collection` through `iteratee`. The corresponding value of
each key is the number of times the key was returned by `iteratee`. The
iteratee is invoked with one argument: (value).




**Arguments:**

@param iterable $collection The collection to iterate over.

@param callable $iteratee The iteratee to transform keys.



**Return:**

@return array Returns the composed aggregate object.

Example:
```php
<?php
 use function _\countBy;

countBy([6.1, 4.2, 6.3], 'floor');
// => ['6' => 2, '4' => 1]

// The `property` iteratee shorthand.
countBy(['one', 'two', 'three'], 'strlen');
// => ['3' => 2, '5' => 1]

```
### each

Iterates over elements of `collection` and invokes `iteratee` for each element.
The iteratee is invoked with three arguments: (value, index|key, collection).
Iteratee functions may exit iteration early by explicitly returning `false`.

**Note:** As with other "Collections" methods, objects with a "length"
property are iterated like arrays. To avoid this behavior use `forIn`
or `forOwn` for object iteration.





**Arguments:**

@param (array | iterable | object) $collection The collection to iterate over.

@param callable $iteratee The function invoked per iteration.



**Return:**

@return (array | object) Returns `collection`.

Example:
```php
<?php
 use function _\each;

each([1, 2], function ($value) { echo $value; })
// => Echoes `1` then `2`.

each((object) ['a' => 1, 'b' => 2], function ($value, $key) { echo $key; });
// => Echoes 'a' then 'b' (iteration order is not guaranteed).

```
### eachRight

This method is like `each` except that it iterates over elements of
`collection` from right to left.




**Arguments:**

@param (array | iterable | object) $collection The collection to iterate over.

@param callable $iteratee The function invoked per iteration.



**Return:**

@return (array | object) Returns `collection`.

Example:
```php
<?php
 use function _\eachRight;

eachRight([1, 2], function($value) { echo $value; })
// => Echoes `2` then `1`.

```
### filter

Iterates over elements of `array`, returning an array of all elements
`predicate` returns truthy for. The predicate is invoked with three
arguments: (value, index, array).

**Note:** Unlike `remove`, this method returns a new array.





**Arguments:**

@param iterable $array The array to iterate over.

@param callable $predicate The function invoked per iteration.



**Return:**

@return array the new filtered array.

Example:
```php
<?php
 use function _\filter;

$users = [
[ 'user' => 'barney', 'age' => 36, 'active' => true],
[ 'user' => 'fred',   'age' => 40, 'active' => false]
];

filter($users, function($o) { return !$o['active']; });
// => objects for ['fred']

// The `matches` iteratee shorthand.
filter($users, ['age' => 36, 'active' => true]);
// => objects for ['barney']

// The `matchesProperty` iteratee shorthand.
filter($users, ['active', false]);
// => objects for ['fred']

// The `property` iteratee shorthand.
filter($users, 'active');
// => objects for ['barney']

```
### find

Iterates over elements of `collection`, returning the first element
`predicate` returns truthy for. The predicate is invoked with three
arguments: (value, index|key, collection).





**Arguments:**

@param iterable $collection The collection to inspect.

@param callable $predicate The function invoked per iteration.

@param int $fromIndex The index to search from.



**Return:**

@return mixed Returns the matched element, else `null`.

Example:
```php
<?php
 use function _\find;

$users = [
['user' => 'barney',  'age' => 36, 'active' => true],
['user' => 'fred',    'age' => 40, 'active' => false],
['user' => 'pebbles', 'age' => 1,  'active' => true]
];

find($users, function($o) { return $o['age'] < 40; });
// => object for 'barney'

// The `matches` iteratee shorthand.
find($users, ['age' => 1, 'active' => true]);
// => object for 'pebbles'

// The `matchesProperty` iteratee shorthand.
find($users, ['active', false]);
// => object for 'fred'

// The `property` iteratee shorthand.
find($users, 'active');
// => object for 'barney'

```
### findLast

This method is like `find` except that it iterates over elements of
`collection` from right to left.





**Arguments:**

@param iterable $collection The collection to inspect.

@param callable $predicate The function invoked per iteration.

@param int $fromIndex The index to search from.



**Return:**

@return mixed Returns the matched element, else `undefined`.

Example:
```php
<?php
 use function _\findLast;

findLast([1, 2, 3, 4], function ($n) { return $n % 2 == 1; })
// => 3

```
### flatMap

Creates a flattened array of values by running each element in `collection`
through `iteratee` and flattening the mapped results. The iteratee is invoked
with three arguments: (value, index|key, collection).





**Arguments:**

@param iterable $collection The collection to iterate over.

@param callable $iteratee The function invoked per iteration.



**Return:**

@return array the new flattened array.

Example:
```php
<?php
 use function _\flatMap;

function duplicate($n) {
return [$n, $n]
}

flatMap([1, 2], 'duplicate')
// => [1, 1, 2, 2]

```
### flatMapDeep

This method is like `flatMap` except that it recursively flattens the
mapped results.




**Arguments:**

@param iterable $collection The collection to iterate over.

@param callable $iteratee The function invoked per iteration.



**Return:**

@return array Returns the new flattened array.

Example:
```php
<?php
 use function _\flatMapDeep;

function duplicate($n) {
return [[[$n, $n]]];
}

flatMapDeep([1, 2], 'duplicate');
// => [1, 1, 2, 2]

```
### flatMapDepth

This method is like `flatMap` except that it recursively flattens the
mapped results up to `depth` times.




**Arguments:**

@param iterable $collection The collection to iterate over.

@param callable $iteratee The function invoked per iteration.

@param int $depth The maximum recursion depth.



**Return:**

@return array the new flattened array.

Example:
```php
<?php
 use function _\flatMapDepth;

function duplicate($n) {
return [[[$n, $n]]]
}

flatMapDepth([1, 2], 'duplicate', 2)
// => [[1, 1], [2, 2]]

```
### groupBy

Creates an array composed of keys generated from the results of running
each element of `collection` through `iteratee`. The order of grouped values
is determined by the order they occur in `collection`. The corresponding
value of each key is an array of elements responsible for generating the
key. The iteratee is invoked with one argument: (value).




**Arguments:**

@param iterable $collection The collection to iterate over.

@param callable $iteratee The iteratee to transform keys.



**Return:**

@return array Returns the composed aggregate object.

Example:
```php
<?php
 use function _\groupBy;

groupBy([6.1, 4.2, 6.3], 'floor');
// => ['6' => [6.1, 6.3], '4' => [4.2]]

groupBy(['one', 'two', 'three'], 'strlen');
// => ['3' => ['one', 'two'], '5' => ['three']]

```
### invokeMap

Invokes the method at `path` of each element in `collection`, returning
an array of the results of each invoked method. Any additional arguments
are provided to each invoked method. If `path` is a function, it's invoked
for, and `this` bound to, each element in `collection`.




**Arguments:**

@param iterable $collection The collection to iterate over.

@param (array | callable | string) $path The path of the method to invoke or the function invoked per iteration.

@param array $args The arguments to invoke each method with.



**Return:**

@return array the array of results.

Example:
```php
<?php
 use function _\invokeMap;

invokeMap([[5, 1, 7], [3, 2, 1]], function($result) { sort($result); return $result;})
// => [[1, 5, 7], [1, 2, 3]]

invokeMap([123, 456], 'str_split')
// => [['1', '2', '3'], ['4', '5', '6']]

```
### keyBy

Creates an object composed of keys generated from the results of running
each element of `collection` through `iteratee`. The corresponding value of
each key is the last element responsible for generating the key. The
iteratee is invoked with one argument: (value).




**Arguments:**

@param iterable $collection The collection to iterate over.

@param callable $iteratee The iteratee to transform keys.



**Return:**

@return array the composed aggregate object.

Example:
```php
<?php
 use function _\keyBy;

$array = [
['direction' => 'left', 'code' => 97],
['direction' => 'right', 'code' => 100],
];

keyBy($array, function ($o) { return \chr($o['code']); })
// => ['a' => ['direction' => 'left', 'code' => 97], 'd' => ['direction' => 'right', 'code' => 100]]

keyBy($array, 'direction');
// => ['left' => ['direction' => 'left', 'code' => 97], 'right' => ['direction' => 'right', 'code' => 100]]

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

@param (array | object) $collection The collection to iterate over.

@param (callable | string | array) $iteratee The function invoked per iteration.



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
### orderBy

This method is like `sortBy` except that it allows specifying the sort
orders of the iteratees to sort by. If `orders` is unspecified, all values
are sorted in ascending order. Otherwise, specify an order of "desc" for
descending or "asc" for ascending sort order of corresponding values.




**Arguments:**

@param (iterable | null) $collection The collection to iterate over.

@param (array[] | callable[] | string[]) $iteratee The iteratee(s) to sort by.

@param string[] $orders The sort orders of `iteratees`.



**Return:**

@return array the new sorted array.

Example:
```php
<?php
 use function _\orderBy;

$users = [
['user' => 'fred',   'age' => 48],
['user' => 'barney', 'age' => 34],
['user' => 'fred',   'age' => 40],
['user' => 'barney', 'age' => 36]
]

// Sort by `user` in ascending order and by `age` in descending order.
orderBy($users, ['user', 'age'], ['asc', 'desc'])
// => [['user' => 'barney', 'age' => 36], ['user' => 'barney', 'age' => 34], ['user' => 'fred', 'age' => 48], ['user' => 'fred', 'age' => 40]]

```
### partition

Creates an array of elements split into two groups, the first of which
contains elements `predicate` returns truthy for, the second of which
contains elements `predicate` returns falsey for. The predicate is
invoked with one argument: (value).




**Arguments:**

@param iterable $collection The collection to iterate over.

@param callable $predicate The function invoked per iteration.



**Return:**

@return array the array of grouped elements.

Example:
```php
<?php
 use function _\partition;

$users = [
['user' => 'barney',  'age' => 36, 'active' => false],
['user' => 'fred',    'age' => 40, 'active' => true],
['user' => 'pebbles', 'age' => 1,  'active' => false]
];

partition($users, function($user) { return $user['active']; })
// => objects for [['fred'], ['barney', 'pebbles']]

```
### reduce

Reduces `collection` to a value which is the accumulated result of running
each element in `collection` thru `iteratee`, where each successive
invocation is supplied the return value of the previous. If `accumulator`
is not given, the first element of `collection` is used as the initial
value. The iteratee is invoked with four arguments:
(accumulator, value, index|key, collection).

Many lodash methods are guarded to work as iteratees for methods like
`reduce`, `reduceRight`, and `transform`.

The guarded methods are:
`assign`, `defaults`, `defaultsDeep`, `includes`, `merge`, `orderBy`,
and `sortBy`





**Arguments:**

@param iterable $collection The collection to iterate over.

@param mixed $iteratee The function invoked per iteration.

@param mixed $accumulator The initial value.



**Return:**

@return mixed Returns the accumulated value.

Example:
```php
<?php
 use function _\reduce;

reduce([1, 2], function($sum, $n) { return $sum + $n; }, 0)
// => 3

reduce(['a' => 1, 'b' => 2, 'c' => 1], function ($result, $value, $key) {
if (!isset($result[$value])) {
$result[$value] = [];
}
$result[$value][] = $key;

return $result;
}, [])
// => ['1' => ['a', 'c'], '2' => ['b']] (iteration order is not guaranteed)

```
### reduceRight

This method is like `reduce` except that it iterates over elements of
`collection` from right to left.





**Arguments:**

@param iterable $collection The collection to iterate over.

@param mixed $iteratee The function invoked per iteration.

@param mixed $accumulator The initial value.



**Return:**

@return mixed Returns the accumulated value.

Example:
```php
<?php
 use function _\reduceRight;

$array = [[0, 1], [2, 3], [4, 5]];

reduceRight(array, (flattened, other) => flattened.concat(other), [])
// => [4, 5, 2, 3, 0, 1]

```
### reject

The opposite of `filter` this method returns the elements of `collection`
that `predicate` does **not** return truthy for.





**Arguments:**

@param iterable $collection The collection to iterate over.

@param callable $predicate The function invoked per iteration.



**Return:**

@return array the new filtered array.

Example:
```php
<?php
 use function _\reject;

$users = [
['user' => 'barney', 'active' => true],
['user' => 'fred',   'active' => false]
]

reject($users, 'active')
// => objects for ['fred']

```
### size

Gets the size of `collection` by returning its length for array
values or the number of public properties for objects.




**Arguments:**

@param (array | object | string) $collection The collection to inspect.



**Return:**

@return int Returns the collection size.

Example:
```php
<?php
 use function _\size;

size([1, 2, 3]);
// => 3

size(new class { public $a = 1; public $b = 2; private $c = 3; });
// => 2

size('pebbles');
// => 7

```
### some

Checks if `predicate` returns truthy for **any** element of `collection`.
Iteration is stopped once `predicate` returns truthy. The predicate is
invoked with three arguments: (value, index|key, collection).




**Arguments:**

@param iterable $collection The collection to iterate over.

@param (callable | string | array) $predicate The function invoked per iteration.



**Return:**

@return boolean Returns `true` if any element passes the predicate check, else `false`.

Example:
```php
<?php
 use function _\some;

some([null, 0, 'yes', false], , function ($value) { return \is_bool($value); }));
// => true

$users = [
['user' => 'barney', 'active' => true],
['user' => 'fred',   'active' => false]
];

// The `matches` iteratee shorthand.
some($users, ['user' => 'barney', 'active' => false ]);
// => false

// The `matchesProperty` iteratee shorthand.
some($users, ['active', false]);
// => true

// The `property` iteratee shorthand.
some($users, 'active');
// => true

```
### sortBy

Creates an array of elements, sorted in ascending order by the results of
running each element in a collection through each iteratee. This method
performs a stable sort, that is, it preserves the original sort order of
equal elements. The iteratees are invoked with one argument: (value).




**Arguments:**

@param (array | object | null) $collection The collection to iterate over.

@param (callable | callable[]) $iteratees The iteratees to sort by.



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
## Function

### after

The opposite of `before`; this method creates a function that invokes
`func` once it's called `n` or more times.





**Arguments:**

@param int $n The number of calls before `func` is invoked.

@param Callable $func The function to restrict.



**Return:**

@return Callable Returns the new restricted function.

Example:
```php
<?php
 use function _\after;

$saves = ['profile', 'settings'];

$done = after(count($saves), function() {
echo 'done saving!';
});

forEach($saves, function($type) use($done) {
asyncSave([ 'type' => $type, 'complete' => $done ]);
});
// => Prints 'done saving!' after the two async saves have completed.

```
### ary

Creates a function that invokes `func`, with up to `n` arguments,
ignoring any additional arguments.





**Arguments:**

@param callable $func The function to cap arguments for.

@param int $n The arity cap.



**Return:**

@return Callable Returns the new capped function.

Example:
```php
<?php
 use function _\ary;

map(['6', '8', '10'], ary('intval', 1));
// => [6, 8, 10]

```
### before

Creates a function that invokes `func`, with the arguments
of the created function, while it's called less than `n` times. Subsequent
calls to the created function return the result of the last `func` invocation.





**Arguments:**

@param int $n The number of calls at which `func` is no longer invoked.

@param callable $func The function to restrict.



**Return:**

@return callable Returns the new restricted function.

Example:
```php
<?php
 use function _\before;

$users = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$result = uniqBy(map($users, before(5, [$repository, 'find'])), 'id')
// => Fetch up to 4 results.

```
### bind

Creates a function that invokes `func` with the `this` binding of `object`
and `partials` prepended to the arguments it receives.




**Arguments:**

@param callable $function The function to bind.

@param (object | mixed) $object The `object` binding of `func`.

@param array<int, mixed> $partials The arguments to be partially applied.



**Return:**

@return callable Returns the new bound function.

Example:
```php
<?php
 use function _\bind;

function greet($greeting, $punctuation) {
return $greeting . ' ' . $this->user . $punctuation;
}

$object = $object = new class {
public $user = 'fred';
};

$bound = bind('greet', $object, 'hi');
$bound('!');
// => 'hi fred!'

```
### bindKey

Creates a function that invokes the method `$function` of `$object` with `$partials`
prepended to the arguments it receives.

This method differs from `bind` by allowing bound functions to reference
methods that may be redefined or don't yet exist




**Arguments:**

@param object $object The object to invoke the method on.

@param string $function The name of the method.

@param array<int, mixed> $partials The arguments to be partially applied.



**Return:**

@return callable Returns the new bound function.

Example:
```php
<?php
 use function _\bindKey;

$object = new class {
private $user = 'fred';
function greet($greeting, $punctuation) {
return $greeting.' '.$this->user.$punctuation;
}
};

$bound = bindKey($object, 'greet', 'hi');
$bound('!');
// => 'hi fred!'

```
### curry

Creates a function that accepts arguments of `func` and either invokes
`func` returning its result, if at least `arity` number of arguments have
been provided, or returns a function that accepts the remaining `func`
arguments, and so on. The arity of `func` may be specified if `func.length`
is not sufficient.

The `_.curry.placeholder` value, which defaults to `_` in monolithic builds,
may be used as a placeholder for provided arguments.

**Note:** This method doesn't set the "length" property of curried functions.




**Arguments:**

@param callable $func The function to curry.

@param (int | null) $arity The arity of `func`.



**Return:**

@return callable Returns the new curried function.

Example:
```php
<?php
 use function _\curry;

$abc = function($a, $b, $c) {
return [$a, $b, $c];
};

$curried = curry($abc);

$curried(1)(2)(3);
// => [1, 2, 3]

$curried(1, 2)(3);
// => [1, 2, 3]

$curried(1, 2, 3);
// => [1, 2, 3]

// Curried with placeholders.
$curried(1)(_, 3)(2);
// => [1, 2, 3]

```
### delay

Invokes `func` after `wait` milliseconds. Any additional arguments are
provided to `func` when it's invoked.




**Arguments:**

@param callable $func The function to delay.

@param int $wait The number of milliseconds to delay invocation.

@param array<int, mixed> $args



**Return:**

@return int the timer id.

Example:
```php
<?php
 use function _\delay;

delay(function($text) {
echo $text;
}, 1000, 'later');
// => Echo 'later' after one second.

```
### flip

Creates a function that invokes `func` with arguments reversed.





**Arguments:**

@param callable $func The function to flip arguments for.



**Return:**

@return callable Returns the new flipped function.

Example:
```php
<?php
 use function _\flip;

$flipped = flip(function() {
return func_get_args();
});

flipped('a', 'b', 'c', 'd');
// => ['d', 'c', 'b', 'a']

```
### memoize

Creates a function that memoizes the result of `func`. If `resolver` is
provided, it determines the cache key for storing the result based on the
arguments provided to the memoized function. By default, the first argument
provided to the memoized function is used as the map cache key

**Note:** The cache is exposed as the `cache` property on the memoized
function. Its creation may be customized by replacing the `_.memoize.Cache`
constructor with one whose instances implement the
[`Map`](http://ecma-international.org/ecma-262/7.0/#sec-properties-of-the-map-prototype-object)
method interface of `clear`, `delete`, `get`, `has`, and `set`.





**Arguments:**

@param callable $func The function to have its output memoized.

@param (callable | null) $resolver The function to resolve the cache key.



**Return:**

@return callable Returns the new memoized function.

Example:
```php
<?php
 use function _\memoize;

$object = ['a' => 1, 'b' => 2];
$other = ['c' => 3, 'd' => 4];

$values = memoize('_\values');
$values($object);
// => [1, 2]

$values($other);
// => [3, 4]

$object['a'] = 2;
$values($object);
// => [1, 2]

// Modify the result cache.
$values->cache->set($object, ['a', 'b']);
$values($object);
// => ['a', 'b']

```
### negate

Creates a function that negates the result of the predicate `func`





**Arguments:**

@param callable $predicate The predicate to negate.



**Return:**

@return callable Returns the new negated function.

Example:
```php
<?php
 use function _\negate;

function isEven($n) {
return $n % 2 == 0;
}

filter([1, 2, 3, 4, 5, 6], negate($isEven));
// => [1, 3, 5]

```
### once

Creates a function that is restricted to invoking `func` once. Repeat calls
to the function return the value of the first invocation. The `func` is
invoked with the arguments of the created function.





**Arguments:**

@param callable $func The function to restrict.



**Return:**

@return callable the new restricted function.

Example:
```php
<?php
 use function _\once;

$initialize = once('createApplication');
$initialize();
$initialize();
// => `createApplication` is invoked once

```
### overArgs

Creates a function that invokes `func` with its arguments transformed.





**Arguments:**

@param callable $func The function to wrap.

@param callable[] $transforms The argument transforms.



**Return:**

@return callable the new function.

Example:
```php
<?php
 use function _\overArgs;

function doubled($n) {
return $n * 2;
}

function square($n) {
return $n * $n;
}

$func = overArgs(function($x, $y) {
return [$x, $y];
}, ['square', 'doubled']);

$func(9, 3);
// => [81, 6]

$func(10, 5);
// => [100, 10]

```
### partial

Creates a function that invokes `func` with `partials` prepended to the
arguments it receives.





**Arguments:**

@param callable $func The function to partially apply arguments to.

@param array<int, mixed> $partials The arguments to be partially applied.



**Return:**

@return callable Returns the new partially applied function.

Example:
```php
<?php
 use function _\partial;

function greet($greeting, $name) {
return $greeting . ' ' . $name;
}

$sayHelloTo = partial('greet', 'hello');
$sayHelloTo('fred');
// => 'hello fred'

```
### rest

Creates a function that invokes `func` with the `this` binding of the
created function and arguments from `start` and beyond provided as
an array.





**Arguments:**

@param callable $func The function to apply a rest parameter to.

@param (int | null) $start The start position of the rest parameter.



**Return:**

@return callable Returns the new function.

Example:
```php
<?php
 use function _\rest;

$say = rest(function($what, $names) {
return $what . ' ' . implode(', ', initial($names)) .
(size($names) > 1 ? ', & ' : '') . last($names);
});

$say('hello', 'fred', 'barney', 'pebbles');
// => 'hello fred, barney, & pebbles'

```
### spread

Creates a function that invokes `func` with the `this` binding of the
create function and an array of arguments much like
[`Function#apply`](http://www.ecma-international.org/ecma-262/7.0/#sec-function.prototype.apply).

**Note:** This method is based on the
[spread operator](https://mdn.io/spread_operator).





**Arguments:**

@param callable $func The function to spread arguments over.

@param int $start The start position of the spread.



**Return:**

@return callable Returns the new function.

Example:
```php
<?php
 use function _\spread;

$say = spread(function($who, $what) {
return $who . ' says ' . $what;
});

$say(['fred', 'hello']);
// => 'fred says hello'

```
### unary

Creates a function that accepts up to one argument, ignoring any
additional arguments.




**Arguments:**

@param callable $func The function to cap arguments for.



**Return:**

@return callable the new capped function.

Example:
```php
<?php
 use function _\unary;

map(['6', '8', '10'], unary('intval'));
// => [6, 8, 10]

```
### wrap

Creates a function that provides `value` to `wrapper` as its first
argument. Any additional arguments provided to the function are appended
to those provided to the `wrapper`.




**Arguments:**

@param mixed $value The value to wrap.

@param callable $wrapper The wrapper function.



**Return:**

@return callable the new function.

Example:
```php
<?php
 use function _\wrap;

$p = wrap('_\escape', function($func, $text) {
return '<p>' . $func($text) . '</p>';
});

$p('fred, barney, & pebbles');
// => '<p>fred, barney, &amp; pebbles</p>'

```
## Lang

### eq

Performs a comparison between two values to determine if they are equivalent.




**Arguments:**

@param mixed $value The value to compare.

@param mixed $other The other value to compare.



**Return:**

@return boolean Returns `true` if the values are equivalent, else `false`.

Example:
```php
<?php
 use function _\eq;

$object = (object) ['a' => 1];
$other = (object) ['a' => 1];

eq($object, $object);
// => true

eq($object, $other);
// => false

eq('a', 'a');
// => true

eq(['a'], (object) ['a']);
// => false

eq(INF, INF);
// => true

```
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

@return boolean Returns `true` if `value` is an error object, else `false`.

Example:
```php
<?php
 use function _\isError;

isError(new \Exception())
// => true

isError(\Exception::Class)
// => false

```
## Math

### add

Adds two numbers.





**Arguments:**

@param (int | float | string) $augend The first number in an addition.

@param (int | float | string) $addend The second number in an addition.



**Return:**

@return (int | float) Returns the total.

Example:
```php
<?php
 use function _\add;

add(6, 4);
// => 10

```
### max

Computes the maximum value of `array`. If `array` is empty or falsey, null is returned.




**Arguments:**

@param (array | null) $array The array to iterate over.



**Return:**

@return (int | null) Returns the maximum value.

Example:
```php
<?php
 use function _\max;

max([4, 2, 8, 6]);
// => 8

max([]);
// => null

```
### maxBy

This method is like `max` except that it accepts `iteratee` which is
invoked for each element in `array` to generate the criterion by which
the value is ranked. The iteratee is invoked with one argument: (value).




**Arguments:**

@param array $array The array to iterate over.

@param (callable | string) $iteratee The iteratee invoked per element.



**Return:**

@return mixed Returns the maximum value.

Example:
```php
<?php
 use function _\maxBy;

$objects = [['n' => 1], ['n' => 2]];

maxBy($objects, function($o) { return $o['n']; });
// => ['n' => 2]

// The `property` iteratee shorthand.
maxBy($objects, 'n');
// => ['n' => 2]

```
## Number

### clamp

Clamps `number` within the inclusive `lower` and `upper` bounds.





**Arguments:**

@param int $number The number to clamp.

@param int $lower The lower bound.

@param int $upper The upper bound.



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

@param float $number The number to check.

@param float $start The start of the range.

@param float $end The end of the range.



**Return:**

@return boolean Returns `true` if `number` is in the range, else `false`.

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

@param (int | float | bool) $lower The lower bound.

@param (int | float | bool) $upper The upper bound.

@param (bool | null) $floating Specify returning a floating-point number.



**Return:**

@return (int | float) Returns the random number.

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
## Object

### get

Gets the value at path of object. If the resolved value is null the defaultValue is returned in its place.






**Arguments:**

@param mixed $object The associative array or object to fetch value from

@param (array | string) $path Dot separated or array of string

@param mixed $defaultValue (optional)The value returned for unresolved or null values.



**Return:**

@return mixed Returns the resolved value.

Example:
```php
<?php
 use function _\get;

$sampleArray = ["key1" => ["key2" => ["key3" => "val1", "key4" => ""]]];
get($sampleArray, 'key1.key2.key3');
// => "val1"

get($sampleArray, 'key1.key2.key5', "default");
// => "default"

get($sampleArray, 'key1.key2.key4', "default");
// => ""

```
### pick

Creates an object composed of the picked `object` properties.




**Arguments:**

@param object $object The source object.

@param (string | string[]) $paths The property paths to pick.



**Return:**

@return \stdClass Returns the new object.

Example:
```php
<?php
 use function _\pick;

$object = (object) ['a' => 1, 'b' => '2', 'c' => 3];

pick($object, ['a', 'c']);
// => (object) ['a' => 1, 'c' => 3]

```
### pickBy

Creates an object composed of the `object` properties `predicate` returns
truthy for. The predicate is invoked with two arguments: (value, key).




**Arguments:**

@param (object | null) $object The source object.

@param callable $predicate The function invoked per property.



**Return:**

@return \stdClass Returns the new object.

Example:
```php
<?php
 use function _\pickBy;

$object = (object) ['a' => 1, 'b' => 'abc', 'c' => 3];

pickBy(object, 'is_numeric');
// => (object) ['a' => 1, 'c' => 3]

```
## Seq

### chain

Creates a `lodash` wrapper instance that wraps `value` with explicit method
chain sequences enabled. The result of such sequences must be unwrapped
with `->value()`.




**Arguments:**

@param mixed $value The value to wrap.



**Return:**

@return \_ Returns the new `lodash` wrapper instance.

Example:
```php
<?php
 use function _\chain;

$users = [
['user' => 'barney',  'age' => 36],
['user' => 'fred',    'age' => 40],
['user' => 'pebbles', 'age' => 1 ],
];

$youngest = chain($users)
->sortBy('age')
->map(function($o) {
return $o['user'] . ' is ' . $o['age'];
})
->head()
->value();
// => 'pebbles is 1'

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

@return boolean Returns `true` if `string` ends with `target`, else `false`.

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



s
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

```
### parseInt

Converts `string` to an integer of the specified radix. If `radix` is
`undefined` or `0`, a `radix` of `10` is used unless `string` is a
hexadecimal, in which case a `radix` of `16` is used.

**Note:** This method uses PHP's built-in integer casting, which does not necessarily align with the
[ES5 implementation](https://es5.github.io/#x15.1.2.2) of `parseInt`.





**Arguments:**

@param (int | float | string) $string The string to convert.

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

@param (callable | string) $replacement The match replacement.



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

@param string $string The string to split.

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

@return boolean Returns `true` if `string` starts with `target`, else `false`.

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


RegExp $options['escape'] = _::$templateSettings['escape'] The HTML "escape" delimiter.
RegExp $options['evaluate'] = _::$templateSettings['evaluate'] The "evaluate" delimiter.
array  $options['imports'] = _::$templateSettings['imports'] An object to import into the template as free variables.
RegExp $options['interpolate'] = _::$templateSettings['interpolate'] The "interpolate" delimiter.



**Arguments:**

@param string $string The template string.

@param array $options The options array.



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


length = 30 The maximum string length.
omission = '...' The string to indicate text is omitted.
separator The separator pattern to truncate to.



**Arguments:**

@param string $string The string to truncate.

@param array $options The options object.



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




s
**Arguments:**

@param callable $func The function to attempt.

@param array<int, mixed> $args The arguments to invoke `func` with.



**Return:**

@return (mixed | \Throwable) Returns the `func` result or error object.

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

```
### defaultTo

Checks value to determine whether a default value should be returned in its place.
The defaultValue is returned if value is NaN or null.






**Arguments:**

@param mixed $value Any value.

@param mixed $defaultValue Value to return when $value is null or NAN



**Return:**

@return mixed Returns `value`.

Example:
```php
<?php
 use function _\defaultTo;

$a = null;

defaultTo($a, "default");
// => "default"

$a = "x";

defaultTo($a, "default");
// => "x"

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

@param (array | string) $path The path of the property to get.



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
