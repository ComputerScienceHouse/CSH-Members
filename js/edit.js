Ext.onReady(function(){});

$(document).ready(function(){
    var content = '';

    $('.inner').focus(function(){
        content = $(this).text();
    });

    $('.inner').blur(function(){
        var new_data = $(this).text();
        var data = {
                new_value: new_data,
                field: $(this).attr('id'),
                field_index: $(this).attr('value'),
                uid: user_id
            }
        console.log(data);
        /*
        if(new_data != content)
        {
            //console.log(new_data);
            var data = {
                new_value: new_data,
                field: $(this).attr('id'),
                uid: user_id
            }

            Ext.Ajax.request({
                url: update_field_url,
                success: function(response, opts)
                {
                    var obj = Ext.decode(response.responseText);
                    //console.log(obj);
                },
                failure: function(response, opts)
                {

                },
                params: data
            });
        }
        else
        {
            //console.log('no change');
        }
        */

    });
});