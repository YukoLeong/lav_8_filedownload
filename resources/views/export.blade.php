<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export</title>
</head>
<body>
    <div>
        <a href="{{ route('export.download_storage') }}">
            <button>Export(Storage)</button>
        </a>
    </div>
    <div>
        <a href="{{ route('export.download_response') }}">
            <button>Export(Response)</button>
        </a>
    </div>
    <div>
        <a href="{{ route('export.csv_stream') }}">
            <button>Export(csv)</button>
        </a>
    </div>
</body>
</html>