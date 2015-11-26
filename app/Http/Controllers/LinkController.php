<?php
namespace App\Http\Controllers;
use App\Article;
use \Illuminate\Support\Facades\Request;
class LinkController extends \App\Http\Controllers\Controller
{
    public function articles()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);

        return view('link/articles')->with('articles', $articles ); //Passer les articles récuperé dans la bdd a la vue
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

    public function createArticle(Request $request)
    {
        $param = $request::all();
        $article = new \App\Article;
        $article->autor = $param['auteur'];
        $article->title = $param['Titre'];
        $article->subtitle = $param['sousTitre'];
        $article->message = $param['Message'];
       $article->save();
        return redirect()->route('articles'); //Rediriger vers la vue d'acceuil
    }
    public function register()
    {
        return view('auth/register');
    }
    public function articlesbyauthor($name)
    {
        $articles = Article::where('autor' , $name )->orderBy('created_at', 'desc')->paginate(5);
        return view('link/articlesbyauthor')->with('articles', $articles ); //Passer les articles récuperé dans la bdd a la vue
    }

    public function deleteArticle($id){
        $articles=Article::find($id);
        $articles->delete();
        return redirect()->route('articlesbyauthor');
    }
    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id); //on va rechercher l'articles ayant l'id passé dans l'url
        if($request->isMethod('post')) //si il s'agit d'un post donc d'une modification
        {
            $param = $request::all();
            $article->title = $param['Titre'];
            $article->subtitle = $param['sousTitre'];
            $article->message = $param['Message'];
            $article->save();
            return redirect()->route('link/articlesbyauthor');
        }
        
    }

}