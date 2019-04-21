<?php

namespace edu\jgallegos362\objectOriented;

require_once (dirname(__DIR__, 2) . "/composer.json/autoload.php");

use Ramsey\Uuid\Uuid;
/**
 * An online author profile
 * This author profile describes what traits go into an online author profile. Traits that pertain to the individual's
 * user information and privacy.
 * @author Jeffrey Gallegos <jgallegos362@cnm.edu>
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
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the authorId
		$this->authorId = Uuid;
	}
	/**
	 * accessor method for author activation token
	 * @return string value of the activation token
	 */

	public function getAuthorActivationToken() : ?string {
		return ($this->authorActivationToken);
	}
	/**
	 * mutator method for author activation token
	 *
	 * @param string $newAuthorActivationToken
	 * @throws \InvalidArgumentException  if the token is not a string or insecure
	 * @throws \RangeException if the token is not exactly 32 characters
	 * @throws \TypeError if the activation token is not a string
	 */
	/**
	 * @param mixed $authorActivationToken
	 */
	public function setAuthorActivationToken(?string $newAuthorActivationToken): void {
		if ($newAuthorActivationToken === null) {
			$this->authorActivationToken = null;
			return;
		}
		$newAuthorActivationToken = strtolower(trim($newAuthorActivationToken));
		if(ctype_xdigit($newAuthorActivationToken) === false) {
			throw (new\RangeException("author activation is not valid"));
		}
		if(strlen($newAuthorActivationToken) !== 32) {
			throw (new\RangeException("author activation token has to be 32"));
		}
		$this->authorActivationToken = $newAuthorActivationToken;
	}




	/**
	 * accessor method for author avatar Url
	 * @return string value of the avatar Url
	 */
	/**
	 * @return mixed
	 */
	public function getAuthorAvatarUrl(): string {
		return ($this->authorAvatarUrl);
	}
	/**mutator method for author avatar Url
	 *
	 * @param string $newAuthorAvatarUrl new value of at avatar
	 * @throws \InvalidArgumentException if $newAvatarUrl is not a string or insecure
	 * @throws \RangeException if $newAvatarUrl is > 255 characters
	 * @throws \TypeError if newAvatarUrl is not a string
	 **/
	/**
	 * @param mixed $authorAvatarUrl
	 */
	public function setAuthorAvatarUrl(string $newAuthorAvatarUrl) : void {
		$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorAvatarUrl) === true) {
			throw (new \InvalidArgumentException("author avatar Url is empty or insecure"));
		}
		if(strlen($newAuthorAvatarUrl) > 255) {
			throw(new \RangeException("author avatar url is too large"));
		}
		$this->authorAvatarUrl = $newAuthorAvatarUrl;
	}



	/**
	 * accessor method for author email
	 * @return string value of the email
	 */
	/**
	 * @return mixed
	 */
	public function getAuthorEmail(): string {
		return ($this->authorEmail);
	}
	/**mutator method for author email
	 *
	 * @param string $newAuthorEmail new value of Email
	 * @throws \InvalidArgumentException if $newEmail is not a string or insecure
	 * @throws \RangeException if $newEmail is > 128 characters
	 * @throws \TypeError if newEmail is not a string
	 **/
	/**
	 * @param mixed $authorEmail
	 */
	public function setAuthorEmail(string $newAuthorEmail) : void {
		$newAuthorEmail = trim($newAuthorEmail);
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newAuthorEmail) === true) {
			throw (new \InvalidArgumentException("author email is empty or insecure"));
		}
		if(strlen($newAuthorEmail) > 128) {
			throw(new \RangeException("author email is too large"));
		}
		$this->authorEmail = $newAuthorEmail;
	}


	/**
	 * accessor method for author hash
	 * @return string value of the hash
	 */
	/**
	 * @return mixed
	 */
	public function getAuthorHash(): string {
		return ($this->authorHash);
	}
	/**mutator method for author hash
	 *
	 * @param string $newAuthorHash new value of Hash
	 * @throws \InvalidArgumentException if $newHash is not a string or insecure
	 * @throws \RangeException if $newHash is > 97 characters
	 * @throws \TypeError if newHash is not a string
	 **/
	/**
	 * @param mixed $authorHash
	 */
	public function setAuthorHash(string $newAuthorHash) : void {
		$newAuthorHash = trim($newAuthorHash);
		if(empty($newAuthorHash) === true) {
			throw (new \InvalidArgumentException("author hash is empty or insecure"));
		}
		$authorHashInfo = password_get_info($newAuthorHash);
		if($authorHashInfo["algoName"] !== "argon2i") {
			throw(new \ InvalidArgumentException("author hash is not a valid hash"));
		}
		if(strlen($newAuthorHash) > 97) {
			throw(new \RangeException("author hash is too large"));
		}
		$this->authorHash = $newAuthorHash;
	}
}




