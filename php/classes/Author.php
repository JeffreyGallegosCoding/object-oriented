<?php

namespace edu\jgallegos362\objectOriented;

require_once (dirname(__DIR__, 2) . "/composer.json/autoload.php");

use Ramsey\Uuid\Uuid;
/**
 * Cross Section of a author Profile
 * @author Jeffrey Gallegos <jgallegos362@cnm.edu>
 * @version 1.0.0
 **/

class author {
	use ValidateUuid;
	/**
	 * id for this author; this is the primary key
	 * @var Uuid $authorId
	 **/
	private $authorId;
	/**
	 * avatar Url for this author; this is a url for the author's specific avatar
	 * @var $authorAvatarUrl
	 */
	private $authorAvatarUrl;
	/**
	 * token handed out to verify that the author is valid and not malicious.
	 *v@var $authorActivationToken
	 **/
	private $authorActivationToken;
	/**
	 * email for this author; this is a unique index
	 * @var string $authorEmail
	 **/
	private $authorEmail;
	/**
	 * hash for author password
	 * @var $authorHash
	 **/
	private $authorHash;
	/**
	 * username for this author; this is a unique index
	 * @var $authorUsername
	 */
	private $authorUsername;
	/**
	 * accessor method for author id
	 *
	 * @return Uuid value of author id (or null if new author)
	 **/
	public function getauthorId(): Uuid {
		return ($this->authorId);
	}
	/**
	 * mutator method for authorId
	 *
	 * @param Uuid| string $newAuthorId value for new authorId
	 * @throws \rangeException if $newAuthorId is not positive
	 * @throws \typeError if the authorId is not
	 */
	public function setAuthorId($newAuthorId): void {
		try{
			$uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception))
		}
	}
}


