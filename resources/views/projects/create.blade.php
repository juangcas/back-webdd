<h1>Crear proyecto</h1>
@if ($message = Session::get('success'))
    <div>
        <strong>{{ $message }}</strong>
    </div>
@endif
<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Nombre</label>
    <input required type="text" name="name" id=""><br>
    <label for="description">description</label>
    <input required type="text" name="description" id="description"><br>
    <label for="category">category</label>
    <input required type="text" name="category" id="category"><br>
    <label for="yearMonth">yearMonth</label>
    <input required type="number" name="yearMonth" id="yearMonth"><br>
    <label for="langs">langs</label>
    <input required type="text" name="langs" id="langs"><br>
    <label for="image_path">image</label>
    <input required type="file" name="image_path" id="image_path"><br>
    <label for="url">URL</label>
    <input required type="url" name="url" id="url"><br>
    <input type="submit" value="Enviar">
</form>