var App = App || {};

App.facebox = function() {
    
    $('a[rel*=facebox]').facebox({
        opacity: 0.6,
        loadingImage : App.URL + 'img/loading.gif',
        closeImage   : App.URL + 'img/cancel.png'
    });
    
    $('body').delegate('a[rel*=dialog]', 'click', function() {
        console.log($(this).attr('href'));
        $.get($(this).attr('href'), function(response) {
            console.log(response);
            var elem = $('<div />', {id: 'dialog'}).html(response);
            
            //$('body').append('elem');
            
            elem.dialog({
                modal: true,
                width: 'auto'   
            });
        });
        
        return false;
    });
};

App.Confirm = function() {
    $('body').delegate('.delete', 'click', function() {
        var self = $(this);
        var elem = $('<div />').html('Biztos törlöd?');
        
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
})