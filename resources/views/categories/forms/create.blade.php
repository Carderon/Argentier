<form class="flex -col -md" action="{{ route("categories.store") }}" method="post">
    @csrf

    <div class="form-group flex -col -md -child">
        <label for="" class="-child">Nom</label>
        <input type="text" name="name" value="" class="-child">
    </div>

    <div class="form-group flex -col -md -child">
        <label for="" class="-child">Couleur</label>

        <select class="-child" name="color">
            <option value="red">Rouge</option>
            <option value="yellow">Jaune</option>
            <option value="blue">Bleu</option>
            <option value="green">Vert</option>
            <option value="orange">Orange</option>
        </select>
    </div>

    <button type="submit" class="btn -primary">Créer</button>
</form>
