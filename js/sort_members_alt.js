/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Ext.onReady(function(){
 
});

$(document).ready(function(){
    //init_bindings();

    $('a.sort_letter').click(function(){
        //console.log($(this).text());
        $('#member_results').load(update_url + '/' + $(this).text(), function(){
            //console.log('loaded?');
        });
    });

    $('.sort_member').live('click', function(){
        //console.log($(this).attr('value'));

        
        Ext.Ajax.request({
            url: get_member + '/'+$(this).attr('value'),
            success: function(response, opts)
            {
                var obj = Ext.decode(response.responseText);

                $('#member-profile').html('');
                $('#member-profile').append(obj);
            },
            failure: function(response, opts)
            {

            }
        });
        
    });
});




function getContent(letter, type)
{
    switch(type)
    {
        case 1:
            Ext.Ajax.request({
               url: update_url + '/' + letter,
               success: function(response, opts){
                   var obj = Ext.decode(response.responseText);
                   var test = $(obj);
                   $('#member_results').append(test);
                   
                   //document.getElementById('member_results').appendChild(obj);
               },
               failure: function(response, opts){
                   alert('data fetch failed');
               }
            });
            break;
        default:
            alert('Fuck, you broke it. Nice job...');
    }
}