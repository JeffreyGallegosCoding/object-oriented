<?php

namespace edu\jgallegos362\objectOriented;

require_once (dirname(__DIR__, 2) . "/composer.json/autoload.php");

use Ramsey\Uuid\Uuid;
/**
 * Cross Section of a Twitter Profile
 *
 * This is a cross section of what is probably stored about a Twitter user. This entity is a top level entity that
 * holds the keys to the other entities in this example (i.e., Favorite and Profile).
 *
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 * @version 4.0.0
 **/

class author {
	use ValidateUuid;
	private $authorId;
	private $authorAtHandle;
	private $authorActivationToken;
	private $authorEmail;
	private $authorHash;
}
