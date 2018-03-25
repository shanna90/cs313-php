var express = require('express');
var app = express();
var url = require('url');

app.set('port', (process.env.PORT || 5000));

app.use(express.static(__dirname + '/public'));

// views is directory for all template files
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

app.get('/math', function(request, response) {
	handleMath(request, response);
});

app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});

var params = { };
var num=2;
	
function handleMath(request, response) {
	var requestUrl = url.parse(request.url, true);

	console.log("Query parameters: " + JSON.stringify(requestUrl.query));

	// TODO: Here we should check to make sure we have all the correct parameters

	var origin = requestUrl.query.origin;
	var origin_state = requestUrl.query.origin-st;
	var destination = requestUrl.query.destination;
	var destination_state = requestUrl.query.destination-st;
	var time = requestUrl.query.time;

	computeOperation(response, origin, origin_state, destination, destination_state, time);
}

function computeOperation(response, origin , origin-st, dest, dest-st, time) {
	loadCity('http://api.wunderground.com/api/2ea026e27b4c1c79/conditions/q/', origin, origin-st, callLoad);
	loadCity('http://api.wunderground.com/api/2ea026e27b4c1c79/conditions/q/', dest, dest-st, callLoad);

	distance = Math.sqrt(((Number(params.origin.lat)-Number(params.dest.lat))^2) +
		((Number(params.origin.log)-Number(params.dest.log))^2));
	params[dist] = distance;
	// Render the response, using the EJS page "result.ejs" in the pages directory
	// Makes sure to pass it the parameters we need.
	response.render('pages/itinerary', params);
}

function loadCity(url, city, state, cFunction) 
{
	var xhttp;
	
	{
		if (this.readyState == 4 && this.status == 200) {
			cFunction(this);
		}
	};
	var url_plus= url + state + '/' + city;
	xhttp.open("GET", url_plus, true);
	xhttp.send();
}

/* use for loading JSON files */
function callLoad(xhttp) {
	var jObj = JSON.parse(xhttp.responseText);
	var newCity = "city" + i;
	var newValue = jObj.display_location.full;
	param[newCity] = newValue;
	param.newCity.

	params[city] = jObj.display_location.full;
	params.city[lat] = jObj.display_location.latitude;
	params.city[log] = jObj.display_location.logitute;
	params.city[weather] = jObj.weather;
}