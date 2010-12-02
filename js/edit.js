Ext.onReady(function(){});

$(document).ready(function(){
    var content = '';

    $('.field-value').focus(function(){
        content = $(this).text();
    });

    $('.field-value').blur(function(){
        var new_data = $(this).text();
        var data = {
            new_value: new_data,
            field: $(this).attr('id'),
            field_index: $(this).attr('value'),
            uid: user_id
        }

        var field_index = data['field_index'].split('_');
        data['addressName'] = $('#addressname_'+field_index[1]).text();

        //console.log(data);

        var div_ref = $(this);
        if(new_data != content)
        {
            //console.log(new_data);
            
            Ext.Ajax.request({
                url: submit_change_address,
                success: function(response, opts)
                {
                    var obj = Ext.decode(response.responseText);
                    //console.log(obj);
                    if(obj == 'success')
                    {
                        //console.log('foo');
                        div_ref.css('background', '#bfffc7');
                        setTimeout(function(){
                            div_ref.css('background', '#fff');

                        }, 3000);
                    }
                    else
                    {
                        div_ref.css('background', '#ffbfbf');
                        setTimeout(function(){
                            div_ref.css('background', '#fff');

                        }, 3000);
                    }
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
        var div_ref = $(this);
        if(new_data != content)
        {
            //console.log(new_data);
            
            Ext.Ajax.request({
                url: update_field_url,
                success: function(response, opts)
                {
                    var obj = Ext.decode(response.responseText);
                    //console.log(obj);

                    if(obj == 'success')
                    {
                        //console.log('foo');
                        div_ref.css('background', '#bfffc7');
                        setTimeout(function(){
                            div_ref.css('background', '#fff');

                        }, 3000);
                    }
                    else
                    {
                        div_ref.css('background', '#ffbfbf');
                        setTimeout(function(){
                            div_ref.css('background', '#fff');

                        }, 3000);
                    }
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