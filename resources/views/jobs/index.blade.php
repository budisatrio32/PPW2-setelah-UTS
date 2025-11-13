<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Lowongan Pekerjaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @auth
                @if(auth()->user()->role === 'admin')
                    <div class="mb-4 flex gap-3">
                        <a href="{{ route('jobs.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            + Tambah Lowongan
                        </a>

                        <a href="{{ route('jobs.template') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-green-700">
                            📥 Download Template CSV
                        </a>
                    </div>
                @endif
            @endauth

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Logo
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Posisi
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Perusahaan
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Lokasi
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gaji
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($jobs as $index => $job)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $logoNumber = ($index % 4) + 1;
                                            $logoExt = ($logoNumber == 1 || $logoNumber == 3) ? 'jpg' : 'png';
                                            $logoPath = "assets/images/logo {$logoNumber}.{$logoExt}";
                                        @endphp
                                        <img src="{{ asset($logoPath) }}" alt="{{ $job->company }}" class="h-6 w-6 object-contain">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $job->title }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($job->description, 50) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $job->company }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $job->location }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($job->salary)
                                            <div class="text-sm font-semibold text-gray-900">
                                                Rp {{ number_format($job->salary, 0, ',', '.') }}
                                            </div>
                                        @else
                                            <div class="text-sm text-gray-500">-</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @auth
                                            @if(auth()->user()->role !== 'admin')
                                                <a href="{{ route('jobs.show', $job->id) }}" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 border border-transparent rounded-lg font-bold text-sm text-black uppercase tracking-wider shadow-lg hover:from-blue-700 hover:to-blue-800 hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                                    📄 Detail Loker
                                                </a>
                                            @else
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('jobs.edit', $job->id) }}" class="inline-flex items-center px-3 py-2 bg-yellow-500 border border-transparent rounded-md text-xs text-yellow uppercase tracking-widest hover:bg-yellow-600">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-600 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-red-700">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}" class="inline-flex items-center px-3 py-2 bg-gray-600 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                                Login
                                            </a>
                                        @endauth
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        Belum ada lowongan pekerjaan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>