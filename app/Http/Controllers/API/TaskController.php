<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Task as TaskResource;

class TaskController extends Controller
{
    public function create(TaskRequest $request){
       Task::create($request->all());
       return response()->json([
           'status'=>201
       ]);
   }

   public function index(){
        $id=1;
        return TaskResource::collection(Task::where('user_id',$id)->get());
   }

   public function update(TaskRequest $request, $id){
       $task=Task::find($id);

       if($task==null){
           return response()->json(['status'=>404]);
       }

       $task->update($request->all());
       return response()->json([
           'status'=>200
       ]);
   }

    public function delete( $id){
        $task=Task::find($id);

        if($task==null){
            return response()->json(['status'=>404]);
        }

        $task->delete();

        return response()->json([
            'status'=>200
        ]);
    }


}
