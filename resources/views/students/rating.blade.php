@extends('layouts.app-students')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>{{ __('Test Results') }}</div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($tests) > 0)

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student</th>
                                <th scope="col">Title</th>
                                <th scope="col"># Questions</th>
                                <th scope="col">Total Marks</th>
                                <th scope="col">Marks Obtained</th>
                                <th scope="col">Taken</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tests as $test)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $test->student_name }}</td>
                                    <td>{{ $test->test_title }}</td>
                                    <td>{{ $test->questions }}</td>
                                    <td>{{ $test->marks }}</td>
                                    <td>{{ $test->marks_obtained }}</td>
                                    <td>{{ $test->created_at }}</td>
                                    <td>
                                        <a href="{{ route('students.tests.results.view', $test->student_test_id) }}" title="View Result">
                                            <svg viewBox="0 0 496 496" style="width:2rem;height:2rem;" xmlns="http://www.w3.org/2000/svg"><path d="M400 376v64H296v-37.36c3.04-2.64 5.281-6.242 6.398-10.32l8.563-31.28c6.96.882 13.758 2.48 20.48 4.722l13.52 4.476c11.437 3.84 23.36 5.762 35.437 5.762 6.48 0 12.961-.559 19.282-1.762zm0 0M349.52 292.719A15.916 15.916 0 01354.16 304c0 8.8-7.12 16-16 16H322l8.64-32h7.52c4.399 0 8.399 1.762 11.36 4.719zm0 0" fill="#ccd1d9"/><path d="M284 288.48L275.52 320h-25.36c-8.8 0-16.8 3.602-22.64 9.36l-1.36-1.36 30.64-30.64c6-6 14.16-9.36 22.641-9.36h2.72zm0 0" fill="#e6e9ed"/><path d="M294.64 249.2L284 288.48l-1.84-.48h-2.719c-8.48 0-16.64 3.36-22.64 9.36L226.16 328l-10.962 11.04c-3.199 3.198-7.52 4.96-12 4.96-4.719 0-8.96-1.922-12.078-4.96a17.051 17.051 0 01-4.96-12c0-4.481 1.839-8.802 5.038-12l57.602-57.68c6-6 14.16-9.36 22.64-9.36h18.72zm0 0" fill="#f0d0b4"/><path d="M296 240V56H112V8h288v264l-.559.8-29.203-19.44c-5.199-3.52-11.437-5.36-17.758-5.36h-11.039l15.438-57.04 8.562-31.839 12-44.402c.48-1.84.72-3.68.72-5.52 0-11.68-9.442-21.199-21.122-21.199h-2.64c-9.52 0-17.919 6.398-20.399 15.68l-11.121 41.28-8.64 31.759-17.2 63.601zm0 0" fill="#ccd1d9"/><path d="M296 240l1.04.32-2.4 8.88-4.48-1.2h-18.719c-8.48 0-16.64 3.36-22.64 9.36l-57.602 57.68c-3.199 3.198-5.039 7.519-5.039 12 0 4.64 1.918 8.96 4.961 12 3.117 3.038 7.36 4.96 12.078 4.96 4.48 0 8.801-1.762 12-4.96L226.16 328l1.36 1.36c-5.758 5.84-9.36 13.84-9.36 22.64 0 4.398 3.602 8 8 8h38.559l-5.758 21.281c-.48 1.84-.8 3.68-.8 5.52 0 11.68 9.519 21.199 21.198 21.199H282c5.281 0 10.238-2 14-5.36V488H8V56h288zm0 0" fill="#e6e9ed"/><path d="M40 88h192v64H40zm0 0" fill="#b4dd7f"/><path d="M96 352h24v80H40v-80zm0 0M96 216h24v80H40v-80zm0 0" fill="#ff826e"/><path d="M378.16 109.2c0 1.84-.238 3.679-.719 5.519l-12 44.402-42.562-14.16L334 103.68C336.48 94.398 344.879 88 354.398 88h2.641c11.68 0 21.121 9.52 21.121 21.2zm0 0" fill="#ffeaa7"/><path d="M365.441 159.121l-8.562 31.84-42.64-14.242 8.64-31.758zm0 0" fill="#e6e9ed"/><path d="M296 402.64a21.04 21.04 0 01-14 5.36h-2.64c-11.68 0-21.2-9.52-21.2-21.2 0-1.84.32-3.679.8-5.519L264.72 360H296c5.04 0 10 .32 14.96 1.04l-8.562 31.28c-1.117 4.078-3.359 7.68-6.398 10.32zm0 0M341.441 248L322 320h-46.48l8.48-31.52 10.64-39.28 2.4-8.88 17.198-63.601 42.64 14.242zm0 0" fill="#fcd770"/><path d="M310.96 361.04C306 360.32 301.04 360 296 360h-69.84c-4.398 0-8-3.602-8-8 0-8.8 3.602-16.8 9.36-22.64 5.84-5.758 13.84-9.36 22.64-9.36h88c8.88 0 16-7.2 16-16 0-4.398-1.762-8.398-4.64-11.281-2.961-2.957-6.961-4.719-11.36-4.719h-7.52l10.801-40h11.04c6.32 0 12.558 1.84 17.757 5.36l29.203 19.44 26.72 17.84c5.198 3.52 11.44 5.36 17.76 5.36H496v64h-24c-9.2 0-18.32 1.121-27.2 3.36l-37.198 9.28c-2.641.641-5.282 1.2-7.922 1.598-6.32 1.203-12.801 1.762-19.282 1.762-12.078 0-24-1.922-35.437-5.762l-13.52-4.476c-6.722-2.242-13.52-3.84-20.48-4.723zm0 0" fill="#f0d0b4"/><path d="M352.504 256c4.754 0 9.351 1.39 13.312 4.031l55.871 37.25A39.954 39.954 0 00443.88 304H496v-16h-52.113c-4.75 0-9.36-1.39-13.32-4.031L408 268.922V0H104v48H0v448h304v-48h104v-67.305c.504-.12 1.023-.16 1.527-.289l37.207-9.3A104.62 104.62 0 01472 368h24v-16h-24c-9.809 0-19.617 1.207-29.137 3.586l-37.215 9.3c-19.136 4.786-39.48 4-58.183-2.23l-13.48-4.496A119.867 119.867 0 00296 352h-69.809c0-13.23 10.77-24 24-24h88c13.235 0 24-10.77 24-24 0-12.273-9.296-22.305-21.191-23.719L347.566 256zm-10.106 121.832A119.756 119.756 0 00380.391 384c3.882 0 7.754-.336 11.609-.71V432h-88v-26.168c2.809-3.238 4.984-7.07 6.152-11.406l6.551-24.266c4.121.84 8.207 1.84 12.219 3.184zm-41.726-9.648l-5.961 22.062A13.213 13.213 0 01281.977 400h-2.594c-7.27 0-13.184-5.91-13.184-13.184 0-1.168.153-2.32.457-3.441L270.81 368H296c1.559 0 3.113.121 4.672.184zM254.23 368l-3.023 11.191a29.13 29.13 0 00-1.008 7.625c0 10.817 5.985 20.168 14.746 25.207l-2.511 10.032 15.52 3.883L280.44 416h1.536c2.062 0 4.062-.29 6.023-.703V480H16V64h104V16h272v242.258l-17.305-11.54A39.936 39.936 0 00352.504 240h-.617l33.297-123.191a29.13 29.13 0 001.007-7.625C386.191 93.09 373.098 80 357.008 80h-2.594c-13.156 0-24.742 8.871-28.176 21.574L304 183.864V48H136v16h152v176h-16.543c-8.715 0-16.914 2.887-23.77 8H168v16h62.879l-16 16H168v16h30.887l-13.367 13.367c-4.72 4.711-7.32 10.985-7.32 17.664 0 13.77 11.198 24.969 24.976 24.969 2.465 0 4.84-.473 7.144-1.16-.008.39-.12.762-.12 1.16 0 8.824 7.175 16 16 16zm61.625-56h-29.91l33.782-124.992 27.441 9.144zm-61.375-48.977c4.528-4.527 10.56-7.023 16.977-7.023h13.047l-6.527 24.145c-10.13.367-19.61 4.367-26.809 11.566l-41.656 41.656a9.038 9.038 0 01-6.344 2.633c-4.953 0-8.977-4.023-8.977-8.969 0-2.398.938-4.648 2.633-6.343zm8 40c3.079-3.078 6.872-5.128 10.985-6.183L269.367 312h-15.855zm107.254-190.39l-9.796 36.246-27.442-9.145 9.184-33.98c1.558-5.746 6.793-9.754 12.734-9.754h2.594c7.273 0 13.183 5.91 13.183 13.184 0 1.168-.152 2.32-.457 3.449zm-41.414 42.574l27.442 9.145-4.418 16.328-27.442-9.145zM338.191 296c4.41 0 8 3.594 8 8s-3.59 8-8 8h-5.765l4.328-16zm0 0"/><path d="M240 80H32v80h208zm-16 64H48V96h176zm0 0"/><path d="M64 112h16v16H64zm0 0M96 112h16v16H96zm0 0M128 112h16v16h-16zm0 0M160 112h16v16h-16zm0 0M192 112h16v16h-16zm0 0M128 256h-16v32H48v-64h48v-16H32v96h96zm0 0"/><path d="M154.344 178.344L80 252.688l-10.344-10.344-11.312 11.312L80 275.312l85.656-85.656zm0 0M112 424H48v-64h48v-16H32v96h96v-48h-16zm0 0"/><path d="M69.656 378.344l-11.312 11.312L80 411.312l85.656-85.656-11.312-11.312L80 388.688zm0 0M256 440h16v16h-16zm0 0M152 440h88v16h-88zm0 0M168 216h104v16H168zm0 0"/></svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @else
                        {{ __('No tests found!') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


