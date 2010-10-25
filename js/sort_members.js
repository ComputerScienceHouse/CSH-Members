/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Ext.onReady(function(){
 
});

$(document).ready(function(){

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
                   document.getElementById('member_results').innerHTML = obj;
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