var express = require('express');
var passport = require('passport');
var router = express.Router();
var mongoose = require('mongoose');

//to have access to credentials.js
var credentials = require('../config/credentials.js');


var opts = {
  server: {
    socketOptions: { keepAlive: 1 }
  }
};

// reading credentials from credentials.js
mongoose.connect(credentials.mongo.development.connectionString, opts);




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

