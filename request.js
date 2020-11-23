module.exports = function(){
    var express = require('express');
    var router = express.Router();

    function getRequests(res, mysql, context, complete){
        mysql.pool.query('SELECT RID, Book_number, Requestr FROM REQUEST', function(error, results, fields){
            if(error){
                res.write(JSON.stringify(error));
                res.end();
            }
            context.requests  = results;
            complete();
        });
    }

    function getBook(res, mysql, context, complete){
        mysql.pool.query('SELECT Bnumber, Bname, Auther, Credit, Owner_name FROM BOOK', function(error, results, fields){
            if(error){
                res.write(JSON.stringify(error));
                res.end();
            }
            context.book = results;
            complete();
        });
    }

    function getUser(res, mysql, context, id, complete){
        mysql.pool.query('SELECT User_name, Address, E_mail, Credit_remain, Credit_Pend, Request_id FROM THEUSER', function(error, results, fields){
            if(error){
                res.write(JSON.stringify(error));
                res.end();
            }
            context.user = results;
            complete();
        });
    }

    /*Display all people. Requires web based javascript to delete users with AJAX*/

    router.get('/', function(req, res){
        var callbackCount = 0;
        var context = {};
        context.jsscripts = ["filterpeople.js","searchpeople.js"];   /////////////////////************/
        var mysql = req.app.get('mysql');
        getRequests(res, mysql, context, complete);
        getBook(res, mysql, context, complete);
        getUser(res, mysql, context, complete);
        function complete(){
            callbackCount++;
            if(callbackCount >= 2){
                res.render('user', context);
            }

        }
    });

    return router;
}();