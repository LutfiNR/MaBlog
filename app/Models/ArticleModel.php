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
    protected $allowedFields    = ['title', 'description','body','reading_time','visited', 'slug', 'is_featured', 'created_at','updated_at','author_id','image_src'];

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

    // Base query for articles
    private function baseArticleQuery()
    {
        return $this->select('articles.*, GROUP_CONCAT(categories.name) as categories, users.name as author_name')
            ->join('article_categories', 'articles.id = article_categories.article_id', 'left')
            ->join('categories', 'article_categories.category_id = categories.id', 'left')
            ->join('users', 'articles.author_id = users.id', 'left')
            ->groupBy('articles.id');
    }

    //format articles categories
    private function formatArticlesCategories(array $articles)
    {
        foreach ($articles as &$article) {
            if (isset($article['categories'])) {
                $article['categories'] = explode(',', $article['categories']);
            }
        }
        return $articles;
    }

    //get all articles
    public function getAllArticles($sort = 'asc', $limit = 10, $orderBy = 'articles.created_at')
    {
        $articles = $this->baseArticleQuery()
            ->orderBy($orderBy, $sort)
            ->findAll($limit);

        return $this->formatArticlesCategories($articles);
    }

    //get article by slug
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

    //get article by id
    public function getArticleById($id)
    {
        $article = $this->baseArticleQuery()
            ->where('articles.id', $id)
            ->first();

        if ($article && isset($article['categories'])) {
            $article['categories'] = explode(',', $article['categories']);
        }

        return $article;
    }

    //get artice featured
    public function getArticleIsFeatures()
    {
        $articles = $this->baseArticleQuery()
            ->where('is_featured', 1)
            ->findAll();

        return $this->formatArticlesCategories($articles);
    }

    //get last article
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
        ->where('categories.name', $category)
        ->findAll();

        return $this->formatArticlesCategories($articles);
    }

    //add article
    public function addArticle($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function deleteArticle($id)
    {
        return $this->delete($id);

    }
    //update article
    public function updateArticle($id, $data){
        return $this->update($id, $data);
    }
    
}
