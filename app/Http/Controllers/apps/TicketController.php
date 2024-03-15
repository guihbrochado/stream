<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketFormRequest;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\TicketReply;
use App\Models\TicketStatus;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as FacadesRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 0)
    {
        //DB::enableQueryLog();
        //Log::info($request->broker);
        $dados = DB::table('tickets as t')
            ->join('users as u', 'u.id', '=', 't.user_id')
            ->join('ticket_categories as tc', 'tc.id', '=', 't.ticket_category_id')
            ->join('ticket_statuses as ts', 'ts.id', '=', 't.ticket_status_id')
            ->select('t.*', 'u.name as username', 'u.email as useremail', 'tc.order as c_order', 'tc.title as category', 'ts.title as status', 'ts.order as s_order', 'ts.style', 'ts.title as s_title');
        if ($id != 0) {
            $dados  = $dados->where('t.ticket_category_id', '=', $id);
        }
        $data = $dados->orderBy('t.created_at', 'desc')
            ->get();

        $ticket_statusses = TicketStatus::orderBy('order')->get();
        $ticket_categories = TicketCategory::orderBy('order')->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        //return view('apps.account.index')->with('data', $data)->with('message', $message);
        return view('apps.ticket.ticket')->with(['data' => $data, 'message' => $message, 'ticket_statusses' => $ticket_statusses, 'ticket_categories' => $ticket_categories, 'action' => 'create', 'admin' => true, 'selected_category_id' => $id]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_client($id = 0)
    {

        //DB::enableQueryLog();
        //Log::info($request->broker);
        $dados  = DB::table('tickets as t')
            ->join('users as u', 'u.id', '=', 't.user_id')
            ->join('ticket_categories as tc', 'tc.id', '=', 't.ticket_category_id')
            ->join('ticket_statuses as ts', 'ts.id', '=', 't.ticket_status_id')
            ->select('t.*', 'u.name as username', 'u.email as useremail', 'tc.order as c_order', 'tc.title as category', 'ts.title as status', 'ts.order as s_order', 'ts.style', 'ts.title as s_title')
            ->where('t.user_id', '=', Auth::user()->id);
        if ($id != 0) {
            $dados  = $dados->where('t.ticket_category_id', '=', $id);
        }
        $data = $dados->orderBy('t.created_at', 'desc')
            ->get();

        $ticket_statusses = TicketStatus::orderBy('order')->get();
        $ticket_categories = TicketCategory::orderBy('order')->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        //return view('apps.account.index')->with('data', $data)->with('message', $message);
        return view('apps.ticket.ticket')->with(['data' => $data, 'message' => $message, 'ticket_statusses' => $ticket_statusses, 'ticket_categories' => $ticket_categories, 'action' => 'create', 'admin' => false, 'selected_category_id' => $id]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ticket_categories_qtd(Request $request)
    {
        //Log::info($request);
        //DB::enableQueryLog();       
        $ticket_categories_qtd = DB::table('tickets as t')
            ->selectRaw('t.ticket_category_id, count(t.ticket_category_id) as qtd')
            ->where('t.ticket_status_id', '!=', '4') // concluídos
            ->groupBy('t.ticket_category_id')
            ->get();
        //Log::info(DB::getQueryLog());
        //Log::info($ticket_categories_qtd);

        return $ticket_categories_qtd;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ticket_categories_qtd_client(Request $request)
    {
        //Log::info($request);
        //DB::enableQueryLog();       
        $ticket_categories_qtd = DB::table('tickets as t')
            ->selectRaw('t.ticket_category_id, count(t.ticket_category_id) as qtd')
            ->where('t.ticket_status_id', '!=', '4') // concluídos
            ->where('t.user_id', '=', Auth::user()->id)
            ->groupBy('t.ticket_category_id')
            ->get();
        //Log::info(DB::getQueryLog());
        //Log::info($ticket_categories_qtd);

        return $ticket_categories_qtd;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ticket_status(Request $request)
    {
        //Log::info($request);
        //DB::enableQueryLog();       
        $data = DB::table('tickets as t')
            ->join('ticket_statuses as ts', 'ts.id', '=', 't.ticket_status_id')
            ->join('ticket_categories as tc', 'tc.id', '=', 't.ticket_category_id')
            ->select('t.ticket_status_id', 'ts.title as status', 'ts.order as s_order', 't.ticket_category_id', 'ts.style', 'tc.icon', 'tc.title as category')
            ->where('t.id', '=', $request->id)
            ->first();
        //Log::info(DB::getQueryLog());
        //Log::info($data);

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = session('message');

        $ticket = new Ticket();
        $ticket_statusses = TicketStatus::orderBy('order')->get();
        $ticket_categories = TicketCategory::orderBy('order')->get();

        return view('apps.ticket.form')->with(['message' => $message, 'ticket' => $ticket, 'ticket_statusses' => $ticket_statusses, 'ticket_categories' => $ticket_categories, 'action' => 'create']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_client()
    {
        $message = session('message');

        $ticket = new Ticket();
        $ticket_statusses = TicketStatus::orderBy('order')->get();
        $ticket_categories = TicketCategory::orderBy('order')->get();

        return view('apps.ticket.form')->with(['message' => $message, 'ticket' => $ticket, 'ticket_statusses' => $ticket_statusses, 'ticket_categories' => $ticket_categories, 'action' => 'create_client']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = session('message');

        // atualiza status de "novo" para "lido"
        $ticket = Ticket::find($id);
        if ($ticket->ticket_status_id == 1) {
            $ticket->ticket_status_id = 2;
            try {
                $ticket->save();
            } catch (Exception $e) {
                $message = $e->getMessage();
            }
        }

        $data = DB::table('tickets as t')
            ->join('users as u', 'u.id', '=', 't.user_id')
            ->join('ticket_categories as tc', 'tc.id', '=', 't.ticket_category_id')
            ->join('ticket_statuses as ts', 'ts.id', '=', 't.ticket_status_id')
            ->select('t.*', 'u.name as username', 'u.email as useremail', 'tc.order as c_order', 't.ticket_category_id', 'tc.icon', 'tc.title as category', 'ts.order as s_order', 'ts.style', 'ts.title as s_title')
            ->where('t.id', '=', $id)
            ->orderBy('t.created_at', 'desc')
            ->get();

        $ticket_statusses = TicketStatus::orderBy('order')->get();
        $ticket_categories = TicketCategory::orderBy('order')->get();

        return view('apps.ticket.edit')->with(['ticket' => $data[0], 'message' => $message, 'ticket_statusses' => $ticket_statusses, 'ticket_categories' => $ticket_categories, 'action' => 'edit', 'admin' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_client($id)
    {
        $message = session('message');

        $data = DB::table('tickets as t')
            ->join('users as u', 'u.id', '=', 't.user_id')
            ->join('ticket_categories as tc', 'tc.id', '=', 't.ticket_category_id')
            ->join('ticket_statuses as ts', 'ts.id', '=', 't.ticket_status_id')
            ->select('t.*', 'u.name as username', 'u.email as useremail', 'tc.order as c_order', 't.ticket_category_id', 'tc.icon', 'tc.title as category', 'ts.order as s_order', 'ts.style', 'ts.title as s_title')
            ->where('t.id', '=', $id)
            ->orderBy('t.created_at', 'desc')
            ->get();

        $ticket_statusses = TicketStatus::orderBy('order')->get();
        $ticket_categories = TicketCategory::orderBy('order')->get();

        return view('apps.ticket.edit')->with(['ticket' => $data[0], 'message' => $message, 'ticket_statusses' => $ticket_statusses, 'ticket_categories' => $ticket_categories, 'action' => 'edit', 'admin' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
        //Log::info($request);
        //$request->validate($this->conta->rules(), $this->conta->feedback());
        try {
            $ticket = Ticket::create(
                [
                    'starred' => 0, //não favoritado por padrão
                    'ticket_category_id' => $request->ticket_category_id,
                    'ticket_status_id' => 1, // novo
                    'user_id' => Auth::user()->id,
                    'title' => $request->title,
                    'description' => $request->description
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();

            //Log::info($errorInfo);
            return to_route('ticket.create')->with('message', $errorInfo);
        }
        
        $successMessage = "Registrado ticket nº {$ticket->id} . Agradecemos pelo contato! Retornaremos em até 5 dias úteis. ";
        //return to_route('ticket.edit' .  $ticket->id)->with('message', "Registrado ticket nº {$ticket->id}");
        //return redirect()->route('apps.ticket.ticket', ['id' => $ticket->id])->with('message', "Registrado ticket nº {$ticket->id}");

        return redirect()->route('ticket.index')->with('message', $successMessage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_client(TicketFormRequest $request)
    {
        //Log::info($request);
        //$request->validate($this->conta->rules(), $this->conta->feedback());

        try {
            $ticket = Ticket::create(
                [
                    'starred' => 0, //não favoritado por padrão
                    'ticket_category_id' => $request->ticket_category_id,
                    'ticket_status_id' => 1, // novo
                    'user_id' => Auth::user()->id,
                    'title' => $request->title,
                    'description' => $request->description
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();

            //Log::info($errorInfo);
            return to_route('suporte.create')->with('message', $errorInfo);
        }
        
        $successMessage = "Registrado ticket nº {$ticket->id}. Agradecemos pelo contato! Retornaremos em até 5 dias úteis. ";
        
        //return to_route('ticket.edit' .  $ticket->id)->with('message', "Registrado ticket nº {$ticket->id}");
        //return redirect()->route('apps.ticket.ticket', ['id' => $ticket->id])->with('message', "Registrado ticket nº {$ticket->id}");

        return redirect()->route('suporte.index')->with('message', $successMessage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id, $status_id)
    {
        $message = session('message');

        $ticket = Ticket::find($id);
        $ticket->ticket_status_id = $status_id;
        try {
            $ticket->save();
            $message = "Status do ticket nº {$ticket->id} alterado com sucesso";
        } catch (Exception $e) {
            $message = $e->getMessage();
        }

        return to_route('ticket.edit', ['id' => $ticket->id])->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($id, $category_id)
    {
        $message = session('message');

        //DB::enableQueryLog();
        $ticket = Ticket::find($id);
        $ticket->ticket_category_id = $category_id;
        try {
            $ticket->save();
            $message = "Categoria do ticket nº {$ticket->id} alterada com sucesso";
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        //Log::info(DB::getQueryLog());

        return to_route('ticket.edit', ['id' => $ticket->id])->with('message', $message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function image_upload(Request $request)
    {
        //Log::info($request);
        $fileName = '';
        $folder = DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR .'tickets';
        $path_to_move = env('APP_PUBLIC_DIR') . $folder;

        /*
        $request->validate([
            'file' => 'required|file|size:100',
          ]);
        */

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            //Log::info($request->file('file')->getSize());
            $path = $request->file('file')->store('temp');
            $file = $request->file('file');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($path_to_move, $fileName);
        } else {
            //Log::info('[ERRO]');
            return response()->json(['location' => '[ERRO] Não foi possível carregar a imagem.']);
        }

        return response()->json(['location' => 'images/tickets/' . $fileName]);
    }
}
