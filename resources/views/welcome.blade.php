<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Époque - Magazine Numérique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#faf9f6] text-gray-800 font-sans antialiased">

    <header class="py-10 border-b border-gray-300 mb-12">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm tracking-widest uppercase text-gray-500 mb-2">Art, Culture & Style de vie</p>
            <h1 class="text-6xl font-serif font-bold text-black tracking-tight">L'Époque</h1>
            <p class="mt-4 italic text-gray-600">Votre dose quotidienne de culture française</p>
        </div>
    </header>

    <main class="container mx-auto px-4 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            
            @forelse($articles as $article)
            <article class="group cursor-pointer">
                <div class="overflow-hidden mb-4">
                    <img src="{{ $article->image_url ?? 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a?auto=format&fit=crop&q=80&w=800' }}" 
                         alt="{{ $article->titre }}" 
                         class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                </div>
                <span class="text-xs font-bold uppercase tracking-widest text-amber-700">{{ $article->categorie }}</span>
                <h2 class="text-2xl font-serif font-bold mt-2 mb-3 leading-tight group-hover:text-amber-700 transition-colors">
                    {{ $article->titre }}
                </h2>
                <p class="text-gray-600 line-clamp-3">
                    {{ $article->extrait }}
                </p>
                <div class="mt-4">
                    <a href="{{ route('article.show', $article->id) }}" class="text-sm font-bold border-b border-black pb-1 hover:text-amber-700 hover:border-amber-700 transition-all">
    Lire la suite
</a>

                </div>
                <div class="mt-4">
    <a href="{{ route('article.show', $article->id) }}" class="text-sm font-bold border-b border-black pb-1 hover:text-amber-700 hover:border-amber-700 transition-all">Lire la suite</a>
</div>
            </article>
            @empty
            <p class="text-center col-span-3 font-serif text-xl italic mt-10">Aucun article n'a été publié pour le moment. (لا توجد مقالات حالياً)</p>
            @endforelse

        </div>
    </main>

    <footer class="mt-24 py-10 border-t border-gray-300 text-center">
        <p class="text-gray-500 font-serif italic">&copy; 2026 L'Époque. Tous droits réservés.</p>
    </footer>

</body>
</html>