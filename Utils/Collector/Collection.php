<?php

namespace reka\Utils\Collector;

use \Iterator;

class Collection implements Iterator
{
    private $data = null; // datas

    private $length = 0; // length of data

    private $now = 0; // for Iterator

    /**
     * [__construct Collector class constructor]
     * @param [array] $data [an array for Collector class]
     */
    public function __construct(array $data = array())
    {
        $this->data = $data;
        $this->length = count($data);
    }

    /**
     * [unshift insert an item on beginning of array]
     * @param [every] $item [an item for insert]
     * @return [Collector] [this]
     */
    public function unshift($item): self
    {
        $this->length++;
        array_unshift($this->data, $item);
        return $this;
    }
    /**
     * [shift extract first item]
     * @return [every] [extracted item]
     */
    public function shift()
    {
        $this->length--;
        $shift = array_shift($this->data);
        return $shift;
    }

    /**
     * [push insert an item on end of array]
     * @param  [every] $data [an item for insert]
     * @return [Collector] [this]
     */
    public function push($item): self
    {
        $this->length++;
        array_push($this->data, $item);
        return $this;
    }
    /**
     * [pop extract last item]
     * @return [every] [extracted item]
     */
    public function pop()
    {
        $this->length--;
        $pop = array_pop($this->data);
        return $pop;
    }

    /**
     * [map execute a function with items and replace return value]
     * @param  [callable] $func [function]
     * @return [Collector] [this]
     */
    public function map(callable $func): self
    {
        $this->data = array_map($func, $this->data);
        return $this;
    }

    /**
     * [filter execute a function with items and remove if return value is false]
     * @param  [callable] $func [function]
     * @return [Collector] [this]
     */
    public function filter(callable $func): self
    {
        $this->data = array_filter($this->data, $func);
        $this->length = count($this->data);
        return $this;
    }

    /**
     * [get get item]
     * @param  [int] $index [index of data]
     * @return [every]        [item]
     */
    public function get(int $index)
    {
        return $this->data[$index];
    }
    /**
     * [getAll get all items]
     * @return [array] [data]
     */
    public function getAll(): array
    {
        return $this->data;
    }

    /**
     * [implode make string with token]
     * @param  [string] $str [token]
     * @return [string]      [result string]
     */
    public function implode(string $token): string
    {
        return implode($token, $this->data);
    }
    /**
     * [length get length]
     * @return [int] [length]
     */
    public function length(): int
    {
        return $this->length;
    }
    /**
     * [toString]
     * @return [string] [result string]
     */
    public function toString(): string
    {
        return "[" . (implode(", ", $this->data)) . "] length " . ($this->length()) . "";
    }

    /**
     * methods for Iterator
     */

    public function rewind() // reset

    {
        $this->now = 0;
    }
    public function current() // get current data

    {
        return $this->data[$this->now];
    }
    public function key() // get key

    {
        return $this->now;
    }
    public function next() // next key

    {
        $this->now++;
    }
    public function valid() // is valid key

    {
        return isset($this->data[$this->now]);
    }
}
