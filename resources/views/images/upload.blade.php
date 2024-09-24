<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
            <img src="{{ Storage::url(session('path')) }}" alt="Uploaded Image" style="max-width: 200px; margin-top: 10px;">
        </div>
    @endif

    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Upload JPEG Image</label>
        <input type="file" name="image" accept=".jpeg,.jpg" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
