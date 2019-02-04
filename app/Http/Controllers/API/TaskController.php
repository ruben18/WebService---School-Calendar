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
        $user=auth()->user();

        Task::create([
            'date'=>$request->get('date'),
            'description'=>$request->get('description'),
            'user_id'=>$user->id
        ]);
        return response()->json([
            'status'=>201
        ],201);
   }

   public function index(){
        $user=auth()->user();
        return TaskResource::collection(Task::where('user_id',$user->id)->get());
   }

   public function update(TaskRequest $request, $id){
       $user=auth()->user();

       $task=Task::find($id);

       if($task==null){
           return response()->json(['status'=>404],404);
       }

       if($task->user_id!=$user->id){
           return response()->json(['status'=>401],401);
       }

       $task->update([
           'date'=>$request->get('date'),
           'description'=>$request->get('description')
       ]);

       return response()->json([
           'status'=>200
       ],200);
   }

    public function delete( $id){
        $user=auth()->user();
        $task=Task::find($id);

        if($task==null){
            return response()->json(['status'=>404],404);
        }

        if($task->user_id!=$user->id){
            return response()->json(['status'=>401],401);
        }

        $task->delete();

        return response()->json([
            'status'=>200
        ],200);
    }


}
