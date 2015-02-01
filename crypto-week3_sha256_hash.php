<?php 

$filename = "6 - 1 - Introduction (11 min).mp4";
$fp = fopen($filename, 'r');

$filesize = filesize($filename);
$start_pos = $filesize - ($filesize % 1024); # starting position of the last block
$read_bytes = ($filesize % 1024); #Number of bytes to read. The last block can be short than 1KB. So do filesize % 1024 to get the number of bytes to read first time
$last_hash = ""; # for the last block, no hash to append
for(;$start_pos >= 0;$start_pos -= 1024) # start reading the file from the end block
{
    fseek($fp, $start_pos); # seek to start_pos
    $block = fread($fp, $read_bytes);   // read bytes from file
    $last_hash =  pack('H*', hash("sha256", $block.$last_hash)); #Calculate hash using "sha256". append the hash of next block(previous in case of reverse)
    $read_bytes = 1024;
}
$hash_first_block = unpack('H*', $last_hash);
print "Hash of the first block: ".$hash_first_block[1];
fclose($fp);

?>