<?php


namespace KMA\IikoApi\Entity\Concerns;


use KMA\IikoApi\Exceptions\ObjectNotHashableException;

/**
 * Trait Hashable
 * @package KMA\IikoApi\Entity\Concerns
 * @property ?string hash
 */
trait Hashable
{
    private ?string $hash = null;

    // TODO: temporary decision due to replace json_mapper
    public function __get(string $attr)
    {
        if ($attr === 'hash') {
            return $this->hash();
        }

        if (!isset($this->$attr)) {
            throw new \InvalidArgumentException("Property $attr is undefined");
        }
    }

    public function hash(): ?string
    {
        if (null === $this->hash) {
            $hash = [];

            foreach ($this->getHashFields() as $field) {
                // break on non existed object properties
                if (!property_exists($this, $field)) {
                    throw new \InvalidArgumentException("Property $field is undefined");
                }

                // skip empty properties
                if (empty($this->$field)) {
                    continue;
                }

                $value = $this->$field;

                // for object values we check for hashable possibilities
                // and retrieve hash from it
                if (is_object($value)) {
                    // TODO: do not forget about future collections
                    if (!method_exists($value, 'hash')) {
                        throw new ObjectNotHashableException("Can't get hash for '$field'. Missing method hash()");
                    }

                    $value = $value->hash();
                } elseif (is_array($value)) {
                    // TODO: in future arrays must be replaced with collections
                    $arrayItemsHash = [];

                    foreach ($value as $arrayItem) {
                        if (!is_object($arrayItem) || !method_exists($arrayItem, 'hash')) {
                            throw new ObjectNotHashableException("One of collection '$field' not hashable");
                        }
                        $arrayItemsHash[] = $arrayItem->hash();
                    }

                    $value = implode('', array_filter($arrayItemsHash));
                }

                if (empty($value)) {
                    continue;
                }

                $hash[] = $value;
            }

            if (empty(array_filter($hash))) {
                $this->hash = null;
            }

            $this->hash = md5(implode('', $hash));
        }

        return $this->hash;
    }

    private function getHashFields(): array
    {
        if (!isset($this->hashFields)) {
            throw new \InvalidArgumentException('Class property \'hashFields\' is undefined');
        }

        if (!is_array($this->hashFields)) {
            throw new \InvalidArgumentException('Class property \'hashFields\' must be array');
        }

        return $this->hashFields;
    }
}
