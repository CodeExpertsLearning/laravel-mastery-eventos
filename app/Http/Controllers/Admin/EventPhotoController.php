<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventPhotoRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use App\Traits\UploadTrait;

class EventPhotoController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('user.can.event.edit');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function index(Event $event)
    {
        return view('admin.events.photos', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventPhotoRequest $request, Event $event)
    {
        $uploadedPhotos = $this->multipleFilesUpload($request->file('photos'), 'events/photos', 'photo');

        $event->photos()->createMany($uploadedPhotos);

        \App\Services\MessageService::addFlash('success', 'Foto(s) adicionadas com sucesso!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, $photo)
    {
        $photo = $event->photos()->find($photo);

        if(!$photo) return redirect()->route('admin.events.index');

        if(Storage::disk('public')->exists($photo->photo)) {
            Storage::disk('public')->delete($photo->photo);
        }

        $photo->delete();

        \App\Services\MessageService::addFlash('success', 'Foto removida com sucesso!');

        return redirect()->back();
    }
}
