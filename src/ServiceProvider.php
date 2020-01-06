<?php
/**
 * Created by PhpStorm.
 * User: ardianferdianto
 * Date: 27/11/19
 * Time: 14.26
 */

namespace BootUP\Client;

use BootUP\Client\Entity\ModulItem;
use Swis\JsonApi\Client\Providers\TypeMapperServiceProvider as BaseTypeMapperServiceProvider;
use Swis\JsonApi\Client\Interfaces\DocumentClientInterface;
use BootUP\Client\Entity\CourseItem;

class ServiceProvider extends BaseTypeMapperServiceProvider
{
    /**
     * A list of class names implementing \Swis\JsonApi\Client\Interfaces\ItemInterface.
     *
     * @var string[]
     */
    protected $items = [
        CourseItem::class,
        ModulItem::class
    ];
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        $this->app->bind(DocumentClientInterface::class, JsonApiClient::class);
    }
}