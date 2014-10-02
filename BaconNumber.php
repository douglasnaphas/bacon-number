<?php
/**
 * Created by PhpStorm.
 * User: dnaphas
 * Date: 10/1/14
 * Time: 4:49 PM
 */

class BaconNumber {

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

BaconNumber::getGraph("Kevin Bacon");