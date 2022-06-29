<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Event;
use PDF;

class EventController extends Controller
{
    public function home(Request $request)
    {
        // on page load this ajax code block will be run
        if ($request->ajax()) {

            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'location', 'start', 'end', 'cost', 'description']);


            return response()->json($data);
        }

        return view('dashboard/agenda/home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        // Route Index Event
        return view('dashboard/agenda/index', [
            "events" => Event::latest()->filter(request(['searchEvent', 'category']))->paginate(10)->withQueryString(),
            "categories" => Category::all(),
            "title" => "Event | HMSI UNPAM" . $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Route Create Event
        return view('dashboard/agenda/create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'slug' =>  'required|string|max:100|unique:events',
            'cost' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start' => 'required|date',
            'end' => 'required|date',
            'location' => 'required',
            'category_id' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 200);
        Event::create($validatedData);

        return redirect('/dashboard/event')->with('success', 'Event has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */

    public function show(Event $event)
    {
        // Route Show Event
        return view('dashboard/agenda/show', [
            "event" => $event,
            "categories" => Category::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('dashboard/agenda/edit', [
            "event" => $event,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
        $rules = [
            'title' => 'required|string|max:100',
            'cost' => 'required|numeric',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start' => 'required|date',
            'end' => 'required|date',
            'location' => 'required',
            'category_id' => 'required',
        ];

        if ($request->slug != $event->slug) {

            $rules['slug'] = 'required|unique:events';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 200);
        $event->update($validatedData);
        return redirect('/dashboard/event')->with('success', 'Event has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        if ($event->image) {
            Storage::delete($event->image);
        }
        Event::destroy($event->id);

        return redirect('/dashboard/event')->with('success', 'Event has been deleted');
    }

    public function export()
    {
        $events = Event::where('id', '>', 0)->get();

        $pdf = PDF::loadview('/dashboard/agenda/exportPDF', ['events' => $events]);
        return $pdf->download('event-HMSI.pdf');
    }
}
