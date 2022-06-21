<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // 
    public function index(Request $request)
    {
        // on page load this ajax code block will be run
        if ($request->ajax()) {

            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);


            return response()->json($data);
        }

        return view('dashboard/agenda');
    }

    public function ajax(Request $request)
    {
        switch ($request->type) {

                // For add event
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

                // For update event        
            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

                // For delete event    
            case 'delete':
                $event = Event::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                break;
        }
    }
}
