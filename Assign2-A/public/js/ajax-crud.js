/**
 * Created by pezz on 10/4/2016.
 */

$('#cinema').on('change', function(e){
    console.log(e)
    window.alert("sometext");
    var cinema_id = e.target.value;


    //ajax
    $.get('/ajax-subcat?cinema_id=' + cinema_id, function(data){
        //success data
        window.alert("sometext");
        $('#sesh').empty();
        $.each(data, function(index, subcatObj){
            $('#sesh').append('<option value=""' + subcatObj.id +'">'+subcatObj.name+'</option>');

        });

    });

});