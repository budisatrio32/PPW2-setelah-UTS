<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Lowongan Kerja Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Posisi/Jabatan *
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
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
                            <input type="text" name="company" id="company" value="{{ old('company') }}"
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
                            <input type="text" name="location" id="location" value="{{ old('location') }}"
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
                            <input type="number" name="salary" id="salary" value="{{ old('salary') }}"
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
                                      placeholder="Jelaskan detail pekerjaan, persyaratan, dan benefit yang ditawarkan..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Logo Upload -->
                        <div class="mb-6">
                            <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                                Logo Perusahaan (Opsional)
                            </label>
                            <input type="file" name="logo" id="logo" accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('logo') border-red-500 @enderror">
                            <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, JPEG. Maksimal 2MB</p>
                            @error('logo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-between">
                            <a href="{{ route('jobs.index') }}"
                               class="inline-flex items-center px-4 py-2  rounded-md font-semibold text-xs text-gray-700 uppercase">
                                Batal
                            </a>

                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 border-transparent rounded-md font-semibold text-xs text-black uppercase">
                                Simpan Lowongan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>