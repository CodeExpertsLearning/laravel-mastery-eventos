<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Event};

class HomeController extends Controller
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function index()
    {
        $byCategory = request()->has('category')
            ? Category::whereSlug(request()->get('category'))->first()->events() : null;

        $events = $this->event->getEventsHome($byCategory)->paginate(15);

        return view('home', compact('events'));
    }

    public function show(Event $event)
    {
        return view('event', compact('event'));
    }
}
