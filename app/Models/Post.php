<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];
    public function scopeFilter($query, $filters): void
    {
//        dd($filters['category']);
        $query->when($filters['search'] ??  false, fn($query, $search) =>
        $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
        );
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                    $query->where('slug', $category)
                )
        );
//        if ($filters['search'] ?? false) {
//            try {
//                $query
//                    ->where('title', 'like', '%' . request('search') . '%')
//                    ->where('body', 'like', '%' . request('search') . '%');
//            } catch (ModelNotFoundException $e) {
//                $post = [];
//                Log::info('No category found with search term: ' . request('search'));
//            }
//        }
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
