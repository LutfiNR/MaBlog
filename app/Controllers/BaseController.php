<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
  /**
   * Instance of the main Request object.
   *
   * @var CLIRequest|IncomingRequest
   */
  protected $request;
  protected $articles;

  /**
   * An array of helpers to be loaded automatically upon
   * class instantiation. These helpers will be available
   * to all other controllers that extend BaseController.
   *
   * @var list<string>
   */
  protected $helpers = [];

  /**
   * Be sure to declare properties for any property fetch you initialized.
   * The creation of dynamic property is deprecated in PHP 8.2.
   */
  // protected $session;

  /**
   * @return void
   */
  public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
  {
    // Do Not Edit This Line
    parent::initController($request, $response, $logger);

    // Preload any models, libraries, etc, here.
    helper(['slugify']);
    $this->articles = [
      [
        'id' => 1,
        'title' => 'My First Article',
        'slug' => 'my-first-article',
        'description' => 'This is a description of my first article.',
        'categories' => [
          'Web Development',
          'React',
        ],
        'image_src' => '/images/avatar.png',
        'image_alt' => 'An image of my first article',
        'author_id' => '1',
        'published_at' => '2023-10-01 12:00:00',
        'updated_at' => '2023-10-01 12:00:00',
        'is_published' => true,
        //give body a html tag content long litle bit
        'body' => '<h2>What to expect from here on out</h2><p>This is the body of my first article.</p><h3>Typography should be easy</h3><p>More content here.</p>',
        'reading_time' => '5 min',
        'is_featured' => true
      ],
      [
        'id' => 2,
        'title' => 'My Second Article',
        'slug' => 'my-second-article',
        'description' => 'This is a description of my second article.',
        'categories' => [
          'PHP',
          'Web Development',
        ],
        'image_src' => '/images/avatar-2.png',
        'image_alt' => 'An image of my second article',
        'author_id' => '1',
        'published_at' => '2023-10-01 12:00:00',
        'updated_at' => '2023-10-01 12:00:00',
        'is_published' => true,
        'body' => 'This is the body of my second article.',
        'reading_time' => '5 min',
        'is_featured' => true
      ],
      [
        'id' => 3,
        'title' => 'My Third Article',
        'slug' => 'my-third-article',
        'description' => 'This is a description of my third article.',
        'categories' => [
          'Next',
          'Web Development',
          'React',
        ],
        'image_src' => '/images/avatar.png',
        'image_alt' => 'An image of my third article',
        'author_id' => '1',
        'published_at' => '2023-10-01 12:00:00',
        'updated_at' => '2023-10-01 12:00:00',
        'is_published' => true,
        'body' => 'This is the body of my third article.',
        'reading_time' => '5 min',
        'is_featured' => true
      ],
      [
        'id' => 4,
        'title' => 'My Fourth Article',
        'slug' => 'my-fourth-article',
        'description' => 'This is a description of my fourth article.',
        'categories' => [
          'React',
          'Next'
        ],
        'image_src' => '/images/avatar-2.png',
        'image_alt' => 'An image of my fourth article',
        'author_id' => '1',
        'published_at' => '2023-10-01 12:00:00',
        'updated_at' => '2023-10-01 12:00:00',
        'is_published' => true,
        'body' => '
                <h2>What to expect from here on out</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>This is the body of my fourth article.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h3>Typography should be easy</h3>
                <p>More content here.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <pre><code class="language-js">const a = 1;
const b = 2;
const c = a + b;
console.log(c);</code></pre>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                ',
        'reading_time' => '5 min',
        'is_featured' => false
      ]
    ];

    // E.g.: $this->session = service('session');
  }
}
