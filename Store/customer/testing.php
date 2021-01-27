<?php
include("Buffer.php");
?>
<!DOCTYPE html>
<html>
<head>
	<script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
    	#result {
    		position: absolute;
    		width:100%;
    		max-width:900px;
    		overflow-y:auto;
    		max-height: 400px;
    		box-sizing: border-box;
    		z-index:1001;
    	}
    	#search {
    		text-align: left;
    	}
    	.link-class:hover{
    		background-color: #f1f1f1;
    	}
    </style>
    <script>
	$(document).ready(function(){

		$('#search').keyup(function(){
			$('#result').html(''); //result to be dispalyed in html
			var searchField = $('#search').val(); //fetching value which is typed till key up
			var expression = new RegExp(searchField,"i");
			$.getJSON('data.json',function(data) {
				$.each(data,function(key,value) {
					if(value.title.search(expression) != -1 || value.price.search(expression) != -1)
					{

						//if condition testing if the JSON data is set
						var img = src="../admin_area/product_images/"+value.image;
						var link = "details.php?pro_id="+value.id;
						$('#result').append('<li><a href="'+link+'" class="list-group-item list-group-item-action"><img src="'+img+'" height="40" width="40" class="img-thumbnail" /> '+value.title+' | <span class = "text-muted">$'+value.price+'</span></a></li>');


					}


				});

			});

		});
		 if($('#search').val() == "") {
				$('#result').empty();
			}

	});
	$(document).on('click', function(e) { //creating an event when the user clicks away from the input.
    if ( e.target.id != 'search' ) {
        // you clicked something else
        $('#result').empty();
    }

});
</script>

	
</head>
<body>
<p>
	<br/><br/>
</p>
<br>
<div class='container'>
	<div>
	<input dir="ltr" type='text' name='search' class='form-control' id='search'/><br/>
    </div>
    <ul class='list-group' id='result'></ul>
</br>
 </div>
<br />
</body>
</html>