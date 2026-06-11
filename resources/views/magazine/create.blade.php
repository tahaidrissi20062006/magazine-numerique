<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article - L'Époque</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#faf9f6] text-gray-900 antialiased font-sans">

    <nav class="py-6 border-b border-gray-200 mb-10">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-serif font-bold">L'Époque</a>
            <a href="/" class="text-sm uppercase tracking-widest font-semibold hover:text-amber-800 transition-colors">← Retour à l'accueil</a>
        </div>
    </nav>

    <main class="container mx-auto px-4 max-w-2xl mb-24">
        <h1 class="text-4xl font-serif font-bold mb-8 text-center">Écrire un nouvel article</h1>

        <form action="{{ route('article.store') }}" method="POST" class="bg-white p-8 shadow-sm border border-gray-100">
            @csrf

            <div class="mb-6">
                <label for="titre" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Titre de l'article (العنوان)</label>
                <input type="text" id="titre" name="titre" required class="w-full px-4 py-3 border border-gray-300 focus:border-amber-700 focus:ring-1 focus:ring-amber-700 outline-none transition-colors">
                @error('titre')
        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
    @enderror
            </div>

            <div class="mb-6">
                <label for="categorie" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Catégorie (القسم)</label>
                <div class="mb-6">
    <label for="image_url" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Lien de l'image (رابط الصورة)</label>
    <input type="url" id="image_url" name="image_url" class="w-full px-4 py-3 border border-gray-300 focus:border-amber-700 focus:ring-1 focus:ring-amber-700 outline-none transition-colors" placeholder="https://images.unsplash.com/...">
</div>
                <select id="categorie" name="categorie" required class="w-full px-4 py-3 border border-gray-300 focus:border-amber-700 focus:ring-1 focus:ring-amber-700 outline-none transition-colors bg-white">
                    <option value="Culture">Culture</option>
                    <option value="Mode">Mode</option>
                    <option value="Art">Art</option>
                    <option value="Style de vie">Style de vie</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="extrait" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Extrait (المقتطف)</label>
                <textarea id="extrait" name="extrait" rows="3" required class="w-full px-4 py-3 border border-gray-300 focus:border-amber-700 focus:ring-1 focus:ring-amber-700 outline-none transition-colors"></textarea>
                @error('extrait')
        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
    @enderror
            </div>

            <div class="mb-6">
                <label for="contenu" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Contenu complet (المحتوى الكامل)</label>
                <textarea id="contenu" name="contenu" rows="10" required class="w-full px-4 py-3 border border-gray-300 focus:border-amber-700 focus:ring-1 focus:ring-amber-700 outline-none transition-colors"></textarea>
                @error('contenu')
        <p class="text-red-1000 text-xs mt-1 font-semibold">{{ $message }}</p>
    @enderror
            </div>

            <div class="text-center mt-8">
                <button type="submit" class="bg-black text-white px-8 py-3 font-bold uppercase tracking-widest hover:bg-amber-800 transition-colors">
                    Publier l'article
                </button>
            </div>
        </form>
        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" class="form-control">
    </form>
    </main>

</body>
</html>