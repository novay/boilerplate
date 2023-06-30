<?php

namespace App\Http\Controllers\Panel;

use App\Models\User;
use App\Tables\UserTable;
use App\Traits\ControllerTrait;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\Splade;

class UserController extends Controller
{
    use ControllerTrait;

    protected $title = 'Users';

    protected $data, $table;
    protected $prefix, $view;

    public function __construct()
    {
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
            'password' => 'nullable', 
            'phone' => 'nullable|max:20', 
            'address' => 'nullable'
        ]);
    }

    public function customStore(Request $request, $input)
    {
        $input['password'] = $request->filled('password') ? bcrypt($request->password) : str()->random(5);

        return $input;
    }

    public function customEdit(Request $request, $input, $edit)
    {
        $input['password'] = $request->filled('password') ? bcrypt($request->password) : $edit->password;
        
        return $input;
    }
}