<?php

namespace Modules\Bisdiboard\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use Google_Client;
use App\Models\User;
use Google_Service_Tasks;
use Google_Service_Calendar;
use Illuminate\Http\Request;
use Google_Service_Tasks_Task;
use Spatie\CalendarLinks\Link;
use Illuminate\Mail\MailMessage;
use Spatie\GoogleCalendar\Event;
use Google_Service_Gmail_Message;
use Google_Service_Calendar_Event;
// use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Google_Service_Gmail_MessagePart;
use Google_Service_Calendar_EventDateTime;
use Modules\Bisdiboard\Entities\BoardTask;
use Google_Service_Gmail_MessagePartHeader;
use Illuminate\Contracts\Support\Renderable;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('bisdiboard::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('bisdiboard::create');
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
            "assigned_to" => "required",
            "deskripsi" => "nullable",
            "batas_waktu" => "required",
            "prioritas" => "required",
            "project_id" => "required",
        ]);

        $assigne = User::select()->where('id', $request->assigned_to)->get()->first();

        $toEmail = $assigne->email;
        $subject = 'Anda Memiliki Taks Baru Di BisdiBoard';

        $from = Carbon::now();
        $to = Carbon::parse($request->batas_waktu);

        if ($request->deskripsi == null) {
            $deskripsi = 'Tidak Ada Deskripsi';
        } else {
            $deskripsi = $request->deskripsi;
        }
        $link = Link::create($request->nama, $from, $to)
            ->description($deskripsi)
            ->address('Prodi Bisnis Digital Universita Pakuan');

        // Mengambil link acara dari Google Calendar
        $eventLink = $link->google();

        //tambahkan link ke email balasan
        Mail::send('bisdiboard::emails.task-reminder', [
            'nama' => $assigne->name,
            'task' => $request->nama,
            'prioritas' => $request->prioritas,
            'deskripsi' => $request->deskripsi,
            'batas_waktu' => $request->batas_waktu,
            'link' => $eventLink,
            'url' => url('/bisdiboard/task/' . $request->project_id)
        ], function ($message) use ($toEmail, $subject, $eventLink) {
            $message->to($toEmail)
                ->subject($subject);
        });

        $input = $request->all();
        $input['status'] = 'To Do';
        BoardTask::create($input);
        return back()->with('success', 'Task Baru Telah Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        if (request('prioritas')) {
            $tasks = BoardTask::with('user')->select()->where('project_id', $id)->where('prioritas', request('prioritas'))->get();
        } else {
            $tasks = BoardTask::with('user')->select()->where('project_id', $id)->get();
        }
        return view('bisdiboard::task', [
            'tasks' => $tasks,
            'project' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('bisdiboard::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $data = [
            "nama" => "required",
            "assigned_to" => "required",
            "deskripsi" => "nullable",
            "batas_waktu" => "required",
            "prioritas" => "required",
            "status" => "required",
        ];

        $input = $request->validate($data);
        BoardTask::where('id', $id)->update($input);
        return back()->with('success', 'Task Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
