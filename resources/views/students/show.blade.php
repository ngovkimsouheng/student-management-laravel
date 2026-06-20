@extends('layout')

@section('title', 'View Student')

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Header -->
    <div class="mb-8 flex justify-between items-start">
        <div>
            <h1 class="text-4xl font-bold text-slate-900 mb-2">Student Details</h1>
            <p class="text-slate-600">Complete information about the student</p>
        </div>
        <a href="{{ route('students.index') }}" class="text-slate-600 hover:text-slate-900 transition">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
    </div>

    <!-- Student Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Card Header with Avatar -->
        <div class="bg-gradient-to-r from-indigo-600 to-blue-600 px-8 py-12">
            <div class="flex items-end gap-6">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center text-white text-4xl font-bold border-4 border-white">
                    {{ substr($student->name, 0, 1) }}
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-white">{{ $student->name }}</h2>
                    <p class="text-indigo-100 text-sm mt-1">Student ID: #{{ $student->id }}</p>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <!-- Email Section -->
                <div class="border-l-4 border-indigo-500 pl-6">
                    <p class="text-slate-600 text-sm font-semibold mb-2">
                        <i class="fas fa-envelope text-indigo-600 mr-2"></i>
                        Email Address
                    </p>
                    <p class="text-lg font-semibold text-slate-900">{{ $student->email }}</p>
                </div>

                <!-- Phone Section -->
                <div class="border-l-4 border-blue-500 pl-6">
                    <p class="text-slate-600 text-sm font-semibold mb-2">
                        <i class="fas fa-phone text-blue-600 mr-2"></i>
                        Phone Number
                    </p>
                    <p class="text-lg font-semibold text-slate-900">{{ $student->phone }}</p>
                </div>

                <!-- Class Section -->
                <div class="border-l-4 border-emerald-500 pl-6">
                    <p class="text-slate-600 text-sm font-semibold mb-2">
                        <i class="fas fa-chalkboard text-emerald-600 mr-2"></i>
                        Class
                    </p>
                    <p class="text-lg font-semibold text-slate-900">
                        {{ $student->class->class_name ?? 'N/A' }}
                        <span class="text-slate-500 text-sm">(Grade {{ $student->class->grade ?? 'N/A' }})</span>
                    </p>
                </div>

                <!-- Created At Section -->
                <div class="border-l-4 border-purple-500 pl-6">
                    <p class="text-slate-600 text-sm font-semibold mb-2">
                        <i class="fas fa-calendar text-purple-600 mr-2"></i>
                        Created At
                    </p>
                    <p class="text-lg font-semibold text-slate-900">{{ $student->created_at->format('M d, Y') }}</p>
                    <p class="text-slate-500 text-sm">{{ $student->created_at->format('g:i A') }}</p>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-slate-200 my-8"></div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('students.edit', $student) }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200 font-semibold">
                    <i class="fas fa-edit"></i>
                    <span>Edit Student</span>
                </a>
                <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200 font-semibold" onclick="return confirm('Are you sure you want to delete this student?')">
                        <i class="fas fa-trash"></i>
                        <span>Delete Student</span>
                    </button>
                </form>
                <a href="{{ route('students.index') }}" class="inline-flex items-center gap-2 bg-slate-200 text-slate-900 px-6 py-3 rounded-lg hover:bg-slate-300 transition-colors font-semibold">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to List</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
