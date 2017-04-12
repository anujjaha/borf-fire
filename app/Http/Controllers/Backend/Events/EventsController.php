<?php

namespace App\Http\Controllers\Backend\Events;
use App\Models\Event\Event;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Event\EventRepository;
use Illuminate\Http\Request;

/**
 * Class EventsController.
 */
class EventsController extends Controller
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
    public function index(Request $request)
    {
        return view('backend.events.index');
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        return view('backend.events.create');
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->events->create($request->all());

        return redirect()->route('admin.events.index')->withFlashSuccess("Event Successfully Created");
    }

    /**
     * @param Event $event
     * @param Request $request
     *
     * @return mixed
     */
    public function edit(Event $event, Request $request)
    {
        return view('backend.events.edit')
            ->withEvent($event);
    }

    /**
     * @param Event $event
     * @param Request $request
     *
     * @return mixed
     */
    public function update(Event $event, Request $request)
    {
        $this->events->update($event, $request->all());

        return redirect()->route('admin.events.index')->withFlashSuccess("Event Successfuly Updated");
    }

    /**
     * @param Event $event
     * @param Request $request
     *
     * @return mixed
     */
    public function destroy(Event $event, Request $request)
    {
        $this->events->delete($event);

        return redirect()->route('admin.events.index')->withFlashSuccess("Event SUccessfully Deleted");
    }
}
