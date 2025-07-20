@php
    use Illuminate\Support\Facades\Auth;
@endphp

@if ($creators->count() > 0)
@foreach ($creators as $creator)
    <div class="rounded-2xl overflow-hidden bg-white shadow-md hover:shadow-xl transition-all duration-300">
        <div class="relative">
            <img src="{{ $creator->fotosampul_url }}" alt="{{ $creator->nickname }}" class="w-full h-24 object-cover" />
            <div class="absolute inset-x-0 -bottom-8 flex justify-center">
                <img src="{{ $creator->pp_url }}" alt="{{ $creator->nickname }}"
                    class="bg-blue-500 w-16 h-16 rounded-full border-4 border-white object-cover shadow-md" />
            </div>
        </div>
        <div class="pt-10 pb-6 px-5 text-center">
            <span class="inline-block text-[10px] font-semibold text-white bg-gray-800 px-2 py-1 rounded-full mb-2">
                {{ $creator->job ?? 'Creator' }}
            </span>
            <h3 class="text-sm font-semibold text-gray-800">{{ $creator->nickname }}</h3>
            <p class="text-xs text-gray-600 mt-1">{{ $creator->bio }}</p>

            @php
                $currentUser = Auth::user();
                $isOwner = $currentUser && $currentUser->id === $creator->creator_id;
                $viewRoute = $isOwner ? route('profile_creator') : route('creator.creator-profile', ['id' => $creator->creator_id]);
            @endphp

             <a href="{{ $viewRoute }}">
                <button
                    class="mt-4 text-xs font-semibold bg-blue-500 hover:bg-blue-600 text-white py-2 px-5 rounded-full transition-all duration-300">
                    View
                </button>
            </a>
        </div>
    </div>
@endforeach
@else
    <div class="text-center col-span-3 text-gray-500 text-sm py-10">
        No creators found.
    </div>
@endif
