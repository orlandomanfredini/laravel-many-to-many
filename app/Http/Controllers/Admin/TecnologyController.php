<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tecnology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tecnologies= Tecnology::orderBy('tecnology', 'asc')->get();

        return view('admin.tecnologies.index', compact('tecnologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tecnologies= Tecnology::orderBy('tecnology', 'asc');
        return to_route('admin.tecnologies.create', compact('tecnologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data= $request->validated();
        $slug = Str::slug($data['type']); 
        $slug_demo = $slug;

        $n=0;

        do{
            $find= Tecnology::where('slug', $slug)->first();

            if($find !== null){
                $n++;
                $slug_demo = $slug . '-' . $n;
            }
        }while($find !== null);

        $data['slug']=$slug;

        $new_tecnologies= Tecnology::create($data);

        return to_route('admin.tecnologies.index', compact('new_tecnologies'));

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
    public function destroy(string $id)
    {
        //
    }
}
