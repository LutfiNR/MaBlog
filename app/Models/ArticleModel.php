<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id', 'title', 'description', 'content', 'user_id', 'created_at', 'updated_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getAllArticles($limit = null, $sort = null)
    {
        $db = \Config\Database::connect();
    
        // Set default sort direction to 'DESC' if no sort provided
        $sort = $sort ?? 'DESC';
    
        // Build the query
        $builder = $this->select('articles.*, users.name as author_name')
            ->join('users', 'users.id = articles.author_id')
            ->orderBy('articles.created_at', strtoupper($sort));  // Order by 'created_at'
    
        // Apply limit if specified
        if ($limit !== null) {
            $builder->limit($limit);
        }
    
        // Execute the query and fetch articles
        $articles = $builder->findAll();
    
        // Enrich articles with categories and keywords
        foreach ($articles as &$article) {
            // Fetch categories and keywords in a single query
            $articleDetails = $db->table('article_categories')
                ->select('categories.name as category_name, keywords.name as keyword_name')
                ->join('categories', 'categories.id = article_categories.category_id')
                ->join('article_keywords', 'article_keywords.article_id = article_categories.article_id')
                ->join('keywords', 'keywords.id = article_keywords.keyword_id')
                ->where('article_categories.article_id', $article['id'])
                ->get()
                ->getResultArray();
    
            // Collect categories and keywords
            $article['categories'] = array_column($articleDetails, 'category_name');
            $article['keywords'] = array_column($articleDetails, 'keyword_name');
        }
    
        return $articles;
    }
    
    // Get articles by category
    public function getArticlesByCategory($categoryName)
    {
        $db = \Config\Database::connect();
    
        // Get articles filtered by category
        $articles = $this->select('articles.*, users.name as author_name')
            ->join('users', 'users.id = articles.author_id')
            ->join('article_categories', 'article_categories.article_id = articles.id')
            ->join('categories', 'categories.id = article_categories.category_id')
            ->where('categories.name', $categoryName)
            ->orderBy('articles.created_at', 'DESC')
            ->findAll();
    
        // Enrich articles with categories and keywords
        foreach ($articles as &$article) {
            // Fetch categories and keywords in a single query
            $articleDetails = $db->table('article_categories')
                ->select('categories.name as category_name, keywords.name as keyword_name')
                ->join('categories', 'categories.id = article_categories.category_id')
                ->join('article_keywords', 'article_keywords.article_id = article_categories.article_id')
                ->join('keywords', 'keywords.id = article_keywords.keyword_id')
                ->where('article_categories.article_id', $article['id'])
                ->get()
                ->getResultArray();
    
            // Collect categories and keywords
            $article['categories'] = array_column($articleDetails, 'category_name');
            $article['keywords'] = array_column($articleDetails, 'keyword_name');
        }
    
        return $articles;
    }
    
    // Get article by ID
    public function getArticleById($articleId)
    {
        $db = \Config\Database::connect();
    
        // Get article by ID with author name
        $article = $this->select('articles.*, users.name as author_name')
            ->join('users', 'users.id = articles.author_id')
            ->where('articles.id', $articleId)
            ->first();
    
        if ($article) {
            // Fetch categories and keywords in a single query
            $articleDetails = $db->table('article_categories')
                ->select('categories.name as category_name, keywords.name as keyword_name')
                ->join('categories', 'categories.id = article_categories.category_id')
                ->join('article_keywords', 'article_keywords.article_id = article_categories.article_id')
                ->join('keywords', 'keywords.id = article_keywords.keyword_id')
                ->where('article_categories.article_id', $article['id'])
                ->get()
                ->getResultArray();
    
            // Assign categories and keywords
            $article['categories'] = array_column($articleDetails, 'category_name');
            $article['keywords'] = array_column($articleDetails, 'keyword_name');
        }
    
        return $article;
    }
    
    // Search articles by query
    public function searchArticles($query)
    {
        $db = \Config\Database::connect();
    
        // Search articles based on title and description
        $articles = $this->like('title', $query)
            ->orLike('description', $query)
            ->findAll();
    
        // Enrich articles with categories, keywords, and author names
        foreach ($articles as &$article) {
            // Fetch categories, keywords, and author name in a single query
            $articleDetails = $db->table('article_categories')
                ->select('categories.name as category_name, keywords.name as keyword_name')
                ->join('categories', 'categories.id = article_categories.category_id')
                ->join('article_keywords', 'article_keywords.article_id = article_categories.article_id')
                ->join('keywords', 'keywords.id = article_keywords.keyword_id')
                ->where('article_categories.article_id', $article['id'])
                ->get()
                ->getResultArray();
    
            // Collect categories and keywords
            $article['categories'] = array_column($articleDetails, 'category_name');
            $article['keywords'] = array_column($articleDetails, 'keyword_name');
    
            // Get author name
            $author = $db->table('users')
                ->select('name')
                ->where('id', $article['author_id'])
                ->get()
                ->getRow();
    
            if ($author) {
                $article['author_name'] = $author->name;
            }
        }
    
        return $articles;
    }    
}
