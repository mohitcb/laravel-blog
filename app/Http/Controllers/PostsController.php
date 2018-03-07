<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;
use Session;
use Nexmo;
use View;
use Auth;




class PostsController extends Controller
{

    public function __construct()
    {
        //if(Auth::guard('web')->check()){
          $this->middleware('auth', ['except' => ['index','show','searchPost','postlist']]);
        //}
        
    }

	public function index()
    {   
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        // $posts = Post::where('id','=',4)->first();
        //$user_id=auth()->user()->iconv(in_charset, out_charset, str)d;
        //$user = User::find($user_id);
        // return response()->json(['results'=>$posts]);
        return view('posts.index')->withPosts($posts);
    }
    public function postlist()
    {   
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        // $posts = Post::where('id','=',4)->first();
        //$user_id=auth()->user()->iconv(in_charset, out_charset, str)d;
        //$user = User::find($user_id);
        return response()->json(['results'=>$posts]);
        // return view('posts.index')->withPosts($posts);
    }

	public function create()
    {
        return view('posts.create');
    }

	public function store(Request $request)
	{
		// Form View
		request()->validate([
            'title' => 'required',
            // 'slug'  => 'required|min:5|max:255|unique:posts,slug',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

         // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'no_image.png';
        }
        
		$post = new Post;
        // Post::create($request->all());

        $post->body = $request->input('body');
        $post->title = $request->input('title');
        // $post->slug = Str::slug($post->title);
        $post->user_id = auth()->user()->id;
        // $post->slug = str_slug($request->input('slug'),'-');
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect()->route('posts.index')->with('success','post created successfully');
	}

 	public function edit($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('/')->with('error','Unauthorized page'); 
        }
        return view('posts.edit')->withPost($post);
    }

   public function update(Request $request, $id)
   {
        $post = Post::find($id);

        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body'  => 'required'
            ));
        } else {
        $this->validate($request, array(
                'title' => 'required|max:255',
                //'slug'  => 'required|min:5|max:255|unique:posts,slug',
                'body'  => 'required'
            ));
        }

        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        //$post = Post::find($id);
        $post->body = $request->input('body');
        $post->title = $request->input('title');
        $post->slug = str_slug($request->input('slug'),'-');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();


        // set flash data with success message
        Session::flash('success', 'This post was successfully saved.');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->slug);
    }
    public function show($slug)
    {
        $post = Post::where('slug','=',$slug)->first();
        // dd($post);
        // print_r($post->tag());exit;
        return view('posts.show')->withPost($post);
    }

    public function getSingle($slug)
    {
        $post = Post::where('slug','=',$slug)->first();
        return view('posts.show')->withPost($post);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/')->with('error','Unauthorized page'); 
        }
        $post->delete();
        
        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');
    }

    public function searchPost(Request $request)
    {
        $query = $request->input('q');
        $posts = Post::search($query)->get();
        return View::make('posts.livesearchajax')->with('posts', $posts);
         // return view('posts.livesearchajax')->withPosts($posts);
    }

}