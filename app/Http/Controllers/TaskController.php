<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //Defenir la methode qui va renvoyer la vue
    public function index()
    {
        $tasks = Task::all(); //sql request = SELECT *;
        return view('tasks_view.index', compact('tasks'));
    }

    public function create()
    {
        // dd('Méthode create appelée');
        return view('tasks_view.create');
    }

    // Traiter les données
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string|max:255|required',
            'description'=> 'string|max:1000|required'
        ]);

        // dd($Request) = dump.log;

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status == "on" ? 1 : 0
        ]);

        return redirect()->route('index')->with('sucess', 'Tache enregisté avec succès');
    }

    public function edit(int $id){
        $task = Task::where('id', $id)->first();
        return view('tasks_view.create', compact('task'));
    }

    public function update(Request $request, int $id){
        $request->validate([
            'title' => 'string|max:255|required',
            'description'=> 'string|max:1000|required'
        ]);

        $task = Task::where('id', $id)->first();

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status == "on" ? 1 : 0
        ]);

        return redirect()->route('index')->with('sucess', 'Tache modifié avec succès');

    }
    public function destroy(int $id) {
        $task = Task::findOrFail($id);
        $task->delete();
    
        return redirect()->route('index')->with('success', 'Tâche supprimée avec succès.');
    }
}
