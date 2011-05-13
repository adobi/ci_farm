var App = App || {};

App.facebox = function() {
    
    $('a[rel*=facebox]').facebox({
        opacity: 0.6,
        loadingImage : App.URL + 'img/loading.gif',
        closeImage   : App.URL + 'img/cancel.png'
    });
    
    $('body').delegate('a[rel*=dialog]', 'click', function() {
        var self = $(this);
        $.get(self.attr('href'), function(response) {
            
            var elem = $('<div />', {id: 'dialog', title: self.attr('title')}).html(response);
            
            //$('body').append('elem');
            
            elem.dialog({
                modal: true,
                width: 'auto'   
            });
            $('button').button();
        });
        
        return false;
    });
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
    App.facebox();
    App.Confirm();
    
    $('button, input[type=submit]').button();
})