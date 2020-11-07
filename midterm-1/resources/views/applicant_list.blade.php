@extends('home')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endif
            </div>
        @endif
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($applicants as $applicant)
                <tr>
                    <td>{{$applicant->id}}</td>
                    <td>{{$applicant->name}}</td>
                    <td>{{$applicant->surname}}</td>
                    <td>{{$applicant->position}}</td>
                    <td>{{$applicant->phone}}</td>
                    @if($applicant->is_hired == true)
                        <td style="color: #2ecc71">Hired</td>
                    @endif
                    @if($applicant->is_hired == false)
                        <td><a href="{{ route('applicant.hired', $applicant->id)  }}" style="color: #e74c3c;">Not Hired</a></td>
                    @endif
                    <td>
                        <form method="get" action="{{route('applicants.edit', $applicant->id)}}">
                            @csrf
                            <button>EDIT</button>
                        </form>
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
