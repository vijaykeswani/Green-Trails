<!DOCTYPE html>

<html lang="en">

<head>
        <link rel="canonical" href="http://osvaldas.info/examples/responsive-jquery-masonry-or-pinterest-style-layout">
        <link rel="icon" href="http://osvaldas.info/theme/img/favicon.ico" />
        <link rel="stylesheet" href="http://osvaldas.info/theme/css/reset.css" />
        <link rel="stylesheet" href="http://osvaldas.info/examples/main.css" />
        <!--[if lt IE 9]>
        <script src="/theme/js/html5.js"></script>
        <script src="/theme/js/ie9.js"></script>
        <![endif]-->
        <style>
                body
                {
/*                        background-color: #2d3033;*/
                        background: rgba(42,99,105,0.8) none;
			padding: 3.75em 1.875em; /* 60px 30px */
                }
                strong
                {
                        font-weight: 700;
                }


                h1
                {
                        font-size: 1.625em; /* 26px */
                        font-style: italic;
                        letter-spacing: -0.1em; /* 1px */
                        text-align: center;
                        margin-bottom: 1.875em; /* 30px */
                }
                        h1,
                        h1 a
                        {
                                color: #fff;
                                color: rgba( 255, 255, 255, .5 );
                        }
                                h1 a:hover
                                {
                                        color: #fff;
                                }

                #wrapper
                {
                        max-width: 60em; /* 960 px */
                        margin: 0 auto;
			margin-left: 22px;
                }
                        #list
                        {
                                width: 103.125%; /* 990px */
                                overflow: hidden;
                                margin-left: -1.562%; /* 15px */
                               margin-bottom: -1.875em; /* 30px */
                        }
                                .item
                                {
                                        width: 30.303%; /* 300px */
                                        /*background-color: #fff;
                                        background-color: rgba( 255, 255, 255, .5 );*/
                                        float: left;
                                        margin: 0 1.515% 1.875em; /* 15px 30px */
                                }

                @media only screen and ( max-width: 40em ) /* 640px */
                {
                        .item
                        {
                                width: 46.876%; /* 305px */
                                margin-bottom: 0.938em;/* 15px */
                        }
                }

                @media only screen and ( max-width: 20em ) /* 320px */
                {
                        #list
                        {
                                width: 100%;
                                margin-left: 0;
                        }
                                .item
                                {
                                        width: 100%;
                                        margin-left: 0;
                                        margin-right: 0;
                                }
                }
        </style>
</head>

<body>




<!--
        AD
-->





<div id="wrapper">
<div><font style="color:#000000"> &nbsp;&nbsp;&nbsp;<h2></h2><div id="list">
        <?php

                        



for($i=0;$i<2;$i++)
                        {
                                //$picid= $row_inside['picid'];
                                //$userid= $row_inside['ownerid'];
				//if($row_inside['local']==1) $src="../upload/".$picid;
                                //else {
                                  //      $here = explode(":", $row_inside['picid']);
                                    //    $src=$here[2];
                                //}

                                echo  '<div class="item">
                                      <img src="'.$src.'" alt="Photo" width="250"/>
                               </div>';
				

                        }
        ?>
</div></font></div>
</div>

<script src="http://osvaldas.info/theme/js/jquery.js"></script>
<script src="http://osvaldas.info/examples/responsive-jquery-masonry-or-pinterest-style-layout/masonry.js"></script>
<script>
        $( function()
        {
            var columns    = 3,
                setColumns = function() { columns = $( window ).width() > 640 ? 3 : $( window ).width() > 320 ? 2 : 1; };

            setColumns();
            $( window ).resize( setColumns );

            $( '#list' ).masonry(
            {
                itemSelector: '.item'
//              columnWidth:  function( containerWidth ) { return containerWidth / columns; }
        //      columnWidth:  200        
   });
        });
</script>


</body>
</html>
                                                                        
