var express = require('express');
var passport = require('passport');
var router = express.Router();
var mongoose = require('mongoose');
var request = require('request');
var Comment = require('../models/comment');


//to have access to credentials.js
var credentials = require('../config/credentials.js');

var requestUrl = 'https://api.themoviedb.org/3/discover/movie?api_key=3ef0081c4257264909dd561eda211666&language=en-US&sort_by=release_date.desc&year=2016';


var opts = {
  server: {
    socketOptions: { keepAlive: 1 }
  }
};

// reading credentials from credentials.js
mongoose.connect(credentials.mongo.development.connectionString, opts);

router.get('/test', function (req, res) {
  request(requestUrl, function (error, response, body) {
    if (!error && response.statusCode == 200) {

      // parse the json result
      var result = JSON.parse(body);
      console.log(result);

     res.render('test.hbs', { movie: JSON.stringify(result), title: 'Movie Blog' });
    } else {
      console.log(error, response.statusCode, body);
    }

  });
});



/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { user: req.user, title: 'Express' });
});

router.get('/blog', isLoggedIn, function(req, res, next) {
  res.render('blog.hbs', { user: req.user, title: 'Movie Blog' });
});

router.get('/blog-post', function(req, res, next) {

  res.render('blog-post.hbs', {user: req.user, title: 'Movie Blog' });
});

router.get('/login', function(req, res, next) {
  res.render('login.hbs', {user: req.user, message: req.flash('loginMessage') });
});

router.get('/signup', function(req, res) {
  res.render('signup.hbs', { user: req.user, message: req.flash('loginMessage') });
});

router.get('/profile', isLoggedIn, function(req, res) {
  res.render('profile.hbs', { user: req.user });
});

router.get('/get-data', function(req, res, next) {
  Comment.find()
      .then(function(doc) {

          res.render('test.hbs', {movie: JSON.stringify(doc)});
      });
});

//UPDATE
router.get('/test-blog-post', function(req, res, next) {


    Comment.find().where('comment.movieId').equals('1234')
        .then(function(doc) {
            res.render('test-blog-post.hbs', {movie: doc});
        });

});

//UPDATE
router.post('/create', function(req, res, next) {
    var id = req.body.movieId;


        var data = new Comment({
            comment: {
                movieId: req.body.movieId,
                name: req.body.name,
                message: req.body.message,
                replies: []
            }
        });
        data.save();

    res.redirect('/');
});

//UPDATE
router.post('/reply', function(req, res, next) {
    var id = req.body.id;
    Comment.findById(id, function(err, doc) {
        if (err) {
            console.error('error, no entry found');
        }

        var reply = {name: req.body.name, message:req.body.message};

        doc.comment.replies.push(reply);
        doc.save();
        res.redirect('/test-blog-post');
    });


    //data.save();


});



//CREATE
router.get('/insert', function(req, res, next) {


  var data = new Comment({
    comment: {
        movieId: "1234",
      name: "Lucas",
      message: "this is a message",
      replies: [{name: "Rick", message: "Reply 1"}, {name: "Vin", message: "Reply 2"}, {name: "Luke", message: "Reply 3"}]

    }
  });
  data.save();

  res.redirect('/');
});


router.get('/logout', function(req, res) {
  req.logout();
  res.redirect('/');
});

router.post('/signup', passport.authenticate('local-signup', {
  successRedirect: '/profile',
  failureRedirect: '/signup',
  failureFlash: true,
}));

router.post('/login', passport.authenticate('local-login', {
  successRedirect: '/profile',
  failureRedirect: '/login',
  failureFlash: true,
}));



module.exports = router;

function isLoggedIn(req, res, next) {
  if (req.isAuthenticated())
    return next();
  res.redirect('/login');
}

