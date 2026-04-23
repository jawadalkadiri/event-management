<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendee;
use App\Http\Resources\AttendeeResource;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
     {
        $attendees = $event->attendees()->latest();

         return AttendeeResource::collection($attendees->paginate());
     }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
     {

     /**    create an attendee according to the $event id in the url by using the relationship and static user_id = 1 */
        $attendee = $event->attendees()->create([
            'user_id' => 1
        ]
        );

        return new AttendeeResource($attendee);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, Attendee $attendee)
     {
        return new AttendeeResource($attendee);
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, Attendee $attendee)
     {
        $attendee->delete();

        return response()->noContent();
     }

}
