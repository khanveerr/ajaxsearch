<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style type="text/css">
		.padding-10 {
			padding: 10px;
		}

		form input[type=text] {
			width: 400px !important;
		}

	</style>
</head>
<body>

	<div class="container padding-10">
		<form role="form" class="form-inline" method="get">
			<div class="form-group">
				<label for="name">Enter name</label>
				<input id="name" name="name" type="text" class="form-control" placeholder="Type the name" />
			</div>
			<div class="form-group">
				<input type="button" class="btn btn-default btnSearch"  value="Search" />
			</div>
		</form>
		<table id="resultTable" class="table">
		    <thead>
		        <tr>
		            <th>Id</th>
		            <th>Name</th>
		            <th>Email</th>
		            <th>Telephone</th>
		        </tr>
		    </thead>
		    <tbody></tbody>
		</table>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('.btnSearch').click(function(){
			    makeAjaxRequest();
			});
			 
			$('form').submit(function(e){
			    e.preventDefault();
			    makeAjaxRequest();
			});

			makeAjaxRequest();

		});

		function makeAjaxRequest() {
		    $.ajax({
		        url: 'search.php',
		        type: 'get',
		        data: {name: $('input#name').val()},
		        success: function(response) {
		            $('table#resultTable tbody').html(response);
		        }
		    });
		}

	</script>
</body>
</html>