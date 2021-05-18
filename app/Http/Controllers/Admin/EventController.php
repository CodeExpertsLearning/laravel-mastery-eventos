<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function index()
    {
        $events = $this->event->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    public function show($event)
    {
        return 'Evento: ' . $event;
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(EventRequest $request)
    {
        $event = $request->all();
        $event['slug'] = Str::slug($event['title']);

        $this->event->create($event);

        return redirect()->route('admin.events.index');
    }

    public function edit($event)
    {
        $event = $this->event->findOrFail($event);

        return view('admin.events.edit', compact('event'));
    }

    public function update($event, EventRequest $request)
    {
        $event = $this->event->findOrFail($event);

        $event->update($request->all());

        return redirect()->back();
    }

    public function destroy($event)
    {
        $event = $this->event->findOrFail($event);
        $event->delete();

        return redirect()->route('admin.events.index');
    }
}
