<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="night">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todolist</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- DaisyUI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.19.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- CSS --}}
    {{-- <link rel="stylesheet" href="welcome.css"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<script>
    // Hide and Show
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // hide table
        // $("table").hide();
        // set button to hide table
        $("#hide").click(function() {
            $("table").hide();
        });
        // set button to show table
        $("#show").click(function() {
            $("table").show();
        });
        $(".checkbox").change(function() {
            if (this.checked) {
                //How to save it into todolist db
                console.log(this.value);
                // // $existingItem as $data
                $.ajax({
                    url: "/check/" + this.value,
                    method: "POST",
                    data: {
                        completed: this.checked,
                    }
                }).done(function(res) {
                    console.log(res);
                });
            };
        });
    });
</script>

<body class="mt-4 mb-8 md:mt-0 md:ml-20 mr-20">
    <div class="h-10"></div>
    <article class="prose">
        <div class="h-10 text-2xl">
            <h1>Todo List</h1>
        </div>
        <h2>Here is your todo list</h2>
    </article>
    <form method="POST" action="/todo">
        @csrf
        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Create Task</span>
            </label>
            <input type="text" id="name" name="name" placeholder="Type here"
                class="input input-bordered w-full max-w-xs" />
        </div>
        <div class="h-5"></div>
        <div class="h-20">
            <button for="my-modal-6" class="btn btn-outline btn-success modal-button"
                type="submit">{{ __('Add') }}</button>
        </div>
    </form>
    <br>
    <div>
        <button id="show" class="btn btn-outline btn-info">{{ __('Show') }}</button>
        <button id="hide" class="btn btn-outline btn-error">{{ __('Hide') }}</button>
    </div>
    <br>
    <div>

    </div>
    <div class="h-10"></div>
    <div class="overflow-x-auto">
        <table class="table w-full table-auto border-collapse">
            {{-- <thead>
                <tr>
                    <th class="border border-slate-300">Completed</th>
                    <th class="border border-slate-300">ID</th>
                    <th class="border border-slate-300">Task</th>
                    <th class="border border-slate-300">Completed At</th>
                </tr>
            </thead> --}}
            <tbody>
                @foreach ($existingItem as $data)
                    <tr>
                        <td>
                            @csrf
                            <input type="checkbox" class="checkbox checkbox-accent" id="completed_checkbox"
                                value="{{ $data->id }}" @if ($data->completed == '1') checked @endif>
                        </td>
                        {{-- <td>{{ $data->id }}</td> --}}
                        <td>{{ $data->name }}</td>
                        {{-- <td>{{ $data->completed_at }}</td> --}}
                        <td>
                            <form action="{{ url('task/' . $data->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>{{ __('Delete') }}</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <div id="app">
            <app>
            </app>
        </div> --}}
    <input type="checkbox" id="my-modal-6" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Congratulations!</h3>
            <p class="py-4">Add task successfully</p>
            <div class="modal-action">
                <label for="my-modal-6" class="btn">Close</label>
            </div>
        </div>
    </div>
</body>
{{-- @vite(['resources/js/app.js']) --}}

</html>
