<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Lowongan Kerja
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Posisi/Jabatan *
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                                   placeholder="Contoh: Frontend Developer" required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Company -->
                        <div class="mb-4">
                            <label for="company" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Perusahaan *
                            </label>
                            <input type="text" name="company" id="company" value="{{ old('company', $job->company) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('company') border-red-500 @enderror"
                                   placeholder="Contoh: PT Tech Solutions" required>
                            @error('company')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div class="mb-4">
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                Lokasi Kerja *
                            </label>
                            <input type="text" name="location" id="location" value="{{ old('location', $job->location) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('location') border-red-500 @enderror"
                                   placeholder="Contoh: Jakarta Selatan" required>
                            @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Salary -->
                        <div class="mb-4">
                            <label for="salary" class="block text-sm font-medium text-gray-700 mb-2">
                                Gaji (Opsional)
                            </label>
                            <input type="number" name="salary" id="salary" value="{{ old('salary', $job->salary) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('salary') border-red-500 @enderror"
                                   placeholder="Contoh: 8000000 (tanpa titik)">
                            @error('salary')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi Lowongan *
                            </label>
                            <textarea name="description" id="description" rows="6"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                                      placeholder="Jelaskan detail pekerjaan, persyaratan, dan benefit yang ditawarkan..." required>{{ old('description', $job->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current Logo Display -->
                        @if($job->logo)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Logo Saat Ini
                                </label>
                                <img src="{{ asset('storage/' . $job->logo) }}" alt="{{ $job->company }}" class="h-16 w-16 object-contain border border-gray-300 rounded">
                            </div>
                        @endif

                        <!-- Logo Upload -->
                        <div class="mb-6">
                            <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                                Ganti Logo Perusahaan (Opsional)
                            </label>
                            <input type="file" name="logo" id="logo" accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('logo') border-red-500 @enderror">
                            <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, JPEG. Maksimal 2MB. Kosongkan jika tidak ingin mengganti logo</p>
                            @error('logo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-between">
                            <a href="{{ route('jobs.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                                Batal
                            </a>

                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-700">
                                Update Lowongan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>