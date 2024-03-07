<a class="btn btn-sm btn-primary" href="{{ route('clients.edit', $row->id) }}"><i class="align-middle"
        data-feather="edit"></i></a>
<form class="d-inline" action="{{ route('clients.destroy', $row->id) }}" method="POST"
    onsubmit="return confirm('Seguro que desea eliminar el registro?')">
    @method('DELETE')
    @csrf
    <button class="btn btn-sm btn-danger" type="submit"><i class="align-middle" data-feather="trash"></i></button>
</form>
