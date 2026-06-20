@extends('layout')

@section('title', 'Edit Subject')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-slate-900 mb-2">Edit Subject</h1>
        <p class="text-slate-600">Update subject information</p>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-8">
            <h3 class="flex items-center gap-2 text-red-900 font-semibold mb-4">
                <i class="fas fa-exclamation-circle"></i>
                Validation Errors
            </h3>
            <ul class="space-y-2">
                @foreach($errors->all() as $error)
                    <li class="flex items-center gap-2 text-red-700 text-sm">
                        <i class="fas fa-circle-xmark text-xs"></i>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-8">
        <form action="{{ route('subjects.update', $subject) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Subject Name Field -->
            <div>
                <label for="subject_name" class="block text-sm font-semibold text-slate-900 mb-3">
                    <i class="fas fa-book text-orange-600 mr-2"></i>
                    Subject Name
                </label>
                <input type="text" name="subject_name" id="subject_name" value="{{ old('subject_name', $subject->subject_name) }}" 
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all @error('subject_name') border-red-500 @enderror" 
                    placeholder="e.g., Mathematics, English, Science" required>
                @error('subject_name')
                    <p class="text-red-600 text-sm mt-2"><i class="fas fa-info-circle"></i> {{ $message }}</p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex gap-4 pt-6">
                <button type="submit" class="flex-1 inline-flex items-center justify-center gap-2 bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-3 rounded-lg hover:shadow-lg transform hover:scale-105 transition-all duration-200 font-semibold">
                    <i class="fas fa-check"></i>
                    <span>Save Changes</span>
                </button>
                <a href="{{ route('subjects.index') }}" class="flex-1 inline-flex items-center justify-center gap-2 bg-slate-200 text-slate-900 px-6 py-3 rounded-lg hover:bg-slate-300 transition-colors font-semibold">
                    <i class="fas fa-times"></i>
                    <span>Cancel</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
