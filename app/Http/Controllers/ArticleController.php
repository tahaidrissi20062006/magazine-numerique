<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
   
     public function index() {
    // عرض 6 مقالات في كل صفحة
    $articles = Article::latest()->paginate(6); 
    return view('magazine.index', compact('articles'));
}
        
   

    
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('magazine.show', compact('article'));
    }

    
    public function create()
    {
        return view('magazine.create');
    }

   
 public function store(Request $request)
{
    // 1. تعريف المتغير أولاً عبر عملية التحقق
    $validated = $request->validate([
        'titre' => 'required',
        'extrait' => 'required',
        'contenu' => 'required',
        'categorie' => 'required',
        'image_url' => 'nullable|url',
    ]);

    // 2. معالجة الصورة بشكل مستقل وإضافتها للمصفوفة
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $validated['image_url'] = 'images/' . $imageName;
    }

    // 3. الآن $validated دائماً موجود ومعرف
    Article::create($validated);

   // للتوجيه إلى الصفحة الرئيسية للموقع مثلاً
return redirect('/');
}
public function destroy($id)
{
    $article = Article::findOrFail($id);
    $article->delete();
    
    // تم تعديل المسمى هنا من articles.index إلى article.index ليتطابق مع الـ Route لديك
    return redirect()->route('article.index')->with('success', 'Article supprimé !');
}

}