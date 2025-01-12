<?php

namespace Modules\BisdiEvent\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;
use Modules\BisdiEvent\Entities\Event;
use Illuminate\Support\Facades\Storage;
use Modules\BisdiEvent\Entities\Agenda;
use Illuminate\Contracts\Support\Renderable;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('bisdievent::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('bisdievent::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            "nama" => "required",
            "tgl_event" => "required",
            "alamat" => "required",
        ]);
        $input = $request->all();
        if ($request->file('flayer')) {
            $input['flayer'] = $request->file('flayer')->store('flayer');
        }
        Event::create($input);
        return redirect()->back()->with('success', 'Event Berhasil Dibuat');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        return view('bisdievent::event', [
            'event' => Event::select()->where('id', $id)->get()->first(),
            'agendas' => Agenda::select()->where('event_id', $id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('bisdievent::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = [
            "nama" => "required",
            "tgl_event" => "required",
            "alamat" => "required",
            "keterangan" => "required",
        ];
        $input = $request->validate($data);
        if ($request->file('flayer')) {
            if ($request->flayer_lama) {
                Storage::delete($request->flayer_lama);
            }
            $input['flayer'] = $request->file('flayer')->store('flayer');
        }
        Event::where('id', $id)->update($input);
        return redirect()->back()->with('success', 'Event Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $event = Event::where('id', $id)->get()->first();
        if ($event->flayer) {
            Storage::delete($event->flayer);
        }
        Event::destroy('id', $id);
        Agenda::destroy('event_id', $id);
        return redirect()->back()->with('success', 'Event Telah Di Hapus');
    }
}
