<?php

/**
 * All rights reserved.
 *
 * @author Falaleev Maxim
 * @email max@studio107.ru
 * @version 1.0
 * @company Studio107
 * @site http://studio107.ru
 * @date 06/02/15 19:21
 */

namespace Tests\Cases\Orm\Sqlite;

use Tests\Orm\AutoSlugFieldTest;

class SqliteAutoSlugFieldTest extends AutoSlugFieldTest
{
    public $driver = 'sqlite';
}
