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
        return view("{$this->view}.create", [
            'subtitle' => ___('Tambah')
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

        Splade::toast(___("{$this->title} baru berhasil ditambahkan!"));
        return redirect()->back();
    }

    /**
     * Display form edit page.
     */
    public function edit(Request $request, $id)
    {
        $edit = $this->data->findOrFail($id);
        
        return view("{$this->view}.edit", [
            'subtitle' => ___('Sunting'), 
            'edit' => $edit
        ]);
    }

    /**
     * Update data from database.
     */
    public function update(Request $request, $id)
    {
        $edit = $this->data->findOrFail($id);
        $input = $this->rules($request, $edit);
        $input = $this->customEdit($request, $input, $edit);
        
        $edit->update($input);

        Splade::toast(___("{$this->title} berhasil diperbarui!"));
        return redirect()->back();
    }

    /**
     * Delete data from database.
     */
    public function destroy(Request $request, $id)
    {
        $data = $this->data->findOrFail($id);
        $this->customDelete($request, $id);
        $data->delete();

        Splade::toast(___("{$this->title} telah dihapus!"));
        return redirect()->back();
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

    /**
     * Custom function.
     */
    public function customDelete(Request $request, $id)
    {
        return;
    }
}
