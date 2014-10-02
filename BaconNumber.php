<?php
/**
 * Created by PhpStorm.
 * User: dnaphas
 * Date: 10/1/14
 * Time: 4:49 PM
 */

class Actor {
	private $name; // Must identify the actor's link on Wikipedia.
	public $color; // White means undiscovered, gray means discovered but not fully searched,
					// black means fully searched.
	public $parent; // Parent Actor in the breadth-first tree.
	public $d; // Distance from the starting point in the breadth-first search.

	public function __construct($name, $parent, $d){
		$this->name = $name;
		$this->color = 'gray';
		$this->parent = $parent;
		$this->d = $d;
	}
}

class BaconNumber {

	const BACON = "Kevin Bacon"; // We look for connections to him.

	// Wikipedia REST API strings.
	const API_BASE = 'http://en.wikipedia.org/w/api.php?';
	const GET_PAGE_PREFIX = 'format=json&action=query&titles=';
	const GET_PAGE_SUFFIX = '&prop=revisions&rvprop=content';

	const FILMO_HEADING = '==Filmography==';

	private $q; // Queue of people to check.
//	private $set; // People not to enqueue.
//	private $path; // The path from Bacon back to $start.
	private $start; // The person whose Bacon Number we are computing.
//	private $baconNumber; // $start's Bacon Number.

	public function __construct($start){
		// Initialize the data structures for before the search starts.

		$this->q = array();
//		$this->set = array();

		// Validate $start.
		if(!self::isPage($start)){
			echo "Cannot find a Wikipedia page for $start.\n";
			return null;
		}
		$this->start = $start;
	}

	/**
	 * @param string $name The name to check for existence as a Wikipedia page.
	 * @return boolean true if there is a page with this name, or like this name, false otherwise, null
	 * on error.
	 */
	public function isPage($name){
		/*
		Sample GET request:
		$ch = curl_init("REMOTE XML FILE");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
		 */

		$ch = curl_init(self::API_BASE . self::GET_PAGE_PREFIX . urlencode($name) .
			self::GET_PAGE_SUFFIX );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		if($response === false){
			return false;
		}
		$response_json = json_decode($response, true);
		if($response_json === null){
			return null;
		}
		if(count($response_json) == 0){
			return null;
		}
		if(self::deepKeyExists('missing', $response_json) === true){
			return false;
		}
		return true;
	}

	/**
	 * @param array $array
	 * @param string $key
	 * @return boolean true if $key is a key in $array at any depth.
	 */
	public static function deepKeyExists($key, $array){
		if(!is_array($array)){
			return false;
		}
		if(array_key_exists($key, $array)){
			return true;
		}
		foreach($array as $elem){
			if(self::deepKeyExists($key, $elem)){
				return true;
			}
		}
	}

	/**
	 * @param string $actor The name of the actor whose Bacon Number will be computer based on the rules
	 * at http://en.wikipedia.org/wiki/Six_Degrees_of_Kevin_Bacon.
	 * @return array Associative array of information about the connection between $actor and Kevin
	 * Bacon.
	 */
	public function baconNumber($actor){

		// while

	}

	/**
	 * @param string $actor The actor whose graph will be built.
	 * @return array Array of triples (['actor1'] => an actor in a movie, ['actor2'] => another actor in the movie,
	 * ['movie'] => the movie) if $actor was in any movies according to Wikipedia, or false if Wikipedia doesn't know
	 * of any movies with $actor.
	 */
	public static function getGraph($actor){

	}

	/**
	 * @param string $actor The actor whose filmography will be returned.
	 * @return array Numeric array of strings, each the name of a film with $actor,
	 * or false if $actor was in no films or has no Wikipedia presence.
	 */
	public static function getFilmography($actor){
		// Return after each major step.

		// Check for a filmography page.

		// Check for a videography page.

		// Check for a filmography section of a main page.

		// Check for a "Films" heading of a main page.

		// Check for links on a main page. See if each is a film. Build an array of those that are films.

		// Fail.

	}

	/**
	 * @param string $thing Check whether a link on Wikipedia with this name is about a film.
	 * @return boolean true if $thing is the name of a Wikipedia page about a film, false otherwise.
	 */
	public static function isFilm($thing){


	}

	/**
	 * @param string $film The film whose cast will be returned.
	 * @return array String array of names of actors in $film. Return false if no actors were in $film as far as we
	 * can tell, or if Wikipedia has no apparent knowledge that $film is a film.
	 */
	public static function getCast($film){
		// Return after each major step.

		// Check for a Cast heading.

		// Check for links in a "Starring" list, as below an image.

		// Check for links on a main page. Build an array of those that are actors.
	}

	/**
	 * @param string $thing Check whether a link on Wikipedia with this name is about an actor.
	 * @return boolean true if $thing is the name of a Wikipedia page about an actor, false otherwise.
	 */
	public static function isActor($thing){

	}

	public static function searchGraph($actor, $bacon){

	}



}

$str = '{"query":{"pages":{"-1":{"ns":0,"title":"Milefsdfsdfsdfsdfsd","misfsing":""}}}}';
$str = '{
  "array": [
    1,
    2,
    3
  ],
  "boolean": true,
  "null": null,
  "number": 123,
  "object": {
    "a": "b",
    "missing": "d",
    "missinff": "f"
  },
  "string": "Hello World"
}';
$json = json_decode($str, true);
var_dump(BaconNumber::deepKeyExists('missing', $json));

