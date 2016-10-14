var mongoose = require('mongoose');


var commentSchema = mongoose.Schema({
    comment: {
        movieId: String,
        name: String,
        message: String,
        replies: [{
                name: String,
                message: String
        }]
    }
});


module.exports = mongoose.model('Comment', commentSchema);