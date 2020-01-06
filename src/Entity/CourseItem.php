<?php
/**
 * Created by PhpStorm.
 * User: ardianferdianto
 * Date: 27/11/19
 * Time: 15.40
 */

namespace BootUP\Client\Entity;


class CourseItem extends BaseItem
{
    protected $type = 'course';
    protected $availableRelations = [
        //'content'
    ];

    /*public function content()
    {
        return $this->hasOne(CourseContentItem::class);
    }*/
}