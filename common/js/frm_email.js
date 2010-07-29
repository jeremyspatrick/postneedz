/*!
 * Ext JS Library 3.0.0
 * Copyright(c) 2006-2009 Ext JS, LLC
 * licensing@extjs.com
 * http://www.extjs.com/license
 */
Ext.onReady(function() {
    var form = new Ext.form.FormPanel({  
    	
    	
    	standardSubmit: false,
        baseCls: 'x-plain',
        layout:'absolute',
        //url:'frm_email.php',
        defaultType: 'textfield',

        items: [{ 
            x: 0,
            y: 5,
            xtype:'label',
            text: 'Name:'
        },{
            x: 60,
            y: 0,
            name: 'name',
            anchor:'100%'  // anchor width by percentage
        },{
            x: 0,
            y: 35,
            xtype:'label',
            text: 'Email:'
        },{
            x: 60,
            y: 30,
            name: 'email',
            anchor: '100%'  // anchor width by percentage
        },{
            x: 0,
            y: 65,
            xtype:'label',
            text: 'Comments:'
        },{
            x:60,
            y: 60, 
            xtype: 'textarea',
            name: 'comments',
            anchor: '100% 100%'  // anchor width and height
        }]
    });

    var window = new Ext.Window({
        title: 'Notify me of updates!',
        width: 300,
        height:200,
        minWidth: 300,
        minHeight: 200,
        layout: 'fit',
        plain:true,
        bodyStyle:'padding:5px;',
        buttonAlign:'center',
        items: form,

        buttons: [{
            text: 'Submit',
            handler: function() {
        		form.getForm().getEl().dom.action = 'frm_email.php';
        	    form.getForm().getEl().dom.method = 'POST';
                form.getForm().submit();
                window.hide();
            }
        }]
    });
    
    window.show();
    
    
});