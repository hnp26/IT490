//var api_key = 'd6fb865f0d167679bbe87e722ea09bdc'; // Get your API key at developer.betterdoctor.com
//var doctor_uid = '333d4bb6fcf640e18e93b11b00fe09eb';
//var resource_url = 'https://api.betterdoctor.com/2016-03-01/doctors/'+ doctor_uid + '?user_key=' + api_key;

//$.get(resource_url, function (data) {
    //var http = new XMLHttpRequest();
    //http.open('get','link.php?data=' + data);


  //  var template = Handlebars.compile(document.getElementById('doc-template').innerHTML);
    //document.getElementById('content-placeholder').innerHTML = template(data);
//});
//$(document).ready(function(){
                /* call the php that has the php array which is json_encoded */
                $.get('link.php', function(data) {
                        /* data will hold the php array as a javascript object */
                        var template = Handlebars.compile(document.getElementById('doc-template').innerHTML);
                        document.getElementById('content-placeholder').innerHTML = template(data);
                });

        //});
