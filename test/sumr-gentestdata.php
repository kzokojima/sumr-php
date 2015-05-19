<?php

define('TESTDATA_DIR', 'testdata/');
$paths = array(
	'desktop.ini',
	'Thumbs.db',
	'.DS_Store',
	'...',
	'.f',
	'.f.',
	'[a]/a',
	'a',
	'å',
	'b',
	'd/...',
	'd/.f',
	'd/.f.',
	'd/a',
	'd/å',
	'd/b',
	'd/d/...',
	'd/d/.f',
	'd/d/.f.',
	'd/d/a',
	'd/d/å',
	'd/d/b',
	'd/d/f',
	'd/d/f.txt',
	'd/d/f:f',
	'd/d/f\\f',
	'd/d/~',
	'd/d/か',
	'd/d/が',
	'd/d/き',
	'd/d/ａ',
	'd/f',
	'd/f.txt',
	'd/f:f',
	'd/f\\f',
	'd/~',
	'd/か',
	'd/が',
	'd/き',
	'd/ａ',
	'f',
	'f.txt',
	'f:f',
	'f\\f',
	'~',
	'か',
	'が',
	'き',
	'ａ',
);

foreach ($paths as $path) {
	if (!is_dir(dirname(TESTDATA_DIR . $path))) {
		mkdir(dirname(TESTDATA_DIR . $path), 0777, true);
	}
	file_put_contents(TESTDATA_DIR . $path, 'a');
}
