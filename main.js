/*
This is the main file of the book swap program
*/

var express = require('express');
var mysql = require('./dbcon.js');

var app = express();
app.use(bodyParser.urlencoded({extended:true}));
app.use('/static', express.static('public'));
app.set('port', process.argv[2]);
app.set('mysql', mysql);

app.use('/', express.static('public'));

app.use(function(req,res){
  res.status(404);
  res.render('404');
});

app.use(function(err, req, res, next){
  console.error(err.stack);
  res.status(500);
  res.render('500');
});

app.listen(app.get('port'), function(){
  console.log('Express started on http://localhost:' + app.get('port') + '; press Ctrl-C to terminate.');
});
