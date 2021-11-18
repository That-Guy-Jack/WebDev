var nodemailer = require("nodemailer");
var handlebars = require("handlebars");
var fs = require("fs");
let transporter = nodemailer.createTransport({
    pool: true,
    host: "mail.privateemail.com",
    port: 587,
    secure: false, // use TLS
    auth: {
      user: "Jack@thatguyjack.co.uk",
      pass: "Jack32145@",
    },
  });
  
var prefix = "/home/ubuntu/webdev-email-v2/"
  
var readHTMLFile = function(path, callback) {
    fs.readFile(path, {encoding: 'utf-8'}, function (err, html) {
        if (err) {
            throw err;
            callback(err);
        }
        else {
            callback(null, html);
        }
    });
};
var mailOptions = {
    from: 'no-reply@thatguyjack.co.uk',
    to: 'no-reply@thatguyjack.co.uk',
    subject: 'Sending Email using Node.js',
    text: 'That was easy!'
};

var mysql = require('mysql');
//const distance = require('distance.js');
var con = mysql.createConnection({
  	host: "db.thatguyjack.co.uk",
  	user: "webdev",
	password: "webdev32145",
	database: "webdev_db"
});

con.connect(function(err) {
	if (err) throw err;
	//console.log("You are connected!");
    check();
});
var count = 0;

/*var mURL = new Array()

fs.readFile(prefix+'memes.txt', function(err, data) {
    if(err) throw err;
    mURL = data.toString().split("\n");
    for(i in mURL) {
        console.log(mURL[i]);
    }
});
*/

//console.log(mURL);

function check(){
    query = "SELECT user_email FROM contact WHERE send_email = '1'";
    con.query(query, function(error,results,fields){
        if(error) throw error;
        //console.log(results);

        results.forEach(row => {
            newID = true;

            con.query("UPDATE contact SET `send_email` = '0' WHERE (`user_email` = '" + row["user_email"] + "');"  , function(error,results,fields){
                if(error) throw error;
            });
            console.log("BD updated")
            if(newID == true){

                    var htmlToSend;
                    readHTMLFile(prefix+"email.html",function(err,html){
                        //console.log(html)
                        //console.log(randURL)
                        var template = handlebars.compile(html);
                        var replacements = {
                            htmlURL: "https://hotbeans.net",
                        };


                        htmlToSend = template(replacements);
                        var mailOptions = {
                            from: 'hotbeans-net-no-reply@thatguyjack.co.uk',
                            to: row["user_email"],
                            subject: 'HotBeans.net! Welcome Email!',
                            html: htmlToSend
                        };
                        //console.log(htmlToSend)
                        console.log("Job Finished! - " + row["user_email"]);
                        //console.log(mailOptions)
                        //console.log(replacements);
                        SendMail(mailOptions,results);
                    });
            }
            count += 1;
        });
        if(count == results.length){
            disconnect();
            console.log("No Emails");
        }
        
    });
}
function SendMail(options,results){
  
    transporter.sendMail(options, function(error, info){
        if (error) {
        console.log(error);
        } else {
        console.log('Email sent: ' + info.response);
        }
    });
    console.log(count)
    console.log(results.length)
}

function disconnect(){
    con.end();
}
