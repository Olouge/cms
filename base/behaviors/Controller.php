<?php
/**
 * Controller
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010-2014 SkeekS (Sx)
 * @date 03.11.2014
 * @since 1.0.0
 */
namespace skeeks\cms\base\behaviors;

use skeeks\cms\Exception;
use yii\base\Behavior;

/**
 * Class Controller
 * @package skeeks\cms\base\behaviors
 */
class Controller extends Behavior
{
    /**
     * @var \skeeks\cms\Controller the owner of this behavior
     */
    public $owner;

    /**
     * @param \skeeks\cms\Controller $owner
     * @throws Exception
     */
    public function attach($owner)
    {
        if (!$owner instanceof \skeeks\cms\Controller)
        {
            throw new Exception(\Yii::t('app','This behavior is designed only to work with {class}',['class' => \skeeks\cms\Controller::className()]));
        }

        parent::attach($owner);
    }

}