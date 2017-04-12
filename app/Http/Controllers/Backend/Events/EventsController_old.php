<?php

namespace App\Http\Controllers\Backend\Events;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Event\EventRepository;
use Auth;
use Redirect;
use Response;
use DB;
use Validator;
use Image;

class EventsController extends Controller {

    protected $event;

    public function __construct(EventRepository $event) {
        $this->event = $event;
    }

    public function index() {
        $events = $this->event->getAllEvents();

        return view('backend.events.index', [
                    'events' => $events,
                    'pageTitle' => 'Events'
                ]);
    }

    public function create() {
        return view('backend.events.create', [
                    'pageTitle' => 'Add New Membership Plan'
                ]);
    }

    public function store(Request $request) {
        $status = $this->event->create($request->all());

        if ($status) {
            session(['key' => 'success']);
            session(['msg' => 'Mmebership Plan Created Succesfully !']);
        }

        return redirect()->route('plan-list');
    }

    public function edit($id) {
        $plan = $this->event->getById($id);

        if ($plan) {
            return view('admin.plan.edit', [
                        'pageTitle' => 'Edit Membership Plan',
                        'plan' => $plan
                    ]);
        }

        return redirect()->route('plan-list');
    }

    public function update($id, Request $request) {
        $status = $this->event->update($id, $request->all());

        if ($status) {
            session(['key' => 'success']);
            session(['msg' => 'Mmebership Plan Updated Succesfully !']);
        }

        return redirect()->route('plan-list');
    }

    public function delete(Request $request) {
        $status = $this->event->deleteItem($request->id);

        if ($status) {
            return json_encode([
                        'status' => true
                    ]);
        }

        return json_encode([
                    'status' => false
                ]);
    }

    public function deactivate(Request $request) {
        $status = $this->event->update($request->id, array('is_deleted' => '1'));

        if ($status) {
            return json_encode([
                        'status' => true
                    ]);
        }

        return json_encode([
                    'status' => false
                ]);
    }

}

