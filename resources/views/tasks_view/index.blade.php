@extends('tasks_view.app')

@section('content')
<!-- contenu de la page -->
<a href="{{ route('create') }}" class="btn btn-primary">Ajouter une tâche</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title}}</td>
                <td>{{ $task->description}}</td>
                <td>
                    @if($task->status == 1)
                        <span class="badge bg-success">Terminé</span>
                    @else
                        <span class="badge bg-warning">En cours</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('edit', $task->id) }}" class="btn btn-info">Modifier</a>
                    <form action="{{ route('destroy', $task->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Etes-vous sûr de vouloir supprimer cette tâche ?')"
                            aria-label="Supprimer cette tâche">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection