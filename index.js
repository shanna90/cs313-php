var express = require('express');
var app = express();
var url = require('url');
var request = require('request');
var XMLHttpRequest = require("xmlhttprequest").XMLHttpRequest;
var i = 1;

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

var params = { dest:{name:'', lat:'', log:'', weather:''}, origin:{name:'', lat:'', log:'', weather:''}, dist:'0'};
var num=2;
	
function handleMath(request, response) {
	var requestUrl = url.parse(request.url, true);

	console.log("Query parameters: " + JSON.stringify(requestUrl.query));

	// TODO: Here we should check to make sure we have all the correct parameters

	var origin = requestUrl.query.origin;
	var origin_state = requestUrl.query.origin_st;
	var destination = requestUrl.query.destination;
	var destination_state = requestUrl.query.destination_st;
	var time = requestUrl.query.time;

	computeOperation(response, origin, origin_state, destination, destination_state, time);
}

function computeOperation(response, origin , origin_st, dest, dest_st, time) {

	loadCity('http://api.wunderground.com/api/2ea026e27b4c1c79/conditions/q/', origin, origin_st, callLoadO);
	loadCity('http://api.wunderground.com/api/2ea026e27b4c1c79/conditions/q/', dest, dest_st, callLoadD);
	{
		console.log("num=0 : starting computation")
		distance = Math.sqrt(((Number(params.origin.lat)-Number(params.dest.lat))^2) +
			((Number(params.origin.log)-Number(params.dest.log))^2));
		params.dist = distance;
		console.log(params);
		response.render('pages/itenerary', params);
	}
}

function loadCity(url, city, state, cFunction) 
{
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			cFunction(this);
		}
	};
	var url_plus= url + state + '/' + city + '.json';
	console.log(url_plus);
	xhttp.open("GET", url_plus, true);
	xhttp.send();
}

/* use for loading JSON files */
function callLoadO(xhttp) {
	var jObj = JSON.parse(xhttp.responseText);
	console.log(jObj.current_observation.display_location.full);
	params.origin.name = jObj.current_observation.display_location.full;
	console.log(jObj.current_observation.display_location.latitude);
	params.origin.lat = jObj.current_observation.display_location.latitude;
	console.log(jObj.current_observation.display_location.longitude);
	params.origin.log = jObj.current_observation.display_location.longitude;
	console.log(jObj.current_observation.weather);
	params.origin.weather = jObj.current_observation.weather;
	console.log(params);
	num--;
	console.log(num);
}
function callLoadD(xhttp) {
	var jObj = JSON.parse(xhttp.responseText);
	console.log(jObj.current_observation.display_location.full);
	params.dest.name = jObj.current_observation.display_location.full;
	params.dest.lat = jObj.current_observation.display_location.latitude;
	params.dest.log = jObj.current_observation.display_location.longitude;
	params.dest.weather = jObj.current_observation.weather;
	console.log(params);
	num--;
	console.log(num);
}
