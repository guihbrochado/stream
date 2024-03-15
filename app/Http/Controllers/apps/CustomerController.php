<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerFormRequest;
use App\Models\Customer;
use App\Models\CustomerStatus;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $data = DB::table('customers as c')
                ->join('users as u', 'u.id', '=', 'c.user_id')
                ->join('customer_statuses as cs', 'cs.id', '=', 'c.customer_status_id')
                ->select('c.*', 'u.name', 'u.email', 'cs.customer_status')
                ->orderBy('u.name', 'asc')
                ->get();

        $message = session('message');

        return view('apps.customer.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Display a listing of the resource.
     */
    public function grid() {
        $data = DB::table('customers as c')
                ->join('users as u', 'u.id', '=', 'c.user_id')
                ->join('customer_statuses as cs', 'cs.id', '=', 'c.customer_status_id')
                ->select('c.*', 'u.name', 'u.email', 'u.trader_image_path', 'cs.customer_status')
                ->orderBy('u.name', 'asc')
                ->get();

        $message = session('message');

        return view('apps.customer.grid')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $customer = new Customer;
        $users = User::orderBy('name')->get();
        $customer_statuses = CustomerStatus::orderBy('id')->get();

        return view('apps.customer.form')->with(['customer' => $customer, 'customer_statuses' => $customer_statuses, 'users' => $users, 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerFormRequest $request) {
        try {
            $customer = Customer::create(
                            [
                                'user_id' => $request->user_id,
                                'customer_status_id' => $request->customer_status_id
                            ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('customer.index')->with('message', $errorInfo);
        }

        return to_route('customer.index')->with('message', "Registered '{$customer->id}' customer");
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $customer = Customer::find($id);
        if ($customer === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        $users = User::orderBy('name')->get();
        $customer_statuses = CustomerStatus::orderBy('id')->get();

        return view('apps.customer.form')->with(['customer' => $customer, 'customer_statuses' => $customer_statuses, 'users' => $users, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $customer = Customer::find($id);
        if ($customer === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        $users = User::orderBy('name')->get();
        $customer_statuses = CustomerStatus::orderBy('id')->get();

        return view('apps.customer.form')->with(['customer' => $customer, 'customer_statuses' => $customer_statuses, 'users' => $users, 'action' => 'edit']);
    }

    public function editProfile($user_id) {
        $data = DB::table('customers as c')
                ->join('users as u', 'u.id', '=', 'c.user_id')
                ->join('customer_statuses as cs', 'cs.id', '=', 'c.customer_status_id')
                ->leftjoin('addresses as a', 'a.user_id', '=', 'u.id')
                ->select('c.*', 'u.name', 'u.email', 'u.password', 'cs.customer_status', 'a.street', 'a.district', 'a.city', 'a.state')
                ->where('c.id', $user_id)
                ->first();

        if ($data === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        $user = Auth::user();
        $data->client = $user->can('client');
        $data->user = $user->can('user');
        $data->admin = $user->can('admin');

        return view('apps.user.form')->with(['user' => $data, 'action' => 'edit', 'street' => $data->street, 'district' => $data->district, 'city' => $data->city, 'state' => $data->state]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerFormRequest $request, $id) {
        $customer = Customer::find($id);
        if ($customer === null) {
            return to_route('customer.index')
                            ->with('message', "Dados inválidos");
        }

        $customer->fill($request->all());
        try {
            $customer->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('customer.index')->with('message', $errorInfo);
        }

        return to_route('customer.index')
                        ->with('message', "'{$customer->id}' updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $customer = Customer::find($id);
        if ($customer === null) {
            return to_route('customer.index')
                            ->with('message', "Dados inválidos");
        }
        try {
            $customer->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('customer.index')->with('message', $errorInfo);
        }

        return to_route('customer.index')
                        ->with('message', "'{$customer->name}' deleted");
    }

    /**
     * Return customer profile
     */
    public function profile($id) {
        $data = DB::table('customers as c')
                ->join('users as u', 'u.id', '=', 'c.user_id')
                ->join('customer_statuses as cs', 'cs.id', '=', 'c.customer_status_id')
                ->leftJoin('addresses as a', 'a.user_id', '=', 'u.id')
                ->leftJoin('about_user as au', 'au.user_id', '=', 'u.id' )
                ->select('c.*', 'u.name', 'u.email', 'u.phone', 'u.trader_image_path', 'au.description', 'au.experience','cs.customer_status', 'a.street', 'a.district', 'a.city', 'a.state')
                ->where('c.id', $id)
                ->first();

        if ($data === null) {
            // Retorne uma resposta ou execute uma ação caso o usuário não seja encontrado
            // return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        $user = new User();
        $user->id = $data->id;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->phone = $data->phone;
        $user->trader_image_path = $data->trader_image_path;

        if ($data !== null) {
            $user->street = $data->street;
            $user->district = $data->district;
            $user->city = $data->city;
            $user->state = $data->state;
            $user->description = $data->description;
            $user->experience = $data->experience;
        } else {
            // Defina os campos de endereço como vazios ou nulos no objeto $user
            $user->street = '';
            $user->district = '';
            $user->city = '';
            $user->state = '';
            $user->description = '';
            $user->experience = '';
        }

        // Atribua outros dados do usuário, se necessário

        return view('apps.customer.profile')->with(['user' => $user]);
    }
}
