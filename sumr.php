#!/usr/bin/env php
<?php
/**
 * @license sumr v0.1.0
 * (c) 2015 Kazuo Kojima
 * License: MIT
 */

define('DEFAULT_HASH_ALGO', 'md5');

$g_ignores = array('.', '..', 'desktop.ini', 'Thumbs.db', '.DS_Store');
$g_hash_algo = DEFAULT_HASH_ALGO;
$g_path_func = 'strval';
if (function_exists('normalizer_normalize')) {
	$g_path_func = 'normalizer_normalize';
}

$options = getopt('a:');
if (!empty($options['a'])) {
	$g_hash_algo = $options['a'];
	if (!in_array($g_hash_algo, hash_algos())) {
		exit('Unknown hashing algorithm: ' . $g_hash_algo);
	}
}
if (count($argv) === 1) {
	$path = '.';
} else {
	$path = $argv[count($argv) - 1];
}

chdir($path);
print("PATH\tCHECKSUM ($g_hash_algo)\n");
print_sum_recursive('.');

function print_sum_recursive($path)
{
	global $g_hash_algo;
	global $g_path_func;

	$entries = array_merge(glob("$path/*"), glob("$path/.*"));
	$entries = array_map($g_path_func, $entries);
	sort($entries);
	foreach ($entries as $entry) {
		if (is_ignore($entry)) {
			continue;
		}
		if (is_file($entry)) {
			printf("%s\t%s\n", $g_path_func($entry), hash_file($g_hash_algo, $entry));
		} elseif (is_dir($entry)) {
			print_sum_recursive($entry);
		}
	}
}

function is_ignore($entry)
{
	global $g_ignores;

	return in_array(basename($entry), $g_ignores);
}
