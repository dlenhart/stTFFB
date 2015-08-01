<?php
## Desc: lib/posts.class.php - Class to Display individual posts
## Auth: Drew D. Lenhart
## http://www.drewlenhart.com
## 07/05/15

class listPost {
    
    public $directory;
    public $article;
    public $dir;
    protected $file;
    public $output;

    public function __construct($file) {
        $this->file = $file;
    }
    
    public function readPosts($dir , $article) {
        $extention = ".txt";
        $filename = $dir . "/" . $article . $extention;

        //open file
        $open = fopen($filename, 'r');
            
        //get the contents of the file
        $content = stream_get_contents($open);
            
        //get the json meta data.
        $content = explode("#content#", $content);
        $raw = array_shift($content);
            
        //decode json meta data in each .txt
        $json = json_decode($raw,true);
            
        //now implode, and grab after #content#.
        $content = implode("#content#", $content);

        $title = $json['title'];

        $author = $json['author'];
        $date = $json['date'];
        
        $output = "<h2>" . $title . "</h2>";
        $output .= "By: " . $author . " - " . $date . "<br /><br />";

        $output .= $content;
        
        return $output;
  
    }
}
?>
