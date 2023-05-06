<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Tables\UserTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\Splade;

class UserController extends Controller
{
    protected $title = 'Users';
    protected $prefix = 'users';
    protected $view = 'users';
    protected $data;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->data = new User;

        view()->share([
            'title' => $this->title, 
            'prefix' => $this->prefix, 
            'view' => $this->view
        ]);
    }

    /**
     * Display the list items.
     */
    protected function rules(Request $request, $data = null)
    {
        return $request->validate([
            'name' => 'required|max:255', 
            'email' => 'required|max:255|email|unique:users,email'.(!is_null($data) ? ','.$data->id : ''), 
            'phone' => 'nullable|max:20'
        ]);
    }

    /**
     * Display the list items.
     */
    public function index(Request $request)
    {
        return view("{$this->view}.index", [
            'users' => UserTable::class
        ]);
    }

    /**
     * Display form create page.
     */
    public function create(Request $request)
    {
        return view("{$this->view}.create");
    }

    /**
     * Store data into database.
     */
    public function store(Request $request)
    {
        $input = $this->rules($request);
        $this->data->create($input);

        Splade::toast(__('message.created', ['attribute' => $this->title]));
        return redirect()->route("{$this->prefix}.index");
    }

    /**
     * Display form edit page.
     */
    public function edit(Request $request, $id)
    {
        $edit = $this->data->find($id);

        return view("{$this->view}.edit", compact('edit'));
    }

    /**
     * Update data from database.
     */
    public function update(Request $request, $id)
    {
        $edit = $this->data->find($id);

        $input = $this->rules($request, $edit);
        $edit->update($input);

        Splade::toast("{$this->title} updated successfully");
        return redirect()->route("{$this->prefix}.index");
    }

    /**
     * Delete data from database.
     */
    public function destroy(Request $request, $id)
    {
        $data = $this->data->find($id);
        $data->delete();

        Splade::toast("{$this->title} deleted successfully");
        return redirect()->route("{$this->prefix}.index");
    }
}