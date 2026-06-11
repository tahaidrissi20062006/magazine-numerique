<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - L'Époque</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#faf9f6] h-screen flex items-center justify-center">
    <div class="bg-white p-8 shadow-sm border border-gray-200 w-full max-w-md">
        <h2 class="text-3xl font-serif font-bold text-center mb-6">Se connecter</h2>
        <form action="/login" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-xs font-bold uppercase mb-2">Email</label>
                <input type="email" name="email" required class="w-full p-3 border border-gray-300 outline-none">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-6">
                <label class="block text-xs font-bold uppercase mb-2">Mot de passe</label>
                <input type="password" name="password" required class="w-full p-3 border border-gray-300 outline-none">
            </div>
            <button type="submit" class="w-full bg-black text-white p-3 uppercase tracking-widest font-bold text-sm hover:bg-amber-800 transition-colors">Entrer</button>
        </form>
    </div>
</body>
</html>