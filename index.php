<!DOCTYPE html>
<head><title>Serhii Martyniuk MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application is reversing an MD5 hash using a brute force technique where we simply 'forward hash' all possible combinations of characters in strings.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our numbers for pin code
    $txt = "0123456789";
    $show = 25;

    // Outer loop go go through the alphabet for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<strlen($txt); $i++ ) {
        $ch1 = $txt[$i];   // The first of two characters
        for($j=0; $j<strlen($txt); $j++ ) {
            $ch2 = $txt[$j];  // Our second character
            for($s=0; $s<strlen($txt); $s++ ) {
                $ch3 = $txt[$s]; // Our third character
                for($e=0; $e<strlen($txt); $e++){
                    $ch4 = $txt[$e]; // Our forth character
                    
            $try = $ch1.$ch2.$ch3.$ch4;

            $check = hash('md5', $try);
            if ( $check == $md5 ) {
                $goodtext = $try;
                break;   // Exit the inner loop
            }
            if ( $show > 0 ) {
                print "$check $try\n";
                $show = $show - 1;
            } if($goodtext == $try) {
            break;
            }
        }  if($goodtext == $try)   {
            break;
            }
    }  if($goodtext == $try) {
     break;  
        }
    } if($goodtext == $try){
      break;
    }
}
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/csev/wa4e/tree/master/code/crack"
target="_blank">Original source code for this application</a></li>
</ul>
</body>
</html>