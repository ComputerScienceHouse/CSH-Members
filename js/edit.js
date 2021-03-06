Ext.onReady(function(){});

String.prototype.trim = function() {
    return this.replace(/^\s+|\s+$/g,"");
}

$(document).ready(function(){
    var content = '';


    $('a.edit_field').click(function(){
        // id of the edit button
        var value = $(this).attr('id');
        // either edit of save
        var type = $(this).text();
        // id of the div to edit
        var div_id = 'div#'+value;
        if(type == 'Edit')
        {
            $(div_id).css('background', '#E0DEDE');
            $(div_id).css('border', '1px solid #7D7D7D');
            $(div_id).attr('contenteditable', true);
            //var element = document.getElementById(id);
            //element.setAttribute('contenteditable', true);
            //element.style.background = "#C9C9C9";
            //element.style.border-radius = "5px";

            $(this).text('Save');
            $(this).attr('value', 'save');
        }
        else
        {
            $(div_id).css('background', 'none');
            $(div_id).css('border', 'none');
            $(div_id).attr('contenteditable', false);

            $(this).text('Edit');
            $(this).attr('value', 'edit');

            var new_data = $(div_id).text().trim();
            var div_data_id = $(div_id).attr('id');
            var field_type = $(div_id).attr('value');
            var index = div_data_id.replace(field_type+"_", "");
            var data_type = $(div_id).parent().attr('value');

            if(field_type == 'mail')
            {
                if(new_data.length < 1)
                {
                    new_data = 'DELETE';
                    $(div_id).parent().remove();
                }
            }

            console.log('ID: ' + value);
            console.log('div_id: ' + div_id);
            console.log('field type: ' + field_type);
            console.log('new data: ' + new_data);
            console.log('div data id: ' + div_data_id);
            console.log('index: ' + index);
            console.log('data_type: '+data_type);

            if(data_type == 'address')
            {
                var data = {
                    new_value: new_data,
                    field: field_type,
                    field_index: index,
                    uid: user_id
                }

                var field_index = data['field_index'].split('_');
                data['addressName'] = $(div_id).parent().parent().attr('value');

                
            }
            else
            {
                var data = {
                    new_value: new_data,
                    field: field_type,
                    field_index: index,
                    uid: user_id
                }
            }

            console.log(data);
            
            //console.log(data);
            var div_ref = $(this);
            //console.log(new_data);

            if(data_type == 'address')
            {
                var post_url = submit_change_address;
            }
            else
            {
                var post_url = update_field_url;
            }

            Ext.Ajax.request({
                url: post_url,
                success: function(response, opts)
                {
                    var obj = Ext.decode(response.responseText);
                    //console.log(obj);

                    if(obj == 'success')
                    {
                        //console.log('foo');
                        $(div_id).parent().css('background', '#bfffc7');
                        setTimeout(function(){
                            $(div_id).parent().css('background', '#fff');

                        }, 3000);
                    }
                    else
                    {
                        $(div_id).parent().css('background', '#ffbfbf');
                        setTimeout(function(){
                            $(div_id).parent().css('background', '#fff');

                        }, 3000);
                    }
                },
                failure: function(response, opts)
                {

                },
                params: data
            });
            
        }       

        return false;
    });


    

});