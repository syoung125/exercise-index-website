<?php
require_once "./Highlight/Autoloader.php";
require_once "./HighlightUtilities/functions.php";

spl_autoload_register("Highlight\\Autoloader::load");

?>
<!DOCTYPE>
<style>


</style>

<html lang="en">
  <head>
  <link rel="stylesheet" type="text/css" href="./styles/atom-one-dark.css">
        <style type="text/css">
            #content_header{
              margin: 0px;
              padding: 10px;
              text-align: center;
              background: #000000;
            }
            #content_body{
              height: 100%;
            } 
            table {
                border-collapse: collapse;
                border-spacing: 0;
                font-family: sans-serif;
                width: 100%;
                background: #282c34;
                color: #AEB6BF;
            }

            th, td {
                border: none;
                overflow: auto;
            }

            td[data-line-number] {
                border-right: 1px solid grey;
                padding: 0 15px;
                text-align: right;
                width: 1%;
            }

            td[data-line-number]::before {
                color: rgba(255, 255, 255, 0.5);
                content: attr(data-line-number);
                display: block;
            }

            .blob-code {
                padding: 5px 15px;
            }
        </style>
  </head>
  <body> 
    <div id="content_header">
      <button type="button">show source</button>
      <button type="button">show output</button>
      <button type="button">download</button>
      <button type="button">download all</button>
    </div>
    <div id="content_body">
      <?php
        function returnContent(int $number)
        {
          $contents = "";
          switch ($number) {
            case 1:
              javascript: alert("aaaa");
              $contents .= "show source";
              break;
            case 2:
              $contents .= "show output";              
              break;
            case 3:
              $contents .= "download";              
              break;
            case 4:
              $contents .= "download all";              
              break;
            
            default:
              $contents .= "default";              
              break;
          }
          echo "<p>$content</p>";
        }

        function download(string $filename)
        {
          $f = $filename;   
          $file = ("./$f");
          $filetype=filetype($file);
          $filename=basename($file);

          header ("Content-Type: ".$filetype);
          header ("Content-Length: ".filesize($file));
          header ("Content-Disposition: attachment; filename=".$filename);
          readfile($file);
        }
        

        // $hl = new Highlight\Highlighter();
        // $hl->setAutodetectLanguages(array('php', 'xml', 'css', 'javascript'));
        // $highlighted = $hl->highlightAuto(file_get_contents('./files/1/1/test.php'));

        // $lines = HighlightUtilities\splitCodeIntoArray($highlighted->value);

        // $source_str = "";
        // $source_str .= "<table><tbody>";
        // foreach ($lines as $number => $line){
        //   $source_str .= "<tr>"
        //   ."<td id=\"L$number\" data-line-number=\"$number\"></td>
        //   <td id=\"LC$number\" class=\"blob-code\">"
        //   ."<pre><code class=\"hljs $highlighted->language\">$line</code></pre>"
        //   ."</td></tr>";
        // }
        // $source_str .= "</tbody></table>";

        // echo $source_str;
      require "./files/1/3/test3.php";
        
        ?>
    </div>
    <div>
      <?php
      ?>
    </div>
  </body>
  
</html>

