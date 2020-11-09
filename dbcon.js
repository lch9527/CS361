var mysql = require('mysql');
var pool = mysql.createPool({
  connectionLimit : 10,
  host            : 'classmysql.engr.oregonstate.edu',
  user            : 'cs361_zhouzha',
  password        : '5554',
  database        : 'cs361_zhouzha'
});
module.exports.pool = pool;
