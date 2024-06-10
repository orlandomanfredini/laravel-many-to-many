<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use Illuminate\Http\Request;
use App\Models\type;
use Illuminate\Support\Str;
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $types= Type::orderBy('type', 'asc')->get();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $types=Type::orderBy('type', 'asc')->get();

        return view('admin.types.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        //
        $data = $request->validated();
        $slug = Str::slug($data['type']); 
        $slug_demo = $slug;

        $n=0;

        do{
            $find= Type::where('slug', $slug)->first();

            if($find !== null){
                $n++;
                $slug_demo = $slug . '-' . $n;
            }
        }while($find !== null);

        $data['slug']=$slug;

        $new_type = Type::create($data);

        return to_route('admin.types.index', compact('new_type'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
        $type->delete();
        return to_route('admin.types.index');
    }
}
