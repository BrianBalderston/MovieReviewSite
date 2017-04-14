// JavaScript Document

(function() {
	var movDetails = document.querySelectorAll('.swapdetails'),  ///anything with .swapdetails can be clicked to trigger this. images and links
		movName = document.querySelector('h2'),
		movTrailer = document.querySelector('.movietrailer'),
		
		
		carModelNum = document.querySelector('h4 span'),
		httpRequest;
	
		function makeRequest() {
			httpRequest = new XMLHttpRequest();
			console.log("You clicked a videos info button!");
//can name this ^ part whatever
			
			if (!httpRequest) {
				console.log('Your browser doesnt support this');
				return false;
			}
			
			httpRequest.onreadystatechange = showMovieInfo;
			httpRequest.open('GET', 'admin/phpscripts/ajaxQuery.php' + '?movies_id=' + this.id); ////? = a query parameter
			httpRequest.send();
		}
	
	function showMovieInfo() {
		if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200)
			{
				//parse stringified result
				var movieData = JSON.parse(httpRequest.responseText);
				
				
				movName.firstChild.nodeValue = movieData.movies_title;

				
				//carModelNum.firstChild.nodeValue = ' MINI COOPER ' + movieData.movies_id;
				
				//carName.firstChild.nodeValue = movieData.modelName;
				
				//carPrice.firstChild.nodeValue = movieData.pricing;
				
				//carDesc.firstChild.nodeValue = movieData.modelDetails;

			}
	}
	
		//event handling
	[].forEach.call(movDetails, function(img) {
		img.addEventListener('click', makeRequest, false);
	});
	
})();


