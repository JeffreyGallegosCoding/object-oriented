<?php

namespace jgallegos362\objectOriented;

require_once (dirname(__DIR__) .  "/classes/autoload.php");

use Ramsey\Uuid\Uuid;
/**
 * An online author profile
 * This author profile describes what traits go into an online author profile. Traits that pertain to the individual's
 * user information and privacy.
 * @author Jeffrey Gallegos <jgallegos362@cnm.edu>
 **/

class Author {
	use validateUuid;
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
	 *@var $authorActivationToken
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

	/**
	 * Constructor for Author
	 *
	 * @param Uuid| string $newAuthorId value for new authorId
	 * @param string $newAuthorActivationToken
	 * @param string $newAuthorAvatarUrl new value of at avatar
	 * @param string $newAuthorEmail new value of Email
	 * @param string $newAuthorHash new value of Hash
	 * @param string $newAuthorUsername new value of Username
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are too large
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception
	 */

	public function __construct (string $newAuthorId, string $newAuthorActivationToken, string $newAuthorAvatarUrl,
	string $newAuthorEmail, string $newAuthorHash, string $newAuthorUsername) {
		try {
			$this->setAuthorId($newAuthorId);
			$this->setAuthorActivationToken($newAuthorActivationToken);
			$this->setauthorAvatarUrl($newAuthorAvatarUrl);
			$this->setauthorEmail($newAuthorEmail);
			$this->setauthorHash($newAuthorHash);
			$this->setauthorUsername($newAuthorUsername);
		} //Determine the Exception that was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \ TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}


	public function getAuthorId(): Uuid {
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
			$Uuid = self::validateUuid($newAuthorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the authorId
		$this->authorId = $Uuid;
	}
	/**
	 * accessor method for author activation token
	 * @return string value of the activation token
	 */

	public function getAuthorActivationToken() : string {
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

	public function setAuthorActivationToken(string $newAuthorActivationToken): void {
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
	public function getAuthorHash(): string {
		return ($this->authorHash);
	}
	/**mutator method for author hash
	 *
	 * @param string $newAuthorHash new value of Hash
	 * @throws \InvalidArgumentException if $newHash is not a string or insecure
	 * @throws \RangeException if $newHash is > 97 characters
	 * @throws \TypeError if newHash is not a string
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

	/**
	 * accessor method for author username
	 * @return string value of the username
	 */
	public function getAuthorUsername(): string {
		return ($this->authorUsername);
	}
	/**mutator method for author username
	 *
	 * @param string $newAuthorUsername new value of Username
	 * @throws \InvalidArgumentException if $newUsername is not a string or insecure
	 * @throws \RangeException if $newUsername is > 32 characters
	 * @throws \TypeError if newUsername is not a string
	*/
	public function setAuthorUsername(string $newAuthorUsername) : void {
		$newAuthorUsername = trim($newAuthorUsername);
		$newAuthorUsername = filter_var($newAuthorUsername, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorUsername) === true) {
			throw (new \InvalidArgumentException("author username is empty or insecure"));
		}
		if(strlen($newAuthorUsername) > 32) {
			throw(new \RangeException("author username is too large"));
		}
		$this->authorUsername = $newAuthorUsername;
	}
	/**Insert statement for Author class
	 * @param \$pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */

	public function insert(\PDO $pdo) : void {
		//create query template
		$query = "insert into author(authorId, authorAvatarUr1, authorActivationToken, authorEmail, authorHash, authorUsername)
 						values (6ca4f376-d58f-4caf-8595-f5d45e9392e0, books.com,05eabe9f-f026-482f-8692-9d975b8f13ae, reader@reads.com,
 						 $argon2i$v=19$m=1024,t=384,p=2$T1B6Ymdqa3FJdmZqaDdqYg$hhyC1jf2WjbgfD8Jp6GZE9Tg3IpsYpXKm2VWYOJq8LA, Ilikebooks)";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$parameters = ["authorId" => $this->authorId->getBytes()];
		$statement->execute($parameters);
	}
		/**
		 * Delete statement for author class
		 * @\PDO $pdo PDO connection object
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError if $pdo is not a PDO connection object
		 */

		public function delete(\PDO $pdo) : void {
			//query template
			$query = "delete from author where authorId = 6ca4f376-d58f-4caf-8595-f5d45e9392e0";
			$statement = $pdo->prepare($query);

			//bind the member variables to the place holders in the template
			$parameters = ["authorId" => $this->authorId->getBytes()];
			$statement->execute($parameters);
		}
		/**Update statement for Author class
		 *
		 * @param \PDO $pdo PDO connection object
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError if $pdo is not a PDO connection object
		 */

		public function update(\PDO $pdo) : void {
			//Query template
			$query = "update author set authorUsername = BooksAreMyFavorite, authorAvatarUr1 = :BookLover where authorId = 6ca4f376-d58f-4caf-8595-f5d45e9392e0";
			$statement = $pdo->prepare($query);

			$parameters = ["authorId" => $this->authorId->getBytes()];
			$statement ->execute($parameters);
		}

	/**
	 * returns a single object statement
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $authorId author id to search for
	 * @return Author|null author found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 */

		public static function getAuthorByAuthorId (/PDO $pdo, $authorId) : ?Author {
	 	// sanitize the authorId before searching
	 	try {
	 		$authorId = self :: validateUuid ($authorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $excepection) {
	 		throw(new \PDOException($excepection->getMessage(), 0, $excepection));
		}
		//query template
		$query = "Select authorId, authorUsername from author where authorId = :authorId";
	 	$statement = $pdo->prepare($query);
	 	//bind the author id to the template place holder
		$parameters = ["authorId" => $authorId->getBytes()];
		$statement->execute($parameters);
		//get the author from mySQL
		try {
			$author = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$author = new Author($row["authorId"], $row["authorAvatarUrl"], $row["authorActivationToken"], $row["authorEmail"],
					$row["authorUsername"], $row["authorHash"]);
			}
		} catch(\Exception $exception) {
			//if the row could not be converted rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($author);
	 }

	 /**
	  * method that returns a full array
	  *
	  * @param \PDO $pdo PDO connection object
	  * @param Uuid|String $authorActivationTokenId author Activation Token id to search by
	  *@return \SplFixedArray of authors found
	  *@throws \PDOException when mySQL related errors occur
	  *@throws \TypeError when variables are not the correct data type
	  */

	 public static function getAuthorByAuthorActivationToken(\PDO $pdo, $aurhotActivationTokenId) : \SplFixedArray {
	 	try {
	 		$authorActivationTokenId = self::validateUuid($authorActivationTokenId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
	 		throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		//create new query template
		$query = "select authorId, authorActivationToken, authorEmail from authorId where authorActivationToken = :authorActivationId";
	 	$statement = $pdo->prepare($query);
	//bind the author activation token id to the place holder in the template
	$parameters = ["authorActivationTokenId" => $authorActivationTokenId->getBytes()];
	$statement->execute($parameters);
	//build an array of authors
	$authors = new \SplFixedArray($statement->rowCount());
	$statement->setFetchMode(\Pdo::FETCH_ASSOC);
	while(($row = $statement->fetch()) !== false){
		try {
			$author = new Author($row["authorId"], $row["authorActivationToken"], $row["authorEmail"]);
			$authors[$authors->key()] = $author;
			$authors->next();
		} catch(\Exception $exception) {
			//if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}
	return($authors);
}
}




