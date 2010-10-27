Ext.setup({
    tabletStartupScreen: 'tablet_startup.png',
    phoneStartupScreen: 'phone_startup.png',
    icon: 'icon.png',
    glossOnIcon: false,
    
    onReady: function() {
        Ext.regModel('Contact', {
                fields: ['firstName', 'lastName']
            });
        var groupingBase = {
            tpl: '<tpl for="."><div class="contact"><strong>{firstName}</strong> {lastName}</div></tpl>',
            itemSelector: 'div.contact',

            singleSelect: true,
            grouped: true,
            indexBar: true,

            disclosure: {
                scope: 'test',
                handler: function(record, btn, index) {
                    alert('Disclose more info for ' + record.get('firstName'));
                }
            },

            store: new Ext.data.Store({
                model: 'Contact',
                sorters: 'firstName',

                getGroupString : function(record) {
                    return record.get('firstName')[0];
                },

                data: [
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Ape', lastName: 'Evilias'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Ape', lastName: 'Evilias'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Ape', lastName: 'Evilias'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Ape', lastName: 'Evilias'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Zed', lastName: 'Zacharias'}
                ]
            })
        };

        /*
        if (!Ext.is.Phone) {
            new Ext.List(Ext.apply(groupingBase, {
                floating: true,
                width: 350,
                height: 370,
                centered: true,
                modal: true,
                hideOnMaskTap: false
            })).show();
        }
        else {
            new Ext.List(Ext.apply(groupingBase, {
                fullscreen: true
            }));
        }
        */


        var tpl = Ext.XTemplate.from('weather');
        
        var makeAjaxRequest = function() {
            Ext.getBody().mask(false, '<div class="demos-loading">Loading&hellip;</div>');
            Ext.Ajax.request({
                url: 'test.json',
                success: function(response, opts) {
                    Ext.getCmp('content').update(response.responseText);
                    Ext.getCmp('status').setTitle('Static test.json file loaded');
                    Ext.getBody().unmask();
                }
            });
        };
        
        var makeJSONPRequest = function() {
            Ext.getBody().mask(false, '<div class="demos-loading">Loading&hellip;</div>');
            Ext.util.JSONP.request({
                url: 'http://www.worldweatheronline.com/feed/weather.ashx',
                callbackKey: 'callback',
                params: {                    
                    key: '23f6a0ab24185952101705',
                    // palo alto
                    q: '94301',
                    format: 'json',
                    num_of_days: 5
                },
                callback: function(result) {
                    var weather = result.data.weather;
                    if (weather) {
                        var html = tpl.applyTemplate(weather);
                        Ext.getCmp('content').update(html);                        
                    }
                    else {
                        alert('There was an error retrieving the weather.');
                    }
                    Ext.getCmp('status').setTitle('Palo Alto, CA Weather');
                    Ext.getBody().unmask();
                }
            });
        };
        
        new Ext.Panel({
            fullscreen: true,
            id: 'content',
            scroll: 'vertical',
            dockedItems: [{
                xtype: 'toolbar',
                dock: 'top',
                items: [{
                    text: 'JSONP',
                    handler: makeJSONPRequest
                },{xtype: 'spacer'},{
                    text: 'XMLHTTP',
                    handler: makeAjaxRequest
                }]
            },{
                id: 'status',
                xtype: 'toolbar',
                dock: 'bottom',
                title: "Tap a button above."
            }],
            items: [groupingBase]
        });
    }
});
/*
Ext.setup({
    tabletStartupScreen: 'tablet_startup.png',
    phoneStartupScreen: 'phone_startup.png',
    icon: 'icon.png',
    glossOnIcon: false,
    onReady : function() {
        Ext.regModel('Contact', {
            fields: ['firstName', 'lastName']
        });

        var groupingBase = {
            tpl: '<tpl for="."><div class="contact"><strong>{firstName}</strong> {lastName}</div></tpl>',
            itemSelector: 'div.contact',

            singleSelect: true,
            grouped: true,
            indexBar: true,

            disclosure: {
                scope: 'test',
                handler: function(record, btn, index) {
                    alert('Disclose more info for ' + record.get('firstName'));
                }
            },

            store: new Ext.data.Store({
                model: 'Contact',
                sorters: 'firstName',

                getGroupString : function(record) {
                    return record.get('firstName')[0];
                },

                data: [
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Ape', lastName: 'Evilias'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Ape', lastName: 'Evilias'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Ape', lastName: 'Evilias'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Ape', lastName: 'Evilias'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Tommy', lastName: 'Maintz'},
                    {firstName: 'Ed', lastName: 'Spencer'},
                    {firstName: 'Jamie', lastName: 'Avins'},
                    {firstName: 'Aaron', lastName: 'Conran'},
                    {firstName: 'Dave', lastName: 'Kaneda'},
                    {firstName: 'Michael', lastName: 'Mullany'},
                    {firstName: 'Abraham', lastName: 'Elias'},
                    {firstName: 'Jay', lastName: 'Robinson'},
                    {firstName: 'Zed', lastName: 'Zacharias'}
                ]
            })
        };


        if (!Ext.is.Phone) {
            new Ext.List(Ext.apply(groupingBase, {
                floating: true,
                width: 350,
                height: 370,
                centered: true,
                modal: true,
                hideOnMaskTap: false
            })).show();
        }
        else {
            new Ext.List(Ext.apply(groupingBase, {
                fullscreen: true
            }));
        }
    }
});
*/