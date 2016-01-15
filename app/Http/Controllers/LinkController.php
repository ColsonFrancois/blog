<?php
namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;


class LinkController extends \App\Http\Controllers\Controller
{
    public function articles()
    {
        $articles = User::join('articles', 'users.id', '=', 'articles.autor')//On joint les table articles et utilisateurs pour récupéré le nom des utilisateurs createurs de chaque article
        ->select('users.name as autor',
            'articles.id as id',
            'articles.message as message',
            'articles.title as title',
            'articles.subtitle as subtitle',
            'articles.created_at as created_at')
            ->orderBy('articles.created_at', 'desc')
            ->paginate(5);


        // $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        return \view('link/articles')->with('articles', $articles); //Passer les articles récuperé dans la bdd a la vue
    }

    public function about()
    {
        return \view('Link/about');
    }

    public function connexion()
    {
        if (Auth::check()) {
            return redirect()->action('LinkController@articles');
        }
            return \view('auth/login');


    }

    public function admin()
    {

        return \view('Link/administrator');
    }


    public function register()
    {
        if (Auth::check()) {
            return redirect()->action('LinkController@articles');
        }
            return \view('auth/register');

    }


    public function articlesbyauthor($name)
    {

        $articles = User::join('articles', 'users.id', '=', 'articles.autor')
            ->select('users.name as autor',
                'articles.id as id',
                'articles.title as title',
                'articles.subtitle as subtitle',
                'articles.image as image')
            ->orderBy('articles.created_at', 'desc')
            ->where('users.name', $name)
            ->paginate(16);
        // $articles = Article::where('autor', $name)->orderBy('created_at', 'desc')->paginate(5);
        return \view('Link/articlesbyauthor', array(
            'articles' => $articles,
            'nom' => $name));
    }

    public function articlebyid($id)
    {
        // $articles = Article::find($id);
        $articles = Article::join('users', 'users.id', '=', 'articles.autor')
            ->select('users.name as autor',
                'articles.title as title',
                'articles.subtitle as subtitle',
                'articles.message as message',
                'articles.created_at as created_at',
                'articles.id as id')
            ->where('articles.id', $id)
            ->get();


        $comments = Article::join('comments', 'articles.id', '=', 'comments.article')
            ->join('users', 'users.id', '=', 'comments.autor')
            ->select('comments.message as comment',
                'users.name as autor',
                'users.image as image',
                'comments.created_at as date')
            ->where('articles.id', $id)
            ->where('comments.ephemere', '>=', new \DateTime('today'))
            ->get();



        // return \view('Link/articlebyid')->with('articles', $articles); //on passe les information de l'articles récupéré par son id
        return \view('Link/articlebyid', array(
            'articles' => $articles,
            'comments' => $comments));
    }

    public function deleteArticle($id)
    {
        $articles = Article::find($id);
        $articles->delete();
        $comment = Comment::where('article', $id);
        $comment->delete(); //On supprimer les commentaires lié a cet article
        return redirect()->route('articles');
    }

    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id); //on va rechercher l'articles ayant l'id passé dans l'url
        if ($request->isMethod('post')) //si il s'agit d'un post donc d'une modification
        {
            $param = $request->except(['_token']); //on prends tout sauf le token
            $article->title = $param['Titre'];
            $article->subtitle = $param['sousTitre'];
            $article->message = $param['Message'];
            $article->image = $param['image'];
            $article->save();
            return redirect()->route('articles');
        }
        return view('Link/administrator')->with('article', $article); //si il s'agit d'un get on passe les informations de l'articles dans la page d'administrator
    }

    public function createArticle(Request $request)
    {
        $param = $request->except(['_token']);
        $article = new \App\Article;
        $article->autor = Auth::user()->id;
        $article->title = $param['Titre'];
        $article->subtitle = $param['sousTitre'];
        $article->message = $param['Message'];
        $article->image = $param['image'];
        $article->save();
        return redirect()->route('articles'); //Rediriger vers la vue d'acceuil
    }

    public function comment(Request $request)
    {
        $param = $request->except(['_token']);
        $comment = new \App\Comment;
        $comment->autor = Auth::user()->id;
        $comment->message = $param['comment'];
        $comment->article = $param['article'];
        $comment->ephemere = $param['ephemere'];
        $comment->save();
        return redirect()->action('LinkController@articlebyid', $param['article']); //On actione la fonction articlebyid qui attends un paramètre l'id
    }

}