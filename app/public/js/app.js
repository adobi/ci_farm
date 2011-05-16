var App = App || {};

App.Dialog = function() {

    $('body').delegate('a[rel*=dialog]', 'click', function() {
        
        var self = $(this);
        
        
        var elem = $('<div />', {id: 'dialog', title: self.attr('title')}).html('<p style = "width: 300px;text-align:center"><img src = "'+App.URL+'img/fb-loader.gif" /></p>');

        elem.dialog({
            modal: true,
            width: 'auto',
            minWidth: 500,
            position:[Math.floor((window.innerWidth / 2)-150), 20],
            open: function(event, ui) {
                
                $.get(self.attr('href'), function(response) {
                    elem.html(response);
                    $('button').button();
                });
                
            }
        });
        
        return false;
    });
};

App.TriggerDialogOpen = function(dialogId) {
    $('[dialog_id='+dialogId+']').trigger('click');
};

App.Confirm = function() {
    $('body').delegate('.delete', 'click', function() {
        var self = $(this);
        var elem = $('<div />', {title: 'Figyelmztetés'}).html('Biztos törlöd?');
        
        elem.dialog({
            modal: true,
            buttons: {
                'Igen': function() {
                    window.location = self.attr('href');
                    //location.reload();
                    //return true;
                },
                'Nem': function() {
                    $(this).dialog('close');
                    //return false;
                }
            }
        });
        
        return false;
    });  
};

$(function() {
    App.Dialog();
    App.Confirm();
    
    $('button, input[type=submit]').button();
})