<?php
    
namespace App\Http\Controllers;
    
use App\Models\Crud;
use Illuminate\Http\Request;
    
class CrudController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:crud-list|product-create|crud-edit|crud-delete', ['only' => ['index','show']]);
         $this->middleware('permission:crud-create', ['only' => ['create','store']]);
         $this->middleware('permission:crud-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:crud-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dekstop.cruds.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dekstop.cruds.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'detail' => 'required',
        ]);
        $path = $request->file('image')->store('public/images');
        
        $crud = new Crud;
        $crud->name = $request->name;
        $crud->detail = $request->detail;
        $crud->image = $path;
        $crud->save();
        // Crud::create($request->all());
        return redirect()->route('dekstop.cruds.index')
                        ->with('success','Product created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        return view('dekstop.cruds.show',compact('crud'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Crud $crud)
    {
        return view('dekstop.cruds.edit',compact('crud'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $crud = Crud::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $crud->image = $path;
        }

        $crud->name = $request->name;
        $crud->detail = $request->detail;
        
        $crud->save();
        // $crud->update($request->all());
        return redirect()->route('dekstop.cruds.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crud $crud)
    {
        $crud->delete();
        \Storage::delete($crud->image);

        return redirect()->route('dekstop.cruds.index')
                        ->with('success','Product deleted successfully');
    }
}
