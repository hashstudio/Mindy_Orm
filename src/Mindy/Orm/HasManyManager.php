<?php

namespace Mindy\Orm;

use Mindy\Helper\Creator;

/**
 * Class HasManyManager
 * @package Mindy\Orm
 */
class HasManyManager extends RelatedManager
{
    /**
     * Primary model (has many owner)
     * @var \Mindy\Orm\Model
     */
    public $primaryModel;

    /**
     * @var string
     */
    public $from;

    /**
     * @var string
     */
    public $to;
    /**
     * @var array extra condition for join
     */
    public $extra = [];

    public $through;

    public function __construct(Model $model, array $config = [])
    {
        Creator::configure($this, $config);
        $this->_model = $model;
    }

    public function getQuerySet()
    {
        if ($this->_qs === null) {
            $qs = parent::getQuerySet();
            $this->_qs = $qs->filter(array_merge([
                $this->to => $this->primaryModel->{$this->from}
            ], $this->extra));
            if ($this->primaryModel->getIsNewRecord()) {
                $this->_qs->distinct();
                ;
            }
        }
        return $this->_qs;
    }
}
