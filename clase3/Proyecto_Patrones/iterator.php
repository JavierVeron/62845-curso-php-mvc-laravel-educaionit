<?php

	class Movie
	{
		private $title;
		private $release_year;

		function __construct($title_passed,$year_passed)
		{
			$this->title=$title_passed;
			$this->release_year=$year_passed;
		}

		public function show_movie_info()
		{
			echo '<strong>Movie:</strong> '.$this->title.' ('.$this->release_year.') <br>';
		}
	}
	
	class MovieList
	{
		private $movies=array();
		private $total_movies=0;


		public function add_movie(Movie $movie)
		{
			$this->movies[]=$movie;
			$this->total_movies+=1;
		}

		public function get_total_count()
		{
			return $this->total_movies;
		}


		public function get_list()
		{
			return $this->movies;
		}


		public function set_list($list_passed)
		{
			$this->movies=$list_passed;
			$this->total_movies=count($list_passed);
		}
	}
	
	class MovieListIterator
	{
		protected $movie_list;
		protected $current_movie_index=0;
		protected $total_movies_in_list=0;

		function __construct(MovieList $movie_list_passed){
			$this->movie_list=$movie_list_passed;        
			$this->total_movies_in_list=$movie_list_passed->get_total_count();        
		}

		public function has_next(){
			if($this->current_movie_index < $this->total_movies_in_list)
			{
				return true;
			}else
			{
				return false;
			}
		}

		public function next()
		{
			$movies=$this->movie_list->get_list();
			$movie=$movies[$this->current_movie_index];
			$this->current_movie_index+=1;
			return $movie;
		}

	}

	$movie1=new Movie('Inception',2010);
	$movie2=new Movie('Avatar',2009);
	$movie3=new Movie('Man of Steel',2013);
	$movie4=new Movie('Up',2009);
	$movie5=new Movie('Bee Movie',2007);

	$movie_list=new MovieList();

	$movie_list->add_movie($movie1);
	$movie_list->add_movie($movie2);
	$movie_list->add_movie($movie3);
	$movie_list->add_movie($movie4);
	$movie_list->add_movie($movie5);

	$movie_iterator=new MovieListIterator($movie_list);

	while($movie_iterator->has_next()){
		$movie=$movie_iterator->next();
		$movie->show_movie_info();
	}
