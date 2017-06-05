<?php

namespace Cx\Model\Proxies\__CG__\Cx\Core\User\Model\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CoreAttribute extends \Cx\Core\User\Model\Entity\CoreAttribute implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }

    /**
     * {@inheritDoc}
     * @param string $name
     */
    public function __get($name)
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__get', array($name));

        return parent::__get($name);
    }





    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'id', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'mandatory', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'sortType', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'orderId', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'accessSpecial', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'accessId', 'readAccessId', 'validators', 'virtual');
        }

        return array('__isInitialized__', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'id', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'mandatory', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'sortType', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'orderId', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'accessSpecial', '' . "\0" . 'Cx\\Core\\User\\Model\\Entity\\CoreAttribute' . "\0" . 'accessId', 'readAccessId', 'validators', 'virtual');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CoreAttribute $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setMandatory($mandatory)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMandatory', array($mandatory));

        return parent::setMandatory($mandatory);
    }

    /**
     * {@inheritDoc}
     */
    public function getMandatory()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMandatory', array());

        return parent::getMandatory();
    }

    /**
     * {@inheritDoc}
     */
    public function setSortType($sortType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSortType', array($sortType));

        return parent::setSortType($sortType);
    }

    /**
     * {@inheritDoc}
     */
    public function getSortType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSortType', array());

        return parent::getSortType();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderId($orderId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrderId', array($orderId));

        return parent::setOrderId($orderId);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrderId', array());

        return parent::getOrderId();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccessSpecial($accessSpecial)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccessSpecial', array($accessSpecial));

        return parent::setAccessSpecial($accessSpecial);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccessSpecial()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccessSpecial', array());

        return parent::getAccessSpecial();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccessId(\Cx\Core_Modules\Access\Model\Entity\AccessId $accessId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccessId', array($accessId));

        return parent::setAccessId($accessId);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccessId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccessId', array());

        return parent::getAccessId();
    }

    /**
     * {@inheritDoc}
     */
    public function setReadAccessId(\Cx\Core_Modules\Access\Model\Entity\ReadAccessId $readAccessId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReadAccessId', array($readAccessId));

        return parent::setReadAccessId($readAccessId);
    }

    /**
     * {@inheritDoc}
     */
    public function getReadAccessId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getReadAccessId', array());

        return parent::getReadAccessId();
    }

    /**
     * {@inheritDoc}
     */
    public function getComponentController()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getComponentController', array());

        return parent::getComponentController();
    }

    /**
     * {@inheritDoc}
     */
    public function setVirtual($virtual)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVirtual', array($virtual));

        return parent::setVirtual($virtual);
    }

    /**
     * {@inheritDoc}
     */
    public function isVirtual()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isVirtual', array());

        return parent::isVirtual();
    }

    /**
     * {@inheritDoc}
     */
    public function validate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'validate', array());

        return parent::validate();
    }

    /**
     * {@inheritDoc}
     */
    public function __call($methodName, $arguments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__call', array($methodName, $arguments));

        return parent::__call($methodName, $arguments);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

}
