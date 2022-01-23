<?php
<<<<<<< HEAD

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
namespace GuzzleHttp\Promise;

/**
 * Represents a promise that iterates over many promises and invokes
 * side-effect functions in the process.
 */
class EachPromise implements PromisorInterface
{
    private $pending = [];

<<<<<<< HEAD
    private $nextPendingIndex = 0;

    /** @var \Iterator|null */
    private $iterable;

    /** @var callable|int|null */
    private $concurrency;

    /** @var callable|null */
    private $onFulfilled;

    /** @var callable|null */
    private $onRejected;

    /** @var Promise|null */
    private $aggregate;

    /** @var bool|null */
=======
    /** @var \Iterator */
    private $iterable;

    /** @var callable|int */
    private $concurrency;

    /** @var callable */
    private $onFulfilled;

    /** @var callable */
    private $onRejected;

    /** @var Promise */
    private $aggregate;

    /** @var bool */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    private $mutex;

    /**
     * Configuration hash can include the following key value pairs:
     *
     * - fulfilled: (callable) Invoked when a promise fulfills. The function
     *   is invoked with three arguments: the fulfillment value, the index
     *   position from the iterable list of the promise, and the aggregate
     *   promise that manages all of the promises. The aggregate promise may
     *   be resolved from within the callback to short-circuit the promise.
     * - rejected: (callable) Invoked when a promise is rejected. The
     *   function is invoked with three arguments: the rejection reason, the
     *   index position from the iterable list of the promise, and the
     *   aggregate promise that manages all of the promises. The aggregate
     *   promise may be resolved from within the callback to short-circuit
     *   the promise.
     * - concurrency: (integer) Pass this configuration option to limit the
     *   allowed number of outstanding concurrently executing promises,
     *   creating a capped pool of promises. There is no limit by default.
     *
<<<<<<< HEAD
     * @param mixed $iterable Promises or values to iterate.
     * @param array $config   Configuration options
     */
    public function __construct($iterable, array $config = [])
    {
        $this->iterable = Create::iterFor($iterable);
=======
     * @param mixed    $iterable Promises or values to iterate.
     * @param array    $config   Configuration options
     */
    public function __construct($iterable, array $config = [])
    {
        $this->iterable = iter_for($iterable);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

        if (isset($config['concurrency'])) {
            $this->concurrency = $config['concurrency'];
        }

        if (isset($config['fulfilled'])) {
            $this->onFulfilled = $config['fulfilled'];
        }

        if (isset($config['rejected'])) {
            $this->onRejected = $config['rejected'];
        }
    }

<<<<<<< HEAD
    /** @psalm-suppress InvalidNullableReturnType */
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function promise()
    {
        if ($this->aggregate) {
            return $this->aggregate;
        }

        try {
            $this->createPromise();
<<<<<<< HEAD
            /** @psalm-assert Promise $this->aggregate */
            $this->iterable->rewind();
            $this->refillPending();
        } catch (\Throwable $e) {
            /**
             * @psalm-suppress NullReference
             * @phpstan-ignore-next-line
             */
            $this->aggregate->reject($e);
        } catch (\Exception $e) {
            /**
             * @psalm-suppress NullReference
             * @phpstan-ignore-next-line
             */
            $this->aggregate->reject($e);
        }

        /**
         * @psalm-suppress NullableReturnStatement
         * @phpstan-ignore-next-line
         */
=======
            $this->iterable->rewind();
            $this->refillPending();
        } catch (\Throwable $e) {
            $this->aggregate->reject($e);
        } catch (\Exception $e) {
            $this->aggregate->reject($e);
        }

>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        return $this->aggregate;
    }

    private function createPromise()
    {
        $this->mutex = false;
        $this->aggregate = new Promise(function () {
<<<<<<< HEAD
            if ($this->checkIfFinished()) {
                return;
            }
            reset($this->pending);
=======
            reset($this->pending);
            if (empty($this->pending) && !$this->iterable->valid()) {
                $this->aggregate->resolve(null);
                return;
            }

>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            // Consume a potentially fluctuating list of promises while
            // ensuring that indexes are maintained (precluding array_shift).
            while ($promise = current($this->pending)) {
                next($this->pending);
                $promise->wait();
<<<<<<< HEAD
                if (Is::settled($this->aggregate)) {
=======
                if ($this->aggregate->getState() !== PromiseInterface::PENDING) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                    return;
                }
            }
        });

        // Clear the references when the promise is resolved.
        $clearFn = function () {
            $this->iterable = $this->concurrency = $this->pending = null;
            $this->onFulfilled = $this->onRejected = null;
<<<<<<< HEAD
            $this->nextPendingIndex = 0;
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        };

        $this->aggregate->then($clearFn, $clearFn);
    }

    private function refillPending()
    {
        if (!$this->concurrency) {
            // Add all pending promises.
            while ($this->addPending() && $this->advanceIterator());
            return;
        }

        // Add only up to N pending promises.
        $concurrency = is_callable($this->concurrency)
            ? call_user_func($this->concurrency, count($this->pending))
            : $this->concurrency;
        $concurrency = max($concurrency - count($this->pending), 0);
        // Concurrency may be set to 0 to disallow new promises.
        if (!$concurrency) {
            return;
        }
        // Add the first pending promise.
        $this->addPending();
        // Note this is special handling for concurrency=1 so that we do
        // not advance the iterator after adding the first promise. This
        // helps work around issues with generators that might not have the
        // next value to yield until promise callbacks are called.
        while (--$concurrency
            && $this->advanceIterator()
            && $this->addPending());
    }

    private function addPending()
    {
        if (!$this->iterable || !$this->iterable->valid()) {
            return false;
        }

<<<<<<< HEAD
        $promise = Create::promiseFor($this->iterable->current());
        $key = $this->iterable->key();

        // Iterable keys may not be unique, so we use a counter to
        // guarantee uniqueness
        $idx = $this->nextPendingIndex++;

        $this->pending[$idx] = $promise->then(
            function ($value) use ($idx, $key) {
                if ($this->onFulfilled) {
                    call_user_func(
                        $this->onFulfilled,
                        $value,
                        $key,
                        $this->aggregate
=======
        $promise = promise_for($this->iterable->current());
        $idx = $this->iterable->key();

        $this->pending[$idx] = $promise->then(
            function ($value) use ($idx) {
                if ($this->onFulfilled) {
                    call_user_func(
                        $this->onFulfilled, $value, $idx, $this->aggregate
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                    );
                }
                $this->step($idx);
            },
<<<<<<< HEAD
            function ($reason) use ($idx, $key) {
                if ($this->onRejected) {
                    call_user_func(
                        $this->onRejected,
                        $reason,
                        $key,
                        $this->aggregate
=======
            function ($reason) use ($idx) {
                if ($this->onRejected) {
                    call_user_func(
                        $this->onRejected, $reason, $idx, $this->aggregate
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                    );
                }
                $this->step($idx);
            }
        );

        return true;
    }

    private function advanceIterator()
    {
        // Place a lock on the iterator so that we ensure to not recurse,
        // preventing fatal generator errors.
        if ($this->mutex) {
            return false;
        }

        $this->mutex = true;

        try {
            $this->iterable->next();
            $this->mutex = false;
            return true;
        } catch (\Throwable $e) {
            $this->aggregate->reject($e);
            $this->mutex = false;
            return false;
        } catch (\Exception $e) {
            $this->aggregate->reject($e);
            $this->mutex = false;
            return false;
        }
    }

    private function step($idx)
    {
        // If the promise was already resolved, then ignore this step.
<<<<<<< HEAD
        if (Is::settled($this->aggregate)) {
=======
        if ($this->aggregate->getState() !== PromiseInterface::PENDING) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            return;
        }

        unset($this->pending[$idx]);

        // Only refill pending promises if we are not locked, preventing the
        // EachPromise to recursively invoke the provided iterator, which
        // cause a fatal error: "Cannot resume an already running generator"
        if ($this->advanceIterator() && !$this->checkIfFinished()) {
            // Add more pending promises if possible.
            $this->refillPending();
        }
    }

    private function checkIfFinished()
    {
        if (!$this->pending && !$this->iterable->valid()) {
            // Resolve the promise if there's nothing left to do.
            $this->aggregate->resolve(null);
            return true;
        }

        return false;
    }
}
