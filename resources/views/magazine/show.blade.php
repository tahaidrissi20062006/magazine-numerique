<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->titre }} - L'Époque</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        .content-body { line-height: 1.8; font-size: 1.15rem; }
    </style>
</head>
<body class="bg-[#faf9f6] text-gray-900 antialiased font-sans">

    <nav class="py-6 border-b border-gray-200">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-serif font-bold">L'Époque</a>
            <a href="/" class="text-sm uppercase tracking-widest font-semibold hover:text-amber-800 transition-colors">← Retour à l'accueil</a>
        </div>
    </nav>

    <article class="container mx-auto px-4 max-w-3xl mt-16 mb-24">
        <div class="text-center mb-12">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-amber-700 block mb-4">{{ $article->categorie }}</span>
            <h1 class="text-4xl md:text-5xl font-serif font-bold leading-tight mb-6">
                {{ $article->titre }}
            </h1>
            <p class="text-gray-500 italic font-serif">Publié le {{ $article->created_at->format('d M Y') }}</p>
        </div>

        <div class="mb-12 shadow-sm">
            <img src="{{ $article->image_url ?? 'https://images.unsplash.com/photo-1499856871958-5b9627545d1a?auto=format&fit=crop&q=80&w=1200' }}" 
                 alt="{{ $article->titre }}" 
                 class="w-full h-auto object-cover">
        </div>

        <div class="content-body text-gray-800 leading-relaxed space-y-6">
            <p class="text-xl font-medium italic border-l-4 border-amber-700 pl-6 my-8 text-gray-700">
                {{ $article->extrait }}
            </p>
            
            <div class="first-letter:text-7xl first-letter:font-serif first-letter:font-bold first-letter:mr-3 first-letter:float-left">
                {!! nl2br(e($article->contenu)) !!}
            </div>
        </div>

        <div class="mt-16 pt-10 border-t border-gray-200 text-center">
            <p class="text-sm text-gray-500 italic">Merci de lire L'Époque, votre source de culture française.</p>
        </div>
    </article>

</body>
</html>