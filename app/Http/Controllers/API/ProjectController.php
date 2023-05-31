<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with(['technologies','type'])->paginate(6);//get();

        return response()->json([
           'success' => true,
           'results' => $projects
        ]);
    }
    public function show($id){
        $project = Project::where('id', $id)->with(['technologies','type'])->first();
         return response()->json([
            'success'=>true,
            'post'=> $project
         ]);
    }
}
