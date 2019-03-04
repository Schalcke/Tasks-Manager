<?php
namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $postRepository;

    protected $nbrPerPage = 5;

    public function __construct(PostRepository $postRepository)
	{
		$this->postRepository = $postRepository;
	}

	public function index()
	{
		$posts = $this->postRepository->getPaginate($this->nbrPerPage);
        $links = $posts->render();
        
    //    return 'Hello';

		return view('listePost', compact('posts', 'links'));
	}

	public function create()
	{
		return view('listeAdd');
	}

	public function store(PostRequest $request)
	{
		$inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);
		$user_id = $request->user()->id;
	//	dd($user_id = $request->user()->id);
    //    $this->postRepository->store($inputs);
		$post = $this->postRepository->store($inputs);

		return redirect('post')->withOk("La tache " . $post->titre . " a été créé.");
	}
    
    public function show($id)
	{
		$post = $this->postRepository->getById($id);
		
		return view('listeShow',  compact('post'));
	} 

	public function update(Request $request, $id)
	{
		$this->postRepository->update($id, $request->all());
		
		return redirect('post')->withOk("La tache " . $request->input('titre') . " a été modifié.");
	}
	
	public function edit($id)
	{
		$post = $this->postRepository->getById($id);

		return view('listeEdit',  compact('post'));
	}

	public function destroy($id)
	{
		$this->postRepository->destroy($id);

		return redirect()->back();
	}

}