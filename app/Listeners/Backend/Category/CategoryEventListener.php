<?php

namespace App\Listeners\Backend\Category;

/**
 * Class UserEventListener
 * @package App\Listeners\Backend\Access\User
 */
class CategoryEventListener
{
	/**
	 * @var string
	 */
	private $history_slug = 'Category';

	/**
	 * @param $event
	 */
	public function onCreated($event) {



	$hist =	history()->log(
			$this->history_slug,
			'trans("history.backend.users.created") <strong>'.$event->category->name.'</strong>',
			$event->category->id,
			'plus',
			'bg-green'
		);



	}



	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher  $events
	 */
	public function subscribe($events)
	{


		$events->listen(
			\App\Events\Backend\Category\CategoryCreated::class,
			'App\Listeners\Backend\Category\CategoryEventListener@onCreated'
		);


	}
}