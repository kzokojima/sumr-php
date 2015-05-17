# sumr-php
calculate a message-digest fingerprint (checksum) for a file on recursive

## Requirement

* PHP 5.3.0 or above
* PECL intl 1.0.0 or above (if exist, path is Unicode-normalized)

## Installation

```
$ sudo cp sumr.php /usr/local/bin
$ sudo chmod +x /usr/local/bin/sumr.php
```

## Usage

```
$ sumr.php [-a algo] [dir]
```

or

```
$ php sumr.php [-a algo] [dir]
```

### Options

* -a algo<br>
Name of selected hashing algorithm (i.e. "md5" (default), "sha256", "haval160,4", etc..)

### Output example

```
PATH TAB SUM (ALGO)
./path/to/file1 TAB XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
./path/to/file2 TAB XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
```

* sumr ignore special files ('desktop.ini', 'Thumbs.db', '.DS_Store').
* If normalizer_normalize function is present, path is Unicode-normalized (NFC).

## Test

```
$ sh test.sh
```

## Changes

### v0.1.0 - 2015-05-17

* Initial release

## Author

[Kazuo Kojima](https://github.com/kzokojima)

## License

[MIT](LICENSE)
