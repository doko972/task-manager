@extends('tasks_view.app')

@section('content')

<h2>@if(empty($task))Creation @else Modification @endif d'une tâche</h2>
<form action="{{ empty($task) ? route('store') : route('update', $task->id) }}" method="post">
    @csrf
    @if(!empty($task))
    @method('put')
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" @if(!empty($task)) value="{{ old('title', $task->title) }}" @endif name="title" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="decription" class="form-label">Titre</label>
        <textarea class="form-control" name="description" id="decription">
            {{ !empty($task) ? old('description', $task->description) : "" }}
        </textarea>
    </div>
    <div class="mb-3">
        <input type="checkbox" {{ !empty($task) && $task->status ? 'checked' : "" }} name="status" class="form-check-input" id="title">
        <label for="form-check-label" class="form-label">Terminé ?</label>
    </div>

    <button type="submit" class="btn btn-info">@if(empty($task))Ajouter @else Modifier @endif</button>
</form>

@endsection