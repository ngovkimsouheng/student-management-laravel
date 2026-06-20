@extends('layout')

@section('title', 'Students')

@section('content')
<div>
    <!-- Header -->
    <div class="mb-8">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-4xl font-bold text-slate-900 mb-2">
                    Students
                </h1>

                <p class="text-slate-600">
                    Manage and organize all your students
                </p>
            </div>

            <a href="{{ route('students.create') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200 font-semibold">

                <i class="fas fa-plus"></i>
                <span>Add New Student</span>

            </a>
        </div>

        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg mb-6">
                <i class="fas fa-check-circle"></i>

                <span>
                    {{ session('success') }}
                </span>
            </div>
        @endif
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-slate-200">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>
                        <th class="px-6 py-4 text-left">ID</th>
                        <th class="px-6 py-4 text-left">Name</th>
                        <th class="px-6 py-4 text-left">Email</th>
                        <th class="px-6 py-4 text-left">Phone</th>
                        <th class="px-6 py-4 text-left">Class</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse($students as $student)

                    <tr class="hover:bg-slate-50 transition-colors">

                        <td class="px-6 py-4 font-medium">
                            #{{ $student->id }}
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center text-white">

                                    <i class="fas fa-user-graduate"></i>

                                </div>

                                <span class="font-semibold">
                                    {{ $student->name }}
                                </span>

                            </div>

                        </td>

                        <td class="px-6 py-4">
                            {{ $student->email }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $student->phone }}
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-sm">

                                {{ $student->class->class_name }}

                            </span>

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('students.show', $student) }}"
                                   class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100">

                                    <i class="fas fa-eye"></i>

                                </a>

                                <a href="{{ route('students.edit', $student) }}"
                                   class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('students.destroy', $student) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Are you sure?')"
                                            class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-red-50 text-red-600 hover:bg-red-100">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center py-12">

                            <i class="fas fa-inbox text-4xl text-slate-300 mb-4"></i>

                            <p class="text-slate-600 font-medium">
                                No students found
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection