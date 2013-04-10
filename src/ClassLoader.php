<?php
namespace Composer\Autoload;

use Composer\Autoload\ClassLoaderModified;

class ClassLoader extends ClassLoaderModified {

	public $filters = array();

	public function __construct() {
		$this->filters[] = array($this, 'removeFinal');
	}

	public function loadClass($class) {
		//echo "Loading: " . $class . "\n";
		$file = $this->findFile($class);
		if ($file) {
			$source = file_get_contents($file);
			foreach($this->filters as $filter) {
				$source = call_user_func($filter, $file, $source);
			}
			if (strpos($source, '<?php') === 0) {
				$source = substr($source, 5);
			}
			eval($source);
			return;
		}
	}

	public function removeFinal($file, $source) {
		$tokens = token_get_all($source);
		$s = '';
		foreach ($tokens as $token) {
			if (!is_array($token)) {
				$s .= $token;
				continue;
			}
			if (is_array($token) && $token[0] !== 346) {
				$s .= $token[1];
			}
		}
		return $s;
	}

}