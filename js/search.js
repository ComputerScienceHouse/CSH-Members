Ext.onReady(function(){

});

$(document).ready(function(){

    $('#search_form').submit(function(){
        Ext.Ajax.request({
            url: update_url,
            form: 'search_form',
            success: function(response, opts) {
                var obj = Ext.decode(response.responseText);
                //console.log(response.responseText);
                document.getElementById('results').innerHTML = obj;
            },
            failure: function(response, opts) {
                //console.log('server-side failure with status code ' + response.status);
            }

        });

        return false;
    });
});