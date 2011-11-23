
App.Egg = {};

App.Egg.DeleteProductionData = function() {
    
    $('body').delegate('.delete-production-data, .delete-production-feed, .delete-production-vitamin, .delete-production-comment, .delete-production-death', 'click', function() {
        
        var self = $(this), 
            fieldset = self.parents("fieldset:first"),
            notif;
        $.post(self.attr('href'), function(response) {
    
            if (response == '0') {
                notif = $('<div />', {'class': 'error round'}).html('Sikertelen művelet, próbálja később');
            } else {
                notif = $('<div />', {'class': 'success round'}).html('Sikeresen törölve')
            }            
            
            if (self.is('.delete-production-feed') || self.is('.delete-production-comment') || self.is('.delete-production-vitamin')) {
                
                self.parents('tr:first').find('td:eq(1)').remove();
                
                self.parents('td:first').before($('<td />', {'colspan': '4'}).html('<em>nincs bejegyzés</em>'));
                self.parents('td:first').remove();
            }
            
            if (self.is('.delete-production-death')) {
                self.parents('tr:first').find('td:eq(1)').remove();
                
                self.parents('td:first').before($('<td />', {'colspan': '5'}).html('<em>nincs bejegyzés</em>'));
                self.parents('td:first').remove();
            } 
            
            if (self.is('.delete-production-data')) {
                
                self.parents('tr:first').find('.td-data').html('0');
                self.parents('td:first').html('');
                
            }

            fieldset.before(notif).fadeIn('slow', function() {
                
                setTimeout(function() {
                    fieldset.prev().fadeOut('slow');
                }, 3000);
            }); 
            
            App.TriggerLoadWeekDataEvent($('#the-egg-week'), 'egg');
            
        });
        
        return false;
    });
};

App.Egg.UpdatePeoductionData = function() {

    $('body').delegate('.update-production-data', 'click', function() {

        var self = $(this)
            fieldset = self.parents("fieldset:first"),
            tr = self.parents('tr:first'),
            pieces = tr.find('input[type=text]'),
            types = tr.find('input[type=hidden]'),
            p = [], t = [];
        $.each(pieces, function(i, v) {
            p.push($(v).val());
        });    
        $.each(types, function(i, v) {
            t.push($(v).val());
        });    
        
        var data = {'pieces': p, 'egg_types': t};
        data[$('#csrf-token').attr('name')] = $('#csrf-token').val();
        $.post(self.attr('href'),data , function(response) {
            
            var notif;
            
            if (response == '0') {
                notif = $('<div />', {'class': 'error round'}).html('Sikertelen művelet, próbálja később');
            } else {
                notif = $('<div />', {'class': 'success round'}).html('Sikeresen frissítve')
            }
            
            fieldset.before(notif).fadeIn('slow', function() {
                
                setTimeout(function() {
                    fieldset.prev().fadeOut('slow');
                }, 3000);
            });
            
            App.TriggerLoadWeekDataEvent($('#the-egg-week'), 'egg');
        })    
            
        return false;
    });
},

App.Egg.UpdateFoodOrDeathForDay = function () {
    
    $('body').delegate('.update-production-feed, .update-production-death', 'click', function() {

        var self = $(this)
            fieldset = self.parents("fieldset:first"),
            tr = self.parents('tr:first'),
            form = tr.find('form'),
            f = {};
        
        $.post(self.attr('href'),form.serialize() , function(response) {
            
            var notif;
            
            if (response == '0') {
                notif = $('<div />', {'class': 'error round'}).html('Sikertelen művelet, próbálja később');
            } else {
                notif = $('<div />', {'class': 'success round'}).html('Sikeresen frissítve')
            }
            
            fieldset.before(notif).fadeIn('slow', function() {
                
                setTimeout(function() {
                    fieldset.prev().fadeOut('slow');
                }, 3000);
            });
            
            App.TriggerLoadWeekDataEvent($('#the-egg-week'), 'egg');
        });    
            
        return false;
    });
};

App.Egg.UpdateCommenOrVitamin = function(selector, field) {
    
    $('body').delegate(selector, 'click', function() {
        
        var self = $(this)
            fieldset = self.parents("fieldset:first"),
            tr = self.parents('tr:first'), data = {};
        
        data[$('#csrf-token').attr('name')] = $('#csrf-token').val();
        data[field] = tr.find('textarea').val();
        
        $.post(self.attr('href'), data , function(response) {
            
            var notif;
            
            if (response == '0') {
                notif = $('<div />', {'class': 'error round'}).html('Sikertelen művelet, próbálja később');
            } else {
                notif = $('<div />', {'class': 'success round'}).html('Sikeresen frissítve')
            }
            
            fieldset.before(notif).fadeIn('slow', function() {
                
                setTimeout(function() {
                    fieldset.prev().fadeOut('slow');
                }, 3000);
            });
            
            App.TriggerLoadWeekDataEvent($('#the-egg-week'), 'egg');
        });
        
        return false;
    });    
};


