<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('articles', function (Blueprint $table) {
        $table->id();
        $table->string('titre'); // عنوان المقال (Titre)
        $table->text('extrait'); // مقتطف صغير يظهر في الصفحة الرئيسية (Extrait)
        $table->longText('contenu'); // محتوى المقال الكامل (Contenu)
        $table->string('image_url')->nullable(); // صورة غلاف المقال
        $table->string('categorie'); // قسم المقال (مثال: Mode, Art, Culture)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
