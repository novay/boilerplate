<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Tables\UserTable;
use App\Models\User;

class UserController extends Controller
{
    use \App\Traits\ControllerTrait;

    protected $title, $prefix, $view;
    protected $data, $table;

    public function __construct()
    {
        $this->title = ___('Pengguna');

        $this->data = new User;
        $this->table = new UserTable;
        
        $this->prefix = 'panel.users';
        $this->view = 'panel.users';

        view()->share([
            'title' => $this->title, 
            'prefix' => $this->prefix, 
            'view' => $this->view
        ]);
    }

    protected function rules(Request $request, $data = null)
    {
        return $request->validate([
            'name' => 'required|max:255', 
            'email' => 'required|max:255|email|unique:users,email'.(!is_null($data) ? ','.$data->id : ''), 
            'password' => (is_null($data) ? 'required' : 'nullable'), 
            'phone' => 'nullable|max:20', 
            'address' => 'nullable'
        ], [
            'required' => ___('Kolom ini harus diisi.')
        ]);
    }

    public function customStore(Request $request, $input)
    {
        $random = str()->random(5);

        $input['password'] = $request->filled('password') ? bcrypt($request->password) : bcrypt($random);
        $input['plain'] = $request->filled('password') ? encrypt($request->password) : encrypt($random);

        return $input;
    }

    public function customEdit(Request $request, $input, $edit)
    {
        $input['password'] = $request->filled('password') ? bcrypt($request->password) : $edit->password;
        $input['plain'] = $request->filled('password') ? encrypt($request->password) : $edit->plain;
        
        return $input;
    }
}