@extends('layout')

@section('title', 'View Subject')

@section('content')
    <div class="max-w-3xl mx-auto">

        <!-- Header -->
        <div class="mb-8 flex justify-between items-start">
            <div>
                <h1 class="text-4xl font-bold text-slate-900 mb-2">Subject Details</h1>
                <p class="text-slate-600">Complete information about the subject</p>
            </div>

            <a href="{{ route('subjects.index') }}" class="text-slate-600 hover:text-slate-900 transition">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
        </div>

        <!-- Subject Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

            <!-- Card Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-12">

                <div class="flex items-end gap-6">

                    <div
                        class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center text-white text-4xl border-4 border-white">
                        <i class="fas fa-book"></i>
                    </div>

                    <div>
                        <h2 class="text-3xl font-bold text-white">
                            {{ $subject->subject_name }}
                        </h2>

                        <p class="text-blue-100 text-sm mt-1">
                            Subject ID: #{{ $subject->id }}
                        </p>
                    </div>

                </div>

            </div>

            <!-- Body -->
            <div class="p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Subject Name -->
                    <div class="border-l-4 border-blue-500 pl-6">
                        <p class="text-slate-600 text-sm font-semibold mb-2">
                            <i class="fas fa-book text-blue-600 mr-2"></i>
                            Subject Name
                        </p>

                        <p class="text-lg font-semibold text-slate-900">
                            {{ $subject->subject_name }}
                        </p>
                    </div>

                    <!-- Class -->
                    <div class="border-l-4 border-indigo-500 pl-6">
                        <p class="text-slate-600 text-sm font-semibold mb-2">
                            <i class="fas fa-school text-indigo-600 mr-2"></i>
                            Class
                        </p>

                        <p class="text-lg font-semibold text-slate-900">
                            {{ $subject->class->class_name ?? 'No Class Assigned' }}
                        </p>

                        <p class="text-sm text-slate-500">
                            Grade: {{ $subject->class->grade ?? '-' }}
                        </p>
                    </div>

                    <!-- Created At -->
                    <div class="border-l-4 border-blue-500 pl-6">
                        <p class="text-slate-600 text-sm font-semibold mb-2">
                            <i class="fas fa-calendar text-blue-600 mr-2"></i>
                            Created At
                        </p>

                        <p class="text-lg font-semibold text-slate-900">
                            {{ $subject->created_at->format('M d, Y') }}
                        </p>

                        <p class="text-slate-500 text-sm">
                            {{ $subject->created_at->format('g:i A') }}
                        </p>
                    </div>

                    <!-- Updated At -->
                    <div class="border-l-4 border-indigo-500 pl-6">
                        <p class="text-slate-600 text-sm font-semibold mb-2">
                            <i class="fas fa-sync text-indigo-600 mr-2"></i>
                            Last Updated
                        </p>

                        <p class="text-lg font-semibold text-slate-900">
                            {{ $subject->updated_at->format('M d, Y') }}
                        </p>

                        <p class="text-slate-500 text-sm">
                            {{ $subject->updated_at->format('g:i A') }}
                        </p>
                    </div>

                </div>

                <!-- Divider -->
                <div class="border-t border-slate-200 my-8"></div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4">

                    <a href="{{ route('subjects.edit', $subject) }}"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200 font-semibold">

                        <i class="fas fa-edit"></i>
                        <span>Edit Subject</span>
                    </a>

                    <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Are you sure you want to delete this subject?')"
                            class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200 font-semibold">

                            <i class="fas fa-trash"></i>
                            <span>Delete Subject</span>

                        </button>

                    </form>

                    <a href="{{ route('subjects.index') }}"
                        class="inline-flex items-center gap-2 bg-slate-200 text-slate-900 px-6 py-3 rounded-lg hover:bg-slate-300 transition-colors font-semibold">

                        <i class="fas fa-arrow-left"></i>
                        <span>Back to List</span>

                    </a>

                </div>

            </div>
        </div>

    </div>
@endsection
