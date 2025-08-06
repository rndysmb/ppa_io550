@extends('anak.dashboard')

@section('title', ucfirst($kitab) . ' ' . $pasal)

@section('content')
<div class="container mx-auto p-4">
  <h2 class="text-2xl font-semibold mb-4">
    {{ ucfirst($kitab) }} {{ $pasal }}
  </h2>

  <div class="space-y-3 text-justify">
    @foreach ($verses as $ayat)
      <p>
        <strong>{{ $ayat['verse'] }}.</strong> {{ $ayat['text'] }}
      </p>
    @endforeach
  </div>

  <div class="flex justify-between items-center mt-8">
    @if ($pasal > 1)
      <a href="{{ route('anak.alkitab.pasal', ['kitab' => $kitab, 'pasal' => $pasal - 1]) }}"
         class="text-blue-600 hover:underline">
        ← Pasal Sebelumnya
      </a>
    @else
      <span></span>
    @endif

    <a href="{{ route('anak.alkitab.kitab', ['kitab' => $kitab]) }}"
       class="text-gray-500 hover:underline">
      Daftar Pasal
    </a>

    <a href="{{ route('anak.alkitab.pasal', ['kitab' => $kitab, 'pasal' => $pasal + 1]) }}"
       class="text-blue-600 hover:underline">
      Pasal Berikutnya →
    </a>
  </div>
</div>
@endsection
