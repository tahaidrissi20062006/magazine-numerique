<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Époque - Magazine Numérique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#faf9f6] text-gray-800 font-sans antialiased">

   <header class="py-10 border-b border-gray-300 mb-12 relative">
    <div class="container mx-auto px-4 text-center">

        <div class="md:absolute md:top-8 md:right-8 flex flex-col md:flex-row items-center gap-4 mb-6 md:mb-0 justify-center">
            @auth
                <div class="text-xs text-left md:text-right">
                    <p class="text-gray-500">Bienvenue, <span class="font-bold text-black">{{ Auth::user()->name }}</span></p>
                    <p class="text-[10px] uppercase tracking-widest font-semibold {{ Auth::user()->role === 'admin' ? 'text-amber-700' : 'text-blue-600' }}">
                        Status: {{ Auth::user()->role === 'admin' ? 'Architecte (Admin)' : 'Lecteur (Utilisateur)' }}
                    </p>
                </div>

                <a href="{{ route('article.create') }}" class="inline-block border border-black px-4 py-2 text-xs uppercase tracking-widest font-bold hover:bg-black hover:text-white transition-all duration-300 whitespace-nowrap">
                    + Écrire un article
                </a>
                
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-xs uppercase tracking-widest font-bold text-gray-400 hover:text-red-600 transition-colors duration-300 whitespace-nowrap">
                        Déconnexion 🚪
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-xs uppercase tracking-widest font-bold text-gray-600 hover:text-black transition-colors duration-300">
                    Connexion
                </a>
                <a href="{{ route('register') }}" class="inline-block border border-black px-4 py-2 text-xs uppercase tracking-widest font-bold hover:bg-black hover:text-white transition-all duration-300 whitespace-nowrap">
                    Créer un compte
                </a>
            @endguest
        </div>
        
        <p class="text-sm tracking-widest uppercase text-gray-500 mb-2">Art, Culture & Style de vie</p>
        <h1 class="text-6xl font-serif font-bold text-black tracking-tight">L'Époque</h1>
        <p class="mt-4 italic text-gray-600">Votre dose quotidienne de culture française</p>
    </div>
</header>

    <main class="container mx-auto px-4 max-w-6xl mb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">

            @forelse($articles as $article)
                <article class="group cursor-pointer bg-white p-4 border border-gray-100 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="overflow-hidden mb-4 bg-gray-100 aspect-[4/3] flex items-center justify-center border border-gray-200">
                            @if($article->image_url)
                                <img src="{{ $article->image_url }}" alt="{{ $article->titre }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=800';">
                            @else
                                <span class="text-gray-400 text-xs uppercase tracking-widest">L'Époque Illustration</span>
                            @endif
                        </div>
                        
                        <p class="text-xs uppercase tracking-widest text-amber-700 font-bold mb-2">{{ $article->categorie }}</p>
                        <h3 class="text-xl font-serif font-bold text-black mb-2 line-clamp-2 group-hover:text-amber-900 transition-colors">
                            {{ $article->titre }}
                        </h3>
                        <p class="text-sm text-gray-600 line-clamp-3 mb-4 leading-relaxed">
                            {{ $article->extrait }}
                        </p>
                    </div>

                   <div class="mt-4 flex justify-between items-center border-t border-gray-100 pt-4">
    <a href="{{ route('article.show', $article->id) }}" class="text-sm font-bold border-b border-black pb-1 hover:text-amber-700 hover:border-amber-700 transition-all">
        Lire la suite
    </a>
    
    @if(Auth::check() && Auth::user()->role === 'admin')
        <form action="{{ route('article.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-xs uppercase tracking-widest text-red-600 hover:text-red-800 font-bold transition-colors">
                Supprimer 🗑️
            </button>
        </form>
    @endif
</div>
                </article>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="italic text-gray-500 font-serif text-lg">Aucun article n'a été publié pour le moment.</p>
                </div>
            @endforelse

        </div>
        <div class="mt-10">
    {{ $articles->links() }}
</div>
    </main>

    <footer class="py-8 border-t border-gray-200 text-center text-xs text-gray-400 uppercase tracking-widest">
        &copy; 2026 L'Époque. Tous droits réservés.
    </footer>

</body>
</html>