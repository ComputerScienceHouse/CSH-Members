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
        console.log('jquery');
        $('#results').load(sort_members + '/' + $(this).text(), function(){
            //console.log('loaded?');
        });
    });
});