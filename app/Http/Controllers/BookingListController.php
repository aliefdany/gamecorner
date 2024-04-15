<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

use Illuminate\Support\Facades\DB;

class BookingListController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $schedulesByConsole = DB::table('schedules')
        ->join('console_availables', 'schedules.console_available_id','console_availables.id')
        ->join('consoles', 'console_availables.console_id', 'consoles.id')
        ->orderBy('consoles.name', 'asc')
        ->select('schedules.*', 'console_availables.code' ,'consoles.name')
        ->get();


        $bookingListsArray = json_decode(json_encode($schedulesByConsole), true);

        $grouped = array();
        foreach($bookingListsArray as $b) {

            $key = $b['console_available_id'];

            if (array_key_exists($key, $grouped)) {
                array_push($grouped[$key]['schedules'], $b);
            } else {
                $grouped[$key] = array('name'=> $b['name'], 'console_available_id'=> $key,'schedules' => array($b));
            }
        }

        // echo json_encode($grouped,JSON_PRETTY_PRINT);

        $schedulesByConsole = json_decode(json_encode($grouped));
    

        return view('schedule.list', ['schedulesByConsole' => $schedulesByConsole]);
    }
}
