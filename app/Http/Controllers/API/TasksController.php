<?php

namespace App\Http\Controllers\API;

use App\Tasks;
use App\Http\Controllers\Controller;
use App\Http\Resources\TasksResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Tasks::all();
        return response(['tasks' => TasksResource::collection($tasks), 'message' => 'Tarefas recebidas com sucesso'], 200);
    }

     public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nome' => 'required|max:255',
            'data' => 'required|nullable|date',
            'hora' => 'date_format:H:i',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $task = Tasks::create($data);

        return response(['task' => new TasksResource($task), 'message' => 'Tarefa criada com sucesso!'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tasks  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        return response(['tasks' => new TasksResource($tasks), 'message' => 'Exibindo Tarefas'], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tasks  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $task)
    {

        $task->update($request->all());

        return response(['task' => new TasksResource($task), 'message' => 'Tarefa atualizada com sucesso!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Tasks $task
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();

        return response(['message' => 'Tarefa Deletada' . $task]);
    }
}
