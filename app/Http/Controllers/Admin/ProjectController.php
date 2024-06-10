<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Tecnology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Type;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $types= Type::orderBy('type', 'asc')->get();
        $tecnologys= Tecnology::orderBy('tecnology', 'asc')->get();

        return view('admin.projects.create', compact('types', 'tecnologys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
        $form_data= $request->validated();

        $slug = Str::slug($form_data['title']); 
        $slug_demo = $slug;

        $n=0;

        do{
            $find= Project::where('slug', $slug)->first();

            if($find !== null){
                $n++;
                $slug_demo = $slug . '-' . $n;
            }
        }while($find !== null);

        $form_data['slug']=$slug;

      

        $new_project= Project::create($form_data);
        

        if($request->has('tecnologys')){
            $new_project->tecnologies()->attach($request->tecnologys);
        }

        return to_route('admin.projects.show', $new_project);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        $project->load(['tecnologies']);
        $types= Type::orderBy('type', 'asc')->get();
        $tecnologys= Tecnology::orderBy('tecnology', 'asc')->get();
       
        return view('admin.projects.edit', compact('project', 'types', 'tecnologys'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
        $form_data= $request->validated();

        $project->update($form_data);

        // if ($request->has('tencnologys')) {
        //     $project->tecnologies()->sync($request->tecnologys);
        // } else {
        //     // l'utente non ha selezionato niente eliminiamo i collegamenti con i tags
        //     $project->tecnologies()->detach();
        //     // $project->tags()->sync([]); // fa la stessa cosa
        // }
        $project->tecnologies()->sync($request->tecnologys ?? []);
       
        
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return to_route('admin.projects.index');
    }
}
