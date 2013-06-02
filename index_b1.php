<?php
session_start();
require_once('config.inc.php');
require_once('functions.inc.php');
#require_once('establish_db_user_connection.php');

//if($connection==1){
//	$username = $mysqli->real_escape_string($_SESSION['username']);
//	}
if(!isset($_SESSION['username']))
        echo "<META http-equiv='refresh' content='0; URL=facebook/examples/example.php'>";
$username=$_SESSION['username'];
function randomArrayVar($array)
{
if (!is_array($array)){
return $array;
}
return $array[array_rand($array)];
}
 
//list of grettings as arary

$addrss = array(
	"http://lh5.ggpht.com/q82x-DXXCHF4rY1k-AoGr7U1sfL3WJCNmy4fuwpZu-awnwH21Ph-II9twpyBDmhCrVl7bj0cDkr4vcFs84R-=s1200",
	"http://lh5.ggpht.com/7i0W8mwaHHeUsSr8tSfwVnZPSs5XROp5-KHkiF1uOvU937gal-piQrBsf3O56SbZNh_t0zy1TFZsstC0GDtL=s1200",
	"http://lh6.ggpht.com/mSlpLyloBUS747S5mfmgDojFVDl_YzcBjgUI5PmA1g_C0MGTxu0lpfFN0KW-FibW9i3xzRaVr9S5YJQ6iBbi=s1200",
	"http://blogs-images.forbes.com/singularity/files/2013/01/Aaron_Swartz.jpg",
	"http://www.iloveindia.com/indian-heroes/pics/subhas-chandra-bose.jpg",
	);
$names = array(
	"Home Sparrow",
	"Madagascar Jasmine",
	"Lion",
	"Aaron Swartz",
	"Subhash Chandra Bose",
	);
$infos = array(
	"Passer domesticus",
	"Stephanotis floribunda",
	"Panthera leo",
	"Aaron Hillel Swartz (November 8, 1986 - January 11, 2013) was an American computer programmer, writer, political organizer and Internet activist.",
	"Netaji",
	);

$greeting= array(
		"KemCho?"=>"Kem Cho",
		"Hallo"=>"Hallo",
		"Salam"=>"Salam",
		"Komusta"=>"Komusta",
             "aloha"=>"Aloha",
             "ahoy"=>"Ahoy",
             "bonjour"=>"Bonjour",
             "gday"=>"G'day",
             "hello"=>"Hello",
             "hey"=>"Hey",
             "hi"=>"Hi",
             "hola"=>"Hola",
             "howdy"=>"Howdy",
             "rawr"=>"Rawr",
             "salutations"=>"Salutations",
             "sup"=>"Sup",
             "whatsup"=>"What's up",
             "yo"=>"Yo");
 
//echo greeting
//echo (randomArrayVar($greeting));
$i=rand(0,4);
$addrs=$addrss[$i];
$name=$names[$i];
$info=$infos[$i];
$infolink = "http://wikipedia.org/wiki/Special:Search?search=" . str_replace(" ", "+", $name);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sweet and cheery.">
    <meta name="author" content="Thomas Park">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="default/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootswatch.css" rel="stylesheet">
	<link href="css/images.css" rel="stylesheet">
	 <script type="text/javascript">

/*	   var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-23019901-1']);
		  _gaq.push(['_setDomainName', "bootswatch.com"]);
  		  _gaq.push(['_setAllowLinker', true]);
		  _gaq.push(['_trackPageview']);

	   (function() {
	     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	   })();
*/
	 </script>

  </head>
 
  <body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
  


  <!-- Navbar
    ================================================== -->
 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container" style="width: auto;">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;Project KYW&nbsp;&nbsp;&nbsp;&nbsp;</a>
        <div class="nav-collapse">
          <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
		 <li><a href="#myuploads">My Upoads</a></li>
            <li><a href="#upload">Upload a Photo</a></li>
		<li><a href="#video-upload">Upload a Video</a></li>
              <li><a href="post.php">Upload a Video</a></li>

		</ul>
            </li>
          </ul>
          <ul class="nav pull-right">
            <li><a href="logout.inc.php">Logout</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
   </div>
 </div>
    <div class="container">


<!-- Masthead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="row">
    <div class="span6">
      <p class="lead">
	<?php echo "<img src='http://graph.facebook.com/$username/picture'/>" ?>
	<?php echo (randomArrayVar($greeting));?>
	<?php echo $_SESSION['name']?></p>
    </div>
    <div class="span4 offset2">
      <div class="well" style="padding: 15px 15px 0 15px;">
        <a href="<?php echo $addrs;?>" target="_blank">
          <span style="float: left; margin: 0 15px 15px 0;">
            <img src=<?php echo $addrs;?> width="175" height="135" style="border-radius: 5px;">
          </span>
        </a>
        <a href="<?php echo $infolink?>" target="_blank">
          <h4 style="margin-bottom: 0.4em; color: #fff;"><?php echo $name;?></h4>
          <span style="display: block; margin-bottom: 1em; color: #fff;"><?php echo $info;?></span>
        </a>
        <div style="clear:both"></div>
      </div>
    </div>
  </div>
  <div class="subnav">
    <ul class="nav nav-pills">
      <li><a href="#closepacked">Home</a></li>
      <li style="float: right"><a href="#sort">Overview</a></li>
    </ul>
  </div>
</header>

<!-- Images
==================================== -->

<section id="closepacked">

<h1>Recently Added</h1>
  

<div id="container" class="clearfix">
  
<iframe scrolling='no' frameborder='0' width="100%" id='frmid' src='reaponsive_images/closepacked.php'
         onload='javascript:resizeIframe(this);'>
</iframe>  
</div> <!-- #container -->

<script language="javascript" type="text/javascript">
 function resizeIframe(obj)
 {
   obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
 }
 </script>


</section>

<!--- ------------  Sort          ------>
<!-- My ups===================== -->
<section id="sort">

<h1>Categorised Overview</h1>


<div id="container" class="clearfix">

<iframe scrolling='no' frameborder='0' width="100%" id='myifrmid' src='reaponsive_images/sort.php'
         onload='javascript:myiresizeIframe(this);'>
</iframe>
  </div> <!-- #container -->
<script language="javascript" type="text/javascript">
 function myiresizeIframe(obj)
 {
   obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
 }
 </script>
</section>


<section id="myuploads">

<h1>Your Uploads></h1>

<div id="container" class="clearfix">

<iframe scrolling='no' frameborder='0' width="100%" id='myfrmid' src='reaponsive_images/my.php'
         onload='javascript:myresizeIframe(this);'>
</iframe>
</div> <!-- #container -->

<script language="javascript" type="text/javascript">
 function myresizeIframe(obj)
 {
   obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
 }

 </script>
</section>
<!-- Uppload New ==============================-->
<section id="upload">
  <div class="page-header">
    <h1>Uploads</h1>
  </div>

  <div class="row">
    <div class="span10 offset1">



      <form enctype="multipart/form-data" class="form-horizontal well" method="post" action="processinput_multiple.php" enctype="multipart/form-data">
        <fieldset>
          <legend>Upload your images</legend>

          <div class="control-group">
            <label class="control-label" for="category">Select category</label>
            <div class="controls">
              <select id="category" name="category" style="width: 330px">
                                        <option value="people">Picked up garbage from height</option><option value="wild-life">Picked up garbage from river</option><option value="objects">Saved pollution by preventing burning of garbage</option><option value="None">Brought all my litter back</option>

                                        </select>

              </select>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<form><input type="button" class="btn btn-primary" value=" Select from Flickr " onclick="window.open('addfromflicker.php', '_self', false)"</form>
            </div>
          </div>
          <!--<div class="control-group">
            <label class="control-label" for="input01">Request category</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01" name="new_category">
              <p class="help-block">You can request a new category by admin</p>
            </div>
          </div>-->
          <div class="control-group">
	 <p class="help-block">The photograph before you cleaned</p>
            <label class="control-label" for="file">Upload File1</label>
            <div class="controls">
<input type="file" name="file[]" multiple />            
</div>
          </div>

          <div class="control-group">

            <label class="control-label" for="input01">Or Paste the Image URL1</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="httpurl1" value="URL" name="httpurl">
            </div>
          </div>




          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Done</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>

</section>

<!-- My Uploads ============================== -->
<section id="video-upload">
  <div class="page-header">
    <h1>Video Uploads</h1>
  </div>

  <div class="row">
    <div class="span10 offset1">



      <form class="form-horizontal well" method="post" action="processinput_video.php" enctype="multipart/form-data">
        <fieldset>
          <legend>Upload your Video</legend>


          <div class="control-group">
            <label class="control-label" for="category">Select category</label>
            <div class="controls">
              <select id="category" name="category">
                                        <option value="people">People</option><option value="wild-life">Wild Life</option><option value="objects">Objects</option><option value="None">Uncatagorized</option>

                                        </select>

              </select>
            </div>
          </div>
		<label class="control-label" for="text"> Url here:</label>
		<div class="controls"><input type="text" name="url" ></div>
		<p class="help-block">Paste URL from Youtube here</p>

            <button type="submit" class="btn btn-primary">Done</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>

</section>

     <!-- Footer
      ================================================== -->
      <hr>

      <footer id="footer">
        <p class="pull-right"><a href="#top">Back to top</a></p>
        <div class="links">
        </div>
        Made by <a href="http://rachitnimavat.com">Rachit Nimavat</a> and <a href="http://home.iitk.ac.in/~deepakc">Deepak Choudhary</a>.<br/>
	</p>      
</footer>

    </div><!-- /container -->



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.smooth-scroll.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
	<script src="js/jquery.imagesloaded.js"></script>
	<script src="js/images.js"></script>
	<script src="js/jquery.masonry.min.js"></script>
	<script src="js/jquery.infinitescroll.js"></script>
	<script src="js/jquery-1.7.1.min.js"></script>


  </body>
</html>
