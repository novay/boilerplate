<?php 

namespace App\Traits;

use ProtoneMedia\Splade\Facades\Splade;
use Illuminate\Http\Request;

trait ControllerTrait
{
    /**
     * Display the list items.
     */
    public function index(Request $request)
    {
        $table = Splade::onLazy(fn () => $this->table);

        return view("{$this->view}.index", compact('table'));
    }

    /**
     * Display form create page.
     */
    public function create(Request $request)
    {
        return view('components.form', [
            'subtitle' => __('Create'), 
            'form' => $this->forms(route("{$this->prefix}.store"), 'POST')
        ]);
    }

    /**
     * Store data into database.
     */
    public function store(Request $request)
    {
        $input = $this->rules($request);
        $input = $this->customStore($request, $input);

        $this->data->create($input);

        Splade::toast(__('value.created', ['title' => $this->title]));
        return redirect()->route("{$this->prefix}.index");
    }

    /**
     * Display form edit page.
     */
    public function edit(Request $request, $id)
    {
        $edit = $this->data->find($id);

        return view('components.form', [
            'subtitle' => __('Edit'), 
            'edit' => $edit->id, 
            'form' => $this->forms(route("{$this->prefix}.update", $id), 'PUT', $edit)
        ]);
    }

    /**
     * Update data from database.
     */
    public function update(Request $request, $id)
    {
        $edit = $this->data->find($id);
        $input = $this->rules($request, $edit);
        $input = $this->customEdit($request, $input, $edit);
        
        $edit->update($input);

        Splade::toast(__('value.updated', ['title' => $this->title]));
        return redirect()->route("{$this->prefix}.index");
    }

    /**
     * Delete data from database.
     */
    public function destroy(Request $request, $id)
    {
        $data = $this->data->find($id);
        $data->delete();

        Splade::toast(__('value.deleted', ['title' => $this->title]));
        return redirect()->route("{$this->prefix}.index");
    }

    /**
     * Custom function.
     */
    public function customStore(Request $request, $input)
    {
        return $input;
    }

    /**
     * Custom function.
     */
    public function customEdit(Request $request, $input, $edit)
    {
        return $input;
    }
}
