@extends('layouts.app')

@section('title', 'Wayn? | Authentic Jordan')

@section('content')
<!-- HOME SECTION -->
<section id="sec-home" class="relative">
    <!-- HERO -->
    <article class="relative min-h-[90vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1548679848-6a3861df4dc8?auto=format&fit=crop&q=80')] bg-cover bg-center opacity-40 mix-blend-overlay"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/60 via-gray-900/40 to-gray-900"></div>
        
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <div class="inline-block px-4 py-1.5 rounded-full border border-amber-500/30 bg-amber-500/10 text-amber-400 text-sm font-medium tracking-wider mb-6 backdrop-blur-sm">
                ✦ Authentic Jordanian Experience
            </div>
            <h1 class="text-5xl md:text-7xl font-serif font-bold text-white mb-6 leading-tight">
                Discover <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-600">Jordan</span>,<br>Your Way
            </h1>
            <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto font-light">
                From the ancient streets of Petra to the crystal waters of Aqaba — plan your perfect Jordanian journey.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <button class="px-8 py-3 rounded-full bg-gradient-to-r from-amber-600 to-amber-500 text-white font-semibold hover:from-amber-500 hover:to-amber-400 transition-all shadow-lg shadow-amber-500/25">
                    ✦ Plan My Trip
                </button>
                <button class="px-8 py-3 rounded-full bg-gray-800/80 border border-gray-700 text-white font-medium hover:bg-gray-700 backdrop-blur-sm transition-all">
                    Explore Cities &rarr;
                </button>
            </div>
        </div>
    </article>

    <!-- STATS -->
    <article class="max-w-6xl mx-auto px-4 -mt-16 relative z-20">
        <div class="bg-gray-800/80 backdrop-blur-lg border border-gray-700 rounded-2xl p-6 shadow-2xl flex flex-wrap justify-between items-center gap-6">
            <div class="text-center flex-1 min-w-[120px]">
                <div class="text-3xl font-bold text-amber-500 mb-1">17+</div>
                <div class="text-sm text-gray-400 font-medium uppercase tracking-wider">Cities</div>
            </div>
            <div class="text-center flex-1 min-w-[120px]">
                <div class="text-3xl font-bold text-amber-500 mb-1">480+</div>
                <div class="text-sm text-gray-400 font-medium uppercase tracking-wider">Attractions</div>
            </div>
            <div class="text-center flex-1 min-w-[120px]">
                <div class="text-3xl font-bold text-amber-500 mb-1">250+</div>
                <div class="text-sm text-gray-400 font-medium uppercase tracking-wider">Restaurants</div>
            </div>
            <div class="text-center flex-1 min-w-[120px]">
                <div class="text-3xl font-bold text-amber-500 mb-1">AI</div>
                <div class="text-sm text-gray-400 font-medium uppercase tracking-wider">Powered</div>
            </div>
            <div class="text-center flex-1 min-w-[120px]">
                <div class="text-3xl font-bold text-amber-500 mb-1">24/7</div>
                <div class="text-sm text-gray-400 font-medium uppercase tracking-wider">Smart Guide</div>
            </div>
        </div>
    </article>

    <!-- DUAL MODE -->
    <article class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-white">Choose Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-600">Experience</span></h2>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Local -->
            <div class="bg-gray-800/50 border border-gray-700 rounded-2xl p-8 hover:bg-gray-800 transition-colors relative overflow-hidden group">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl group-hover:bg-amber-500/20 transition-all"></div>
                <div class="text-right font-arabic" dir="rtl">
                    <h3 class="text-3xl font-bold text-amber-400 mb-2">وين طشّتنا اليوم؟</h3>
                    <p class="text-gray-400 mb-6">للمواطن الأردني</p>
                    <ul class="space-y-3 mb-8 text-gray-300">
                        <li class="flex items-center gap-2"><span class="text-amber-500">✦</span> أماكن قريبة منك هسّا</li>
                        <li class="flex items-center gap-2"><span class="text-amber-500">✦</span> طشّات بتجنن على قد الجيبة</li>
                        <li class="flex items-center gap-2"><span class="text-amber-500">✦</span> مناطق مخفية ما بتعرفها</li>
                    </ul>
                    <button class="px-6 py-2 bg-amber-600/20 text-amber-500 border border-amber-500/30 rounded-lg hover:bg-amber-600 hover:text-white transition-colors">
                        يلّا نبلّش &larr;
                    </button>
                </div>
            </div>
            <!-- Tourist -->
            <div class="bg-gray-800/50 border border-gray-700 rounded-2xl p-8 hover:bg-gray-800 transition-colors relative overflow-hidden group">
                <div class="absolute -left-20 -top-20 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl group-hover:bg-blue-500/20 transition-all"></div>
                <div>
                    <h3 class="text-3xl font-bold text-blue-400 mb-2">Where To, Traveler?</h3>
                    <p class="text-gray-400 mb-6">For International Visitors</p>
                    <ul class="space-y-3 mb-8 text-gray-300">
                        <li class="flex items-center gap-2"><span class="text-blue-500">✦</span> Full guided itineraries</li>
                        <li class="flex items-center gap-2"><span class="text-blue-500">✦</span> Cultural context & tips</li>
                        <li class="flex items-center gap-2"><span class="text-blue-500">✦</span> Curated experiences</li>
                    </ul>
                    <button class="px-6 py-2 bg-blue-600/20 text-blue-400 border border-blue-500/30 rounded-lg hover:bg-blue-600 hover:text-white transition-colors">
                        Start Planning &rarr;
                    </button>
                </div>
            </div>
        </div>
    </article>

    <!-- CITIES LIST -->
    <article class="py-12 bg-gray-900 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-white">Explore <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-600">Jordan's Cities</span></h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach(App\Models\City::all() as $city)
                <div class="group relative rounded-2xl overflow-hidden cursor-pointer" x-data="wikiImage('{{ $city->wiki_title }}')">
                    <div class="aspect-w-16 aspect-h-9 w-full h-64 bg-gray-800">
                        <img :src="imageUrl" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $city->name }}" x-show="imageUrl">
                        <div class="absolute inset-0 flex items-center justify-center" x-show="!imageUrl">
                            <div class="w-8 h-8 border-4 border-amber-500/30 border-t-amber-500 rounded-full animate-spin"></div>
                        </div>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h3 class="text-2xl font-bold text-white mb-1">{{ $city->name }} <span class="text-amber-500 font-arabic text-xl">{{ $city->name_ar }}</span></h3>
                        <p class="text-gray-300 text-sm line-clamp-2">{{ $city->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </article>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('wikiImage', (wikiTitle) => ({
            imageUrl: '',
            async init() {
                if(!wikiTitle) return;
                try {
                    const response = await fetch(`https://en.wikipedia.org/w/api.php?action=query&titles=${wikiTitle}&prop=pageimages&format=json&pithumbsize=600&origin=*`);
                    const data = await response.json();
                    const pages = data.query.pages;
                    const pageId = Object.keys(pages)[0];
                    if (pages[pageId].thumbnail) {
                        this.imageUrl = pages[pageId].thumbnail.source;
                    } else {
                        // Fallback image
                        this.imageUrl = 'https://images.unsplash.com/photo-1548679848-6a3861df4dc8?w=600&auto=format&fit=crop';
                    }
                } catch (e) {
                    console.error('Failed to load wiki image', e);
                    this.imageUrl = 'https://images.unsplash.com/photo-1548679848-6a3861df4dc8?w=600&auto=format&fit=crop';
                }
            }
        }))
    })
</script>
@endpush
