<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::all();
    }

    public function store()
    {
        $event = [
            'title' => 'Evento Atribuição em Massa ' . rand(1, 100),
            'description' => 'Descrição...',
            'body' => 'Conteúdo do evento',
            'slug' => 'evento-atribuicao-em-massa',
            'start_event' => date('Y-m-d H:i:s'),
        ];

        return Event::create($event);
    }

    public function update($event)
    {
        $eventData = [
            'title' => 'Evento Atribuição em Massa ' . rand(1, 1000),
        ];

        $event = Event::find($event);

        $event->update($eventData);

        return $event;
    }

    public function destroy($event)
    {
        $event = Event::findOrFail($event);

        return $event->delete();
    }
}
