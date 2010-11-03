/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Ext.onReady(function(){
 
});

$(document).ready(function(){
    //init_bindings();
    $('a.foooooobar').live('mouseover mouseout', function(event){
       if(event.type == 'mouseover')
       {
           console.log('in');
       }
       else
       {
           console.log('out');
       }
    });

    $('a.sort_letter').click(function(){
        console.log($(this).text());
        $('#member_results').load(update_url + '/' + $(this).text(), function(){
            console.log('loaded?');
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