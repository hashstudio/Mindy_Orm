<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Falaleev Maxim
 * @email max@studio107.ru
 * @version 1.0
 * @company Studio107
 * @site http://studio107.ru
 * @date 04/03/14.03.2014 01:17
 */

namespace Modules\Tests\Models;


use Mindy\Orm\Fields\CharField;
use Mindy\Orm\Fields\HasManyField;
use Mindy\Orm\Model;
use Modules\Utils\Components\CachedTrait;

/**
 * Class Category
 * @package Modules\Tests\Models
 * @property string name
 * @property \Mindy\Orm\HasManyManager products
 */
class Category extends Model
{
    public static function getFields()
    {
        return [
            'name' => [
                'class' => CharField::className()
            ],
            'products' => [
                'class' => HasManyField::className(),
                'modelClass' => Product::className(),
                'null' => true,
                'relatedName' => 'category',
                'editable' => false
            ],
        ];
    }
}
