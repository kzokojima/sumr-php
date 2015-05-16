cd test
php sumr-gentestdata.php
php ../sumr.php testdata > sum_testdata2.txt
diff sum_testdata.txt sum_testdata2.txt
