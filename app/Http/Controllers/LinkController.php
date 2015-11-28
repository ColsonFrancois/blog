<?php
namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LinkController extends \App\Http\Controllers\Controller
{
    public function articles()
    {
        $articles = User::join('articles', 'users.id','=','articles.autor')
            ->select('users.name as nom','articles.id' ,'articles.message', 'articles.title', 'articles.subtitle', 'articles.created_at')
            ->get();


        // $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        return view('link/articles')->with('articles', $articles); //Passer les articles récuperé dans la bdd a la vue
    }

    public function about()
    {
        return view('link/about');
    }

    public function connexion()
    {
        return view('auth/login');
    }

    public function admin()
    {
        return view('link/administrator');
    }


    public function register()
    {
        return view('auth/register');
    }

    public function articlesbyauthor($name)
    {
        $articles = Article::where('autor', $name)->orderBy('created_at', 'desc')->paginate(5);
        return view('link/articlesbyauthor')->with('articles', $articles); //Passer les articles récuperé dans la bdd a la vue
    }

    public function articlebyid($id)
    {
        $articles = Article::find($id);
        return view('link/articlebyid')->with('articles', $articles); //on passe les information de l'articles récupéré par son id
    }

    public function deleteArticle($id)
    {
        $articles = Article::find($id);
        $articles->delete();
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
            $article->save();
            return redirect()->route('articles');
        }
        return view('link/administrator')->with('article', $article); //si il s'agit d'un get on passe les informations de l'articles dans la page d'administrator
    }

    public function createArticle(Request $request)
    {
        $param = $request->except(['_token']);
        $article = new \App\Article;
        $article->autor = Auth::user()->id;
        $article->title = $param['Titre'];
        $article->subtitle = $param['sousTitre'];
        $article->message = $param['Message'];
        $article->save();
        return redirect()->route('articles'); //Rediriger vers la vue d'acceuil
    }

    public function comment(Request $request)
    {
        $param = $request->except(['_token']);
        $comment = new \App\Comment;
        $comment->autor = $param['autor'];
        $comment->message = $param['comment'];
        $comment->article = $param['article'];
        $comment->save();
        return redirect()->action('LinkController@articlebyid', $param['article']); //On actione la fonction articlebyid qui attends un paramètre l'id
    }

}