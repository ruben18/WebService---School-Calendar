<?php

namespace App\Http\Controllers\API;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Task as TaskResource;

class TaskController extends Controller
{
    public function create(Request $request){
       Task::create($request->all());
       return response()->json([
           'status'=>201
       ]);
   }

   public function index(){
        $id=1;
        return TaskResource::collection(Task::where('user_id',$id)->get());
   }

   public function update(Request $request, $id){
       Task::findOrFail($id)->update($request->all());
       return response()->json([
           'status'=>200
       ]);
   }

    public function delete( $id){
        Task::findOrFail($id)->delete();
        return response()->json([
            'status'=>200
        ]);
    }
}
