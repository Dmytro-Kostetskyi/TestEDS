<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload and Display</title>
</head>
<body>
<h2>File Upload and Display</h2>

<form action="{{route('upload-pdf')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div style="border: solid black; padding: 10px 0">
        Upload jks
        <br>
        <br>
        <input type="file" name="file_jks" accept=".jks">
        Пароль: <input type="password" name="password">
    </div>

    <div style="border: solid black; padding: 10px 0; margin-top: 10px">
        Upload PDF
        <br>
        <br>
        <input type="file" name="file_pdf" accept=".pdf">
    </div>

    <button type="submit" style="margin-top: 10px">Upload</button>
</form>

</body>
</html>
