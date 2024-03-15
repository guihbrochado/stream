<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketReplyFormRequest;
use App\Models\TicketReply;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TicketReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Log::info($request);
        //DB::enableQueryLog();        
        $ticket_replies = DB::table('ticket_replies as tr')
            ->join('users as u', 'u.id', '=', 'tr.user_id')
            ->select('tr.*', 'u.name as username', 'u.email as useremail')
            ->where('tr.ticket_id', '=', $request->id)
            ->orderBy('tr.created_at', 'asc')
            ->get();
        //Log::info(DB::getQueryLog());
        return $ticket_replies;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketReplyFormRequest $request)
    {
        //Log::info($request);
        //$request->validate($this->conta->rules(), $this->conta->feedback());

        try {
            $ticket = TicketReply::create(
                [
                    'ticket_id' => $request->id,
                    'user_id' => Auth::user()->id,
                    'reply' => $request->reply
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();

            return redirect()->route('ticket.edit', ['id' => $request->id])->with('message', $errorInfo);
        }

        return redirect()->route('ticket.edit', ['id' => $request->id])->with('message', "Resposta enviada com sucesso");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_client(TicketReplyFormRequest $request)
    {
        //Log::info($request);
        //$request->validate($this->conta->rules(), $this->conta->feedback());

        try {
            $ticket = TicketReply::create(
                [
                    'ticket_id' => $request->id,
                    'user_id' => Auth::user()->id,
                    'reply' => $request->reply
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();

            return redirect()->route('suporte.edit', ['id' => $request->id])->with('message', $errorInfo);
        }

        return redirect()->route('suporte.edit', ['id' => $request->id])->with('message', "Resposta enviada com sucesso");
    }
}
