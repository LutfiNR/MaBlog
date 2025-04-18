<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'slug', 'content', 'isfeatured', 'created_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    private function baseArticleQuery()
    {
        return $this->select('articles.*, GROUP_CONCAT(categories.name) as categories')
            ->join('article_categories', 'articles.id = article_categories.article_id', 'left')
            ->join('categories', 'article_categories.category_id = categories.id', 'left')
            ->groupBy('articles.id');
    }

    private function formatArticlesCategories(array $articles)
    {
        foreach ($articles as &$article) {
            if (isset($article['categories'])) {
                $article['categories'] = explode(',', $article['categories']);
            }
        }
        return $articles;
    }

    public function getAllArticles($sort = 'asc', $limit = 10)
    {
        $articles = $this->baseArticleQuery()
            ->orderBy('articles.created_at', $sort)
            ->findAll($limit);

        return $this->formatArticlesCategories($articles);
    }

    public function getArticleBySlug($slug)
    {
        $article = $this->baseArticleQuery()
            ->where('articles.slug', $slug)
            ->first();

        if ($article && isset($article['categories'])) {
            $article['categories'] = explode(',', $article['categories']);
        }

        return $article;
    }

    public function getArticleIsFeatures()
    {
        $articles = $this->baseArticleQuery()
            ->where('is_featured', 1)
            ->findAll();

        return $this->formatArticlesCategories($articles);
    }

    public function getLastArticle()
    {
        $article = $this->baseArticleQuery()
            ->orderBy('created_at', 'desc')
            ->first();

        if ($article && isset($article['categories'])) {
            $article['categories'] = explode(',', $article['categories']);
        }

        return $article;
    }

    //get all articles by category
    public function getArticlesByCategory($category)
    {
        $articles = $this->baseArticleQuery()
        ->where('categories.slug', $category)
        ->findAll();

        return $this->formatArticlesCategories($articles);
    }
}
