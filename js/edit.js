Ext.onReady(function(){});

$(document).ready(function(){
    var content = '';

    $('.content').focus(function(){
        content = $(this).text();
    });

    $('.content').blur(function(){
        var new_data = $(this).text();

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

    });
});