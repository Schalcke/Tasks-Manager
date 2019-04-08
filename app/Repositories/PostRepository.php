<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
	{
		$this->post = $post;
	}

	private function save(Post $post, Array $inputs)
	{
		$post->titre = $inputs['titre'];
		$post->contenu = $inputs['contenu'];	
		$post->user_id = $inputs['user_id'];
		$post->date_end = $inputs['date_end'];
		$post->etat = isset($inputs['etat']);

		$post->save();
	//	dd($inputs['titre']);
	}


	public function getPaginate($n)
	{
		return $this->post->with('user')
		->orderBy('posts.created_at', 'desc')
		->paginate($n);
	}

	public function store(Array $inputs)
	{
		$this->post->create($inputs);
		$post = new $this->post;		
		$this->save($post, $inputs);

		return $post;
	}

	public function getById($id)
	{
		return $this->post->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}