<!doctype html>
<html>
    <head>
       <meta charset="utf-8"/>

           <title>journal de bord </title>
              <link href= "css/font-awesome.min.css" rel= "stylesheet" >
             <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet"> 
             <link href="bstyle.css" type="text/css" rel="stylesheet">
             <link rel="stylesheet" type="text/css" href="animate.css">
	 </head>
    <body>
         <header>
             <h1 class= "animated zoomIn"><img src="/blog/imageBlog/simplon.png"> mon journal de bord </h1>
             
          <hr>
             <div class="menu">
               <ul>
	               <li><a href="#">accueil</a></li>
	               <li><a href="#">acquis</a><i class="fa fa-angle-down" aria-hidden="true"></i>
	                 <ul class="capter">
		                <?php
							$blog = scandir("articles");
                             $blog = array_diff($blog, array(".",".."));
							foreach ($blog as $sujet) 
							{
								$name = basename($sujet, ".php");
								echo "<li> <a href=\"blog.php?contenu=$name\">$name</a></li>";
							}
                              
					?>
		            </ul>
	               </li>
	               <li><a href="#">a revoir</a><i class="fa fa-angle-down" aria-hidden="true"></i>
		                 <ul class='capter'>
	                          <?php
	                          $Myblog = scandir("articles2");
	                          $Myblog = array_diff($Myblog, array(".", ".."));

	                          foreach ($Myblog as $tout)
	                              {
	                                    $justname = basename($tout, ".php");
	                                	echo "<li> <a href=\"blog.php?boite=$justname\">$justname</a></li>";
	                              }  		                            
	                          ?>
		                 </ul>
		          </li>
               </ul>
             </div>
        
         </header>

         <main>
         	<article>
           <?php
         	$articles_dir = "articles2";
         	$show_article = false;
         	
         	if(isset($_GET['boite']))
         	{
         		$article_path = "$articles_dir/" . $_GET['boite'] . ".php" ;

         		if(
         			dirname(
         				realpath($article_path)
         				) == (
         				realpath("./$articles_dir")
         				)
         			)
         	{
         			$show_article = true;
         			include ($article_path);
         	}
         	}
           ?>



         	<?php
         	$articles_Dir = "articles";
         	$show_Article = false;
         	
         	if(isset($_GET['contenu']))
         	{
         		$article_Path = "$articles_Dir/" . $_GET['contenu'] . ".php" ;

         		if(
         			dirname(
         				realpath($article_Path)
         				) == (
         				realpath("./$articles_Dir")
         				)
         			)
         	{
         			$show_Article = true;
         			include ($article_Path);
         	}
         	}
           ?>


       
 

   <?php
   $NomPhp = $_GET['contenu'] . ".php" ;
    $numero = array_search($NomPhp, $blog);
    $articlePrecedent = $blog[$numero - 1] ;
    $articleSuivant = $blog[$numero + 1];
$PrecedentSansPhp = basename($articlePrecedent, ".php");
$SuivantSansPhp = basename($articleSuivant, ".php");
 


   ?>
<li><a href="blog.php?contenu=<?= $PrecedentSansPhp ?>">precedent</a></li>
  <li><a href="blog.php?contenu=<?= $SuivantSansPhp ?>">suivant</a></li>
    
<?php
$unevariable = $_GET['boite'] . ".php" ;
$Lenumero = array_search($unevariable, $Myblog);
$precedent = $Myblog[$Lenumero -1];
$Suivant = $Myblog[$Lenumero + 1];
$precedentNonephp = basename($precedent, ".php");
$SuivantNonephp = basename($Suivant, ".php");



?>

<li><a href="blog.php?boite=<?php echo $precedentNonephp ?>">avant</a></li>
<li><a href="blog.php?boite=<?php echo $SuivantNonephp ?>">apres</a></li>
           
       


         	</article>
         </main>
         <footer>
     
		</footer>
    </body>
</html>