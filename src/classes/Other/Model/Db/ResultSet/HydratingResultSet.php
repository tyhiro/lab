<?php
namespace Other\Model\Db\ResultSet;

use ArrayObject;
use Symfony\Component\Serializer\Serializer;

class HydratingResultSet extends AbstractResultSet
{

    /**
     * @var null
     */
    protected $objectPrototype = null;

    /** @var null|HydratingStrategyInterface $formatStrategy */
    protected $formatStrategy = null;
    /**
     * Holds the names of the methods used for hydration, indexed by class::property name,
     * false if the hydration method is not callable/usable for hydration purposes
     *
     * @var string[]|bool[]
     */
    private $hydrationMethodsCache = [];

    /**
     * A map of extraction methods to property name to be used during extraction, indexed
     * by class name and method name
     *
     * @var string[][]
     */
    private $extractionMethodsCache = [];

    /**
     * Constructor
     *
     * @param  null|object $objectPrototype - прототип объекта для формирования списко
     * @param  null|HydratingStrategyInterface $formatStrategy - специфические настройки для полей свойств
     */
    public function __construct($objectPrototype = null, $formatStrategy = null)
    {
        $this->serializer = new Serializer();
        $this->setObjectPrototype(($objectPrototype) ?: new ArrayObject());
        if ($formatStrategy) {
            $this->setFormatStrategy($formatStrategy);
        }
    }

    /**
     * Set the row object prototype
     *
     * @param  object $objectPrototype
     * @throws \InvalidArgumentException
     * @return ResultSet
     */
    public function setObjectPrototype($objectPrototype)
    {
        if (!is_object($objectPrototype)) {
            throw new \InvalidArgumentException(
                'An object must be set as the object prototype, a ' . gettype($objectPrototype) . ' was provided.'
            );
        }
        $this->objectPrototype = $objectPrototype;

        return $this;
    }

    /**
     * Get the row object prototype
     *
     * @return object
     */
    public function getObjectPrototype()
    {
        return $this->objectPrototype;
    }

    /**
     * Iterator: get current item
     *
     * @return object
     */
    public function current()
    {
        if ($this->buffer === null) {
            $this->buffer = -2; // implicitly disable buffering from here on
        } elseif (is_array($this->buffer) && isset($this->buffer[$this->position])) {
            return $this->buffer[$this->position];
        }
        $data = $this->dataSource->current();

        $object = false;

        if (is_array($data)) {
            $object = $this->hydrate($data, clone $this->objectPrototype);
        }

        if (is_array($this->buffer)) {
            $this->buffer[$this->position] = $object;
        }

        return $object;
    }

    /**
     * Cast result set to array of arrays
     *
     * @return array
     * @throws \RuntimeException if any row is not castable to an array
     */
    public function toArray()
    {
        $return = [];
        foreach ($this as $row) {
            $return[] = $this->extract($row);
        }

        return $return;
    }

    /**
     * @param array $data
     * @param  $object
     * @return object
     */
    private function hydrate(array $data, $object)
    {
        if (!is_object($object)) {
            throw new \BadMethodCallException(sprintf(
                '%s expects the provided $object to be a PHP object)',
                __METHOD__
            ));
        }

        $objectClass = get_class($object);

        foreach ($data as $property => $value) {
            $propertyFqn = $objectClass . '::$' . $property;

            if (!isset($this->hydrationMethodsCache[$propertyFqn])) {
                $setterName = 'set' . ucfirst($property);

                $this->hydrationMethodsCache[$propertyFqn] = is_callable([$object, $setterName])
                    ? $setterName
                    : false;
            }

            if ($this->hydrationMethodsCache[$propertyFqn]) {
                $object->{$this->hydrationMethodsCache[$propertyFqn]}($this->hydrateValue($property, $value, $data));
            }
        }

        return $object;
    }

    /**
     * Converts a value for hydration. If no strategy exists the plain value is returned.
     *
     * @param string $name The name of the strategy to use.
     * @param mixed $value The value that should be converted.
     * @param array $data The whole data is optionally provided as context.
     * @return mixed
     */
    public function hydrateValue($name, $value, $data = null)
    {
        if ($this->formatStrategy) {
            $value = $this->formatStrategy->hydrate($name, $value, $data = null);
        }

        return $value;
    }

    /**
     * Extract values from an object with class methods
     *
     * Extracts the getter/setter of the given $object.
     *
     * @param  object $object
     * @return array
     * @throws \BadMethodCallException for a non-object $object
     */
    public function extract($object)
    {
        if (!is_object($object)) {
            throw new \BadMethodCallException(sprintf(
                '%s expects the provided $object to be a PHP object)',
                __METHOD__
            ));
        }

        $objectClass = get_class($object);

        // pass 1 - finding out which properties can be extracted, with which methods (populate hydration cache)
        if (!isset($this->extractionMethodsCache[$objectClass])) {
            $this->extractionMethodsCache[$objectClass] = [];
            $methods = get_class_methods($object);


            foreach ($methods as $method) {
                $methodFqn = $objectClass . '::' . $method;

                $attribute = $method;

                if (strpos($method, 'get') === 0) {
                    $attribute = substr($method, 3);
                    if (!property_exists($object, $attribute)) {
                        $attribute = lcfirst($attribute);
                    }
                }

                $this->extractionMethodsCache[$objectClass][$method] = $attribute;
            }
        }

        $values = [];

        // pass 2 - actually extract data
        foreach ($this->extractionMethodsCache[$objectClass] as $methodName => $attributeName) {
            $values[$attributeName] = $object->$methodName();
        }

        return $values;
    }

    /**
     * Set the row formatStrategy
     *
     * @param  HydratingStrategyInterface $formatStrategy
     * @throws \InvalidArgumentException
     * @return ResultSet
     */
    public function setFormatStrategy(HydratingStrategyInterface $formatStrategy)
    {
        if (!is_object($formatStrategy)) {
            throw new \InvalidArgumentException(
                'An object must be set as the object formatter, a ' . gettype($formatStrategy) . ' was provided.'
            );
        }
        $this->formatStrategy = $formatStrategy;

        return $this;
    }
}
