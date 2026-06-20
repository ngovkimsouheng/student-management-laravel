@extends('layout')

@section('title', 'Edit Student')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Student</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" class="w-full border border-gray-300 rounded px-3 py-2 @error('name') border-red-500 @enderror" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}" class="w-full border border-gray-300 rounded px-3 py-2 @error('email') border-red-500 @enderror" required>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $student->phone) }}" class="w-full border border-gray-300 rounded px-3 py-2 @error('phone') border-red-500 @enderror" required>
            @error('phone')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="class_id" class="block text-gray-700 font-bold mb-2">Class</label>
            <select name="class_id" id="class_id" class="w-full border border-gray-300 rounded px-3 py-2 @error('class_id') border-red-500 @enderror" required>
                <option value="">Select a class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ old('class_id', $student->class_id) == $class->id ? 'selected' : '' }}>{{ $class->class_name }} ({{ $class->grade }})</option>
                @endforeach
            </select>
            @error('class_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection
