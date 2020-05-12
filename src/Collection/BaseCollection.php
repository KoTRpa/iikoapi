<?php


namespace KMA\IikoApi\Collection;


use InvalidArgumentException;

abstract class BaseCollection implements \ArrayAccess, \IteratorAggregate, \Countable
{
    protected array $collection = [];

    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }

    /**
     * validates type before add to collection
     * @param $item
     * @throws InvalidArgumentException;
     */
    abstract protected function validate($item): void;

    public function add($item): void
    {
        $this->offsetSet(null, $item);
    }

    //=== ArrayAccess ===//
    public function offsetExists($offset)
    {
        return isset($this->collection[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->collection[$offset] ?? null;
    }

    public function offsetSet($offset, $value)
    {
        $this->validate($value);

        if ($offset === null) {
            $this->collection[] = $value;
        } else {
            $this->collection[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->collection[$offset]);
    }

    //=== IteratorAggregate ===//
    public function getIterator(): iterable
    {
        yield from $this->collection;
    }

    //=== Countable ===//
    public function count(): int
    {
        return count($this->collection);
    }

    // (array) replacement
    public function asArray(): array
    {
        return $this->collection;
    }
}
