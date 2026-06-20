@extends('layout')

@section('title', 'Create Student')

@section('content')
<div class="max-w-2xl mx-auto">

    <!-- Header -->
    <div class="mb-8 flex justify-between items-start">
        <div>
            <h1 class="text-4xl font-bold text-slate-900 mb-2">
                Add New Student
            </h1>

            <p class="text-slate-600">
                Create a new student record
            </p>
        </div>

        <a href="{{ route('students.index') }}"
           class="text-slate-600 hover:text-slate-900 transition">

            <i class="fas fa-arrow-left text-xl"></i>

        </a>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

        <!-- Card Header -->
        <div class="bg-gradient-to-r from-orange-600 to-red-600 px-8 py-10">

            <div class="flex items-center gap-5">

                <div class="w-16 h-16 rounded-full bg-white/20 border-4 border-white flex items-center justify-center text-white text-3xl">

                    <i class="fas fa-user-graduate"></i>

                </div>

                <div>

                    <h2 class="text-2xl font-bold text-white">
                        Student Information
                    </h2>

                    <p class="text-orange-100">
                        Fill in the details below
                    </p>

                </div>

            </div>

        </div>

        <!-- Form -->
        <div class="p-8">

            <form action="{{ route('students.store') }}"
                  method="POST"
                  class="space-y-6">

                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter student name"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none">

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter email"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none">

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Enter phone number"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none">

                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Class -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Select Class
                    </label>

                    <select
                        name="class_id"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none">

                        <option value="">
                            Select a class
                        </option>

                        @foreach($classes as $class)

                            <option value="{{ $class->id }}"
                                {{ old('class_id') == $class->id ? 'selected' : '' }}>

                                {{ $class->class_name }}

                            </option>

                        @endforeach

                    </select>

                    @error('class_id')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-4">

                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all font-semibold">

                        <i class="fas fa-save"></i>

                        Save Student

                    </button>

                    <a href="{{ route('students.index') }}"
                       class="inline-flex items-center gap-2 bg-slate-200 text-slate-900 px-6 py-3 rounded-lg hover:bg-slate-300 font-semibold">

                        <i class="fas fa-times"></i>

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection