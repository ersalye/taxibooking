<?php
namespace App\Events\Backend\Category;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class CategoryCreated extends  Event
{
    use SerializesModels;

    /**
     * @var $user
     */
    public $category;

    /**
     * @param $user
     */
    public function __construct($category)
{
    $this->category = $category;
}
}