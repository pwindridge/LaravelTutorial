@extends('layouts.app')

@section('title', 'Show Module')

@section('content')

    <h1>{{ $module->name }}</h1>
    <p>Module Leader: {{ $module->leader->name }}</p>

    <h2>Tutorials</h2>

    <ul>
        @foreach($module->tutorials as $tutorial)

            <li>
                {{ \Carbon\Carbon::parse($tutorial->time_start)->format('l') }}'s from
                {{ \Carbon\Carbon::parse($tutorial->time_start)->format('H:i') }} to
                {{ \Carbon\Carbon::parse($tutorial->time_end)->format('H:i') }} in
                {{ $tutorial->room }} with
               {{ implode(' | ', $tutorial->tutors->map( function ($t) { return $t->name; })->toArray()) }}
            </li>

        @endforeach
    </ul>

    <h2>Contact Details</h2>

    <dl>
        @foreach($module->uniqueTutors as $tutor)

            <dt>
                {{ $tutor->name }}
            </dt>
           <dd>
               Room: {{ $tutor->room }}
           </dd>
            <dd>
                Email: <a href="mailto: {{ $tutor->email }}">{{ $tutor->email }}</a>
            </dd>
        @endforeach
    </dl>
    @can('create', App\Module::class)

        <div>
            <a href="{{ route('modules.tutorials.create', $module->id) }}">Add Module</a>
        </div>

    @endcan

    <div>
        <a href="/modules">Back to module listing</a>
    </div>
@endsection

