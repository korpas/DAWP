<?php

namespace Knp\Component\Pager\Event;

use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Specific Event class for paginator
 */
class PaginationEvent extends Event
{
    /**
     * A target being paginated
     *
     * @var mixed
     */
    public $target;

    /**
     * List of options
     *
     * @var array
     */
    public $options;

    private $pagination;

    public function setPagination(PaginationInterface $pagination)
    {
        $this->pagination = $pagination;
    }

    public function getPagination()
    {
        return $this->pagination;
    }
}
