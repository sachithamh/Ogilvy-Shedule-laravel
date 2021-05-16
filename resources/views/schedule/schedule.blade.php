<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Schedule</title>
</head>

<body>
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Add Shedule Countdown
            </a>
        </div>
    </nav>
    <main class="wraper m-4">
        <div class="m-4">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form action="{{ route('store') }}" method="POST" class="form-inline mt-4">
            @csrf
            <div class="form-group mx-sm-3 mb-2 ">
                <input name="title" type="text" placeholder="Title" class="form-control" required>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input name="schedule_datetime" type="datetime-local" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Add Shedule</button>
        </form>
        <div class="mx-sm-2 mt-3">
            @foreach ($schedules as $item)
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ route('update',["id" => $item->id]) }}" method="POST" class="form-inline mt-4">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2 ">
                                <input name="title" type="text" placeholder="Title" value="{{$item->title}}" class="form-control" required>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input name="schedule_datetime" value="{{date('Y-m-d\TH:i', strtotime($item->schedule_datetime))}}" type="datetime-local" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary  mb-2">Update</button>
                        </form>
                        <div class="form-inline">
                            <form action="{{ route('delete',["id" => $item->id]) }}" method="POST" class="ml-2">
                                @csrf
                                {{-- <input  type="hidden" name="id" value="{{$item->id}}"> --}}
                                <button type="submit" class="btn btn-danger mb-2 ml-2 mt-3">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </main>
</body>

</html>
