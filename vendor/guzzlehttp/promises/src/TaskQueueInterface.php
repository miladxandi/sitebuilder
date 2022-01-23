<?php
<<<<<<< HEAD

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
namespace GuzzleHttp\Promise;

interface TaskQueueInterface
{
    /**
     * Returns true if the queue is empty.
     *
     * @return bool
     */
    public function isEmpty();

    /**
     * Adds a task to the queue that will be executed the next time run is
     * called.
<<<<<<< HEAD
=======
     *
     * @param callable $task
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    public function add(callable $task);

    /**
     * Execute all of the pending task in the queue.
     */
    public function run();
}
