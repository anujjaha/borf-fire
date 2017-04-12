<?php

namespace App\Http\Controllers\Backend\Events;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Event\EventRepository;
use Illuminate\Http\Request;

/**
 * Class EventTableController.
 */
class EventTableController extends Controller
{
    /**
     * @var EventRepository
     */
    protected $events;

    /**
     * @param EventRepository $events
     */
    public function __construct(EventRepository $events)
    {
        $this->events = $events;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $a = Datatables::of($this->events->getForDataTable())
            ->escapeColumns(['event_name', 'sort'])
            ->addColumn('event_name', function ($event) {
                return $event->event_name;
            })
            ->addColumn('event_title', function ($event) {
                return $event->event_title;
            })
            ->addColumn('actions', function ($event) {
                return $event->action_buttons;
            })
            ->make(true);
    }
}
