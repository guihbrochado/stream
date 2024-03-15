<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Address;
use App\Models\AboutUser;
use Illuminate\Validation\Rule;
use App\Models\UserFinancialDetail;
use Illuminate\Support\Carbon;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = DB::table('users as u')
                ->selectRaw('u.id, u.name, u.email, u.cpf, u.created_at, u.updated_at')
                ->selectRaw('(select 1 from model_has_permissions mpr where mpr.model_id = u.id and mpr.permission_id = 1 limit 1) as admin')
                ->selectRaw('(select 1 from model_has_permissions mpr where mpr.model_id = u.id and mpr.permission_id = 2 limit 1) as user')
                ->selectRaw('(select 1 from model_has_permissions mpr where mpr.model_id = u.id and mpr.permission_id = 3 limit 1) as client')
                ->orderBy('u.name', 'asc')
                ->get();

        $message = session('message');

        return view('apps.user.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile() {
        $user = User::find(Auth::user()->id);
        if ($user === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.user.profile')->with(['user' => $user, 'action' => 'show']);
    }

    public static function createToken($id, $name) {
        $data = User::find($id);

        if ($data === null) {
            return response()->json(['erro' => 'Dado pesquisado não existe'], Response::HTTP_NOT_FOUND); // 404 => Not Found
        }
        return $data->createToken($name)->plainTextToken;
    }

    public static function deleteTokens($id) {
        $data = User::find($id);

        if ($data)
            $data->tokens()->delete();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $user = new User();
        $address = new Address();
        $aboutUser = new AboutUser();
        $expiryDate = new UserFinancialDetail();

        $street = '';
        $district = '';
        $city = '';
        $state = '';
        $phone = '';
        $description = '';
        $experience = '';

        return view('apps.user.form')->with([
                    'user' => $user,
                    'address' => $address,
                    'street' => $street,
                    'district' => $district,
                    'city' => $city,
                    'state' => $state,
                    'phone' => $phone,
                    'aboutUser' => $aboutUser,
                    'description' => $description,
                    'experience' => $experience,
                    'expiry_date' => $expiryDate,
                    'action' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    /* public function store(UserFormRequest $request) {
      $user = new User();
      $user->email = $request->email;
      $user->name = $request->name;
      $user->password = Hash::make($request->password);


      if ($request->hasFile('trader_image_path') && $request->file('trader_image_path')->isValid()) {
      $file = $request->file('trader_image_path');
      $extension = $file->extension();
      $fileTraderName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
      $file->move(public_path('images/users'), $fileTraderName);
      $user->trader_image_path = $fileTraderName;
      }

      try {
      $user->save();
      } catch (Exception $e) {
      // Você pode obter os detalhes do erro usando `getMessage()`:
      $errorInfo = $e->getMessage();
      return to_route('user.index')->with('message', $errorInfo);
      }

      if ($request->client == 1)
      $user->givePermissionTo('client');
      if ($request->user == 1)
      $user->givePermissionTo('user');
      if ($request->admin == 1)
      $user->givePermissionTo('admin');

      return to_route('user.index')->with('message', "Registered '{$user->name}' user");
      } */

    public function store(UserFormRequest $request) {
        $fileUserName = '';
        $fileAuxName = '';
        $folder = env('APP_PUBLIC_DIR') . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'users';

        if ($request->hasFile('trader_image_path') && $request->file('trader_image_path')->isValid()) {
            $file = $request->file('trader_image_path');
            $extension = $file->extension();
            $fileUserName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileUserName);
        }

        if ($request->hasFile('aux_image_path') && $request->file('aux_image_path')->isValid()) {
            $file = $request->file('aux_image_path');
            $extension = $file->extension();
            $fileAuxName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileAuxName);
        }


        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = bcrypt($request->input('password')); // supondo que você queira encriptar a senha
        $trader_image_path = $fileUserName;
        $cpf = $request->input('cpf');
        $expiryDate = $request->input('expiry_date');

        try {
            $user = User::create(
                            [
                                'name' => $name,
                                'email' => $email,
                                'phone' => $phone,
                                'password' => $password,
                                'trader_image_path' => $trader_image_path,
                                'cpf' => $cpf,
                            ]
            );

            $expire = UserFinancialDetail::create([
                        'user_id' => $user->id,
                        'expiry_date' => $expiryDate
            ]);

            $address = Address::create([
                        'user_id' => $user->id,
                        'street' => $request->input('street'),
                        'district' => $request->input('district'),
                        'city' => $request->input('city'),
                        'state' => $request->input('state')
            ]);

            $aboutUser = AboutUser::create([
                        'user_id' => $user->id,
                        'description' => $request->input('description'),
                        'experience' => $request->input('experience')
            ]);
        } catch (Exception $e) {
            $errorInfo = $e->getMessage();
            return redirect()->route('user.index')->with('message', $errorInfo);
        }
        return redirect()->route('user.index')->with('message', "Registrado o usuário '{$user->name}' com vencimento '{$expire->expiry_date}'");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::select('id', 'name', 'email')->where('id', '=', $id)->first();
        if ($user === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        $user->client = $user->can('client');
        $user->user = $user->can('user');
        $user->admin = $user->can('admin');

        return view('apps.user.form')->with(['user' => $user, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function edit($id)
      {
      $user = User::select('id', 'name', 'email')->where('id', '=', $id)->first();

      if ($user === null) {
      //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
      }

      $user->client = $user->can('client');
      $user->user = $user->can('user');
      $user->admin = $user->can('admin');

      return view('apps.user.form')->with(['user' => $user, 'action' => 'edit']);
      } */
    public function edit($id) {
        $user = User::with(['address', 'about_user', 'expiryDate'])
                        ->select('id', 'name', 'email', 'phone', 'trader_image_path', 'cpf')
                        ->where('id', '=', $id)->first();

        if ($user === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        $user->client = $user->can('client');
        $user->user = $user->can('user');
        $user->admin = $user->can('admin');

        $address = $user->address; // Acesso aos dados do endereço
        $street = $address ? $address->street : '';
        $district = $address ? $address->district : '';
        $city = $address ? $address->city : '';
        $state = $address ? $address->state : '';

        $financialDetails = $user->expiryDate;
        $expiryDate = $financialDetails ? $financialDetails->expiry_date : null;
        $expiryDateFormatted = $expiryDate ? (new Carbon($expiryDate))->format('Y-m-d') : null;

        $aboutUser = $user->about_user;
        $description = $aboutUser ? $aboutUser->description : '';
        $experience = $aboutUser ? $aboutUser->experience : '';

        return view('apps.user.form')->with([
                    'user' => $user,
                    'phone' => $user->phone,
                    'description' => $description,
                    'experience' => $experience,
                    'address' => $address,
                    'street' => $street,
                    'district' => $district,
                    'city' => $city,
                    'state' => $state,
                    'expiry_date' => $expiryDateFormatted,
                    'action' => 'edit'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile_edit() {
        $user = Auth::user();

        // Se o usuário não estiver autenticado, você pode redirecioná-lo para a página de login ou retornar um erro.
        if (!$user) {
            return redirect()->route('login'); // substitua 'login' pelo nome da sua rota de login, se for diferente.
        }

        // Carregar relacionamentos
        $user->load(['address', 'about_user']);

        $address = $user->address; // Acesso aos dados do endereço
        $street = $address ? $address->street : '';
        $district = $address ? $address->district : '';
        $city = $address ? $address->city : '';
        $state = $address ? $address->state : '';

        $aboutUser = $user->about_user;
        $description = $aboutUser ? $aboutUser->description : '';
        $experience = $aboutUser ? $aboutUser->experience : '';

        return view('apps.user.profile-form')->with([
                    'user' => $user,
                    'phone' => $user->phone,
                    'description' => $description,
                    'experience' => $experience,
                    'address' => $address,
                    'street' => $street,
                    'district' => $district,
                    'city' => $city,
                    'state' => $state,
                    'action' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::find($id);
        if ($user === null) {
            return to_route('user.index')
                            ->with('message', "Invalid data");
        }

        $input = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'trader_image_path' => $request->trader_image_path,
            'cpf' => $request->cpf,
        );

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
        ])->validate();

        $user->name = $request->name;

        if ($user->email != $request->email) {
            Validator::make($input, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ])->validate();

            $user->email = $request->email;
        }

        $user->phone = $request->phone;

        if ($request->cpf !== null) {
            Validator::make($input, [
                'string', 'max:11'
            ])->validate();

            $user->cpf = $request->cpf;
        }

        if ($request->password !== null) {
            Validator::make($input, [
                'password' => ['required', 'string', 'max:255'],
            ])->validate();

            $user->password = Hash::make($request->password);
        }

        $user->save();

        $address = Address::where('user_id', $user->id)->first();

        if ($address === null) {
            $address = new Address();
            $address->user_id = $user->id;
        }

        $address->street = $request->street;
        $address->district = $request->district;
        $address->city = $request->city;
        $address->state = $request->state;

        $address->save();

        $expiry = UserFinancialDetail::where('user_id', $user->id)->first();
        if ($expiry === null) {
            $expiry = new UserFinancialDetail();
            $expiry->user_id = $user->id;
        }
        $expiry->expiry_date = $request->expiry_date;
        $expiry->save();

        $aboutUser = AboutUser::where('user_id', $user->id)->first();

        if ($aboutUser === null) {
            $aboutUser = new AboutUser();
            $aboutUser->user_id = $user->id;
        }
        $aboutUser->description = $request->description;
        $aboutUser->experience = $request->experience;

        $aboutUser->save();

        if ($request->client == 1)
            $user->givePermissionTo('client');
        else
            $user->revokePermissionTo('client');

        if ($request->user == 1)
            $user->givePermissionTo('user');
        else
            $user->revokePermissionTo('user');

        if ($request->admin == 1)
            $user->givePermissionTo('admin');
        else
            $user->revokePermissionTo('admin');

        return to_route('user.index')
                        ->with('message', "'{$user->name}' atualizado com sucesso.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile_update(Request $request) {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Validação
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'description' => ['nullable', 'string', 'max:500'],
            'experience' => ['nullable', 'string', 'max:500'],
            'street' => ['nullable', 'string', 'max:255'],
            'district' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
                // Outras validações conforme necessário
        ]);

        // Atualização do usuário
        $user->update($validatedData);

        // Atualização ou criação de Address
        if ($user->address) {
            $user->address->update($validatedData);
        } else {
            $user->address()->create($validatedData);
        }

        // Atualização ou criação de AboutUser
        $aboutUserData = [
            'description' => $request->description,
            'experience' => $request->experience,
        ];

        if ($user->about_user) {
            $user->about_user->update($aboutUserData);
        } else {
            $user->about_user()->create($aboutUserData);
        }

        // Redirecionar de volta com a mensagem de sucesso
        return redirect()->route('profile.show')->with('message', "'{$user->name}' atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);

        if ($user === null) {
            return to_route('user.index')->with('message', "Invalid data");
        }

        try {
            // Exclui endereços associados ao usuário
            $user->address()->delete();
            $user->expiryDate()->delete();

            // Exclui o usuário
            $user->delete();

            return to_route('user.index')->with('message', "'{$user->name}' deleted");
        } catch (\Illuminate\Database\QueryException $e) {
            // Captura qualquer erro de banco de dados e retorna uma mensagem para o usuário
            return to_route('user.index')->with('message', "An error occurred while trying to delete '{$user->name}'.");
        }
    }
}
