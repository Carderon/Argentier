<form class="-child" action="{{ route("entries.delete", $entry)}}" method="POST">
    @csrf
    @method("delete")
    <button type="submit" class="btn -alert">Supprimer</button>
</form>
