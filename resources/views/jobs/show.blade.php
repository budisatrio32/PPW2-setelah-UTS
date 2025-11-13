<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $job->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Logo & Company Info -->
                    <div class="mb-6">
                        @if($job->logo)
                            <img src="{{ asset('storage/' . $job->logo) }}" alt="{{ $job->company }}" class="h-20 mb-4">
                        @endif
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $job->title }}</h1>
                        <p class="text-xl text-gray-700 mb-1">{{ $job->company }}</p>
                        <p class="text-gray-600">{{ $job->location }}</p>
                    </div>

                    <!-- Salary -->
                    @if($job->salary)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Gaji</h3>
                            <p class="text-2xl font-bold text-green-600">
                                Rp {{ number_format($job->salary, 0, ',', '.') }}
                            </p>
                        </div>
                    @endif

                    <!-- Description -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Deskripsi Pekerjaan</h3>
                        <div class="text-gray-700 whitespace-pre-line">{{ $job->description }}</div>
                    </div>

                    <!-- Apply Form -->
                    @auth
                        @if(auth()->user()->role !== 'admin')
                            <div class="border-t pt-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Lamar Pekerjaan Ini</h3>
                                <form action="{{ route('apply.store', $job->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload CV (PDF)</label>
                                        <input type="file" name="cv" accept=".pdf" required class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        @error('cv')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="{{ route('jobs.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                                            Kembali
                                        </a>
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-blue-700">
                                            Lamar Sekarang
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="border-t pt-6">
                                <div class="flex gap-2">
                                    <a href="{{ route('jobs.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                                        Kembali
                                    </a>
                                    <a href="{{ route('jobs.edit', $job->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-yellow-600">
                                        Edit Lowongan
                                    </a>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="border-t pt-6">
                            <p class="text-gray-600 mb-4">Silakan login terlebih dahulu untuk melamar pekerjaan ini.</p>
                            <div class="flex gap-2">
                                <a href="{{ route('jobs.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                                    Kembali
                                </a>
                                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                    Login
                                </a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
