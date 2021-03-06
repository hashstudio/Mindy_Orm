<?php

namespace Mindy\Orm;

/**
 * Class TreeManager
 * @package Mindy\Orm
 */
class TreeManager extends Manager
{
    /**
     * @return \Mindy\Orm\TreeQuerySet
     */
    public function getQuerySet()
    {
        if ($this->_qs === null) {
            $this->_qs = new TreeQuerySet([
                'model' => $this->getModel(),
                'modelClass' => $this->getModel()->className()
            ]);
            $this->_qs->order(['lft']);
        }
        return $this->_qs;
    }

    /**
     * Named scope. Gets descendants for node.
     * @param bool $includeSelf
     * @param int $depth the depth.
     * @return $this
     */
    public function descendants($includeSelf = false, $depth = null)
    {
        $this->getQuerySet()->descendants($includeSelf, $depth);
        return $this;
    }

    /**
     * Named scope. Gets children for node (direct descendants only).
     * @param bool $includeSelf
     * @return $this
     */
    public function children($includeSelf = false)
    {
        $this->getQuerySet()->children($includeSelf);
        return $this;
    }

    /**
     * Named scope. Gets ancestors for node.
     * @param bool $includeSelf
     * @param int $depth the depth.
     * @return $this
     */
    public function ancestors($includeSelf = false, $depth = null)
    {
        $this->getQuerySet()->ancestors($includeSelf, $depth);
        return $this;
    }

    /**
     * @param bool $includeSelf
     * @return $this
     */
    public function parents($includeSelf = false)
    {
        $this->getQuerySet()->parents($includeSelf);
        return $this;
    }

    /**
     * Named scope. Gets root node(s).
     * @return $this
     */
    public function roots()
    {
        $this->getQuerySet()->roots();
        return $this;
    }

    /**
     * Named scope. Gets parent of node.
     * @return $this
     */
    public function parent()
    {
        $this->getQuerySet()->parent();
        return $this;
    }

    /**
     * Named scope. Gets previous sibling of node.
     * @return $this
     */
    public function prev()
    {
        $this->getQuerySet()->prev();
        return $this;
    }

    /**
     * Named scope. Gets next sibling of node.
     * @return $this
     */
    public function next()
    {
        $this->getQuerySet()->next();
        return $this;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function asTree($key = 'items')
    {
        $this->getQuerySet()->asTree($key);
        return $this;
    }
}
