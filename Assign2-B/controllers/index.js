var express = require('express');
var passport = require('passport');
var router = express.Router();
var mongoose = require('mongoose');
var request = require('request');
var Comment = require('../models/comment');


//to have access to credentials.js
var credentials = require('../config/credentials.js');

var requestUrl = 'https://api.themoviedb.org/3/discover/movie?api_key=3ef0081c4257264909dd561eda211666&language=en-US&sort_by=popularity.desc&primary_release_year=2016&vote_count.gte=18&vote_average.lte=8';


var opts = {
  server: {
    socketOptions: { keepAlive: 1 }
  }
};

// reading credentials from credentials.js
mongoose.connect(credentials.mongo.development.connectionString, opts);


router.get('/blog', function (req, res) {
    request(requestUrl, function (error, response, body) {
        if (!error && response.statusCode == 200) {

            // parse the json result
            var result = JSON.parse(body);

            res.render('blog.hbs', { movie: result, title: 'Movie Blog' });
        } else {
            console.log(error, response.statusCode, body);
        }

    });
});

router.get('/posts-:movie_id', function (req, res) {
    request(requestUrl, function (error, response, body) {
        if (!error && response.statusCode == 200) {

            // get the named paramiter movie_id
            var movie_id = req.params.movie_id;

            // parse the json result
            var result = JSON.parse(body);

            // iterate over each element in the array
            for (var i = 0; i < result.results.length; i++){
                // look for the entry with a matching `code` value
                if (result.results[i].id == movie_id){

                    var movie = result.results[i];
                }
            }

            Comment.find().where('comment.movieId').equals(movie_id)
                .then(function(doc) {
                    res.render('blog-post.hbs', {user: req.user, comment: doc, movie: movie, title: 'Movie Blog', movie_id: movie_id });
                });


        } else {
            console.log(error, response.statusCode, body);
        }

    });
});



/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { user: req.user, title: 'Express' });
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

//create a comment
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

    res.redirect('back');
});

//Reply to a comment
router.post('/reply', function(req, res, next) {
    var id = req.body.id;
    var movieId = req.body.movieId;

    Comment.findById(id, function(err, doc) {
        if (err) {
            console.error('error, no entry found');
        }

        var reply = {name: req.body.name, message:req.body.message};

        doc.comment.replies.push(reply);
        doc.save();
        res.redirect('back');
    });

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
  successRedirect: '/',
  failureRedirect: '/login',
  failureFlash: true,
}));



module.exports = router;

function isLoggedIn(req, res, next) {
  if (req.isAuthenticated())
    return next();
  res.redirect('/login');
}

