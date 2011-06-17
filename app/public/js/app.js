var App = App || {};

App.Dialog = function() {

    $('body').delegate('a[rel*=dialog]', 'click', function() {
        
        $('.dialog').remove();
        
        var self = $(this);
        
        
        var elem = $('<div />', {'class': 'dialog', id: 'dialog_'+(new Date()).getTime(), title: self.attr('title')}).html('<p style = "width: 300px;text-align:center"><img src = "'+App.URL+'img/pie.gif" /></p>');

        elem.dialog({
            modal: false,
            width: 'auto',
            minWidth: 500,
            position:[Math.floor((window.innerWidth / 2)-150),  70],
            open: function(event, ui) {
                
                $.get(self.attr('href'), function(response) {
                    elem.html(response);
                    //alert(window.innerHeight);
                    elem.dialog('option', 'position', [Math.floor(((window.innerWidth  - elem.width()) / 2)), window.pageYOffset]);
                    $('.ui-dialog').css('top',  window.pageYOffset + 70)
                    
                    if ($('form input[type=text]').length) {
                        
                        $.each($('form input[type=text]'), function(index, item) {
                            if ($(item).attr('size') === undefined) {
                                
                                $(item).attr('size', 45);
                            }
                        });
                    }

                    if ($('.datepicker').length) {
                        console.log('datepicker found');
                        App.Datepicker();
                    }
                    
                    if ($('#postal_code_id').length) {
                        
                        App.Autocomplete($('#postal_code_id'),  'postalcode/index/');
                    }
                    
                    if ($('#buyer_breeder_site_id').length) {
                        
                        App.Autocomplete($('#buyer_breeder_site_id'),  'breedersite/search_code_and_name');
                    }
                    
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
                },
                'Nem': function() {
                    $(this).dialog('close');
                }
            }
        });
        
        return false;
    });  
};

App.Datepicker = function() {
    
    $('.datepicker').datepicker('destroy');
    
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeYear: true,
        changeMonth: true,
        showMonthAfterYear:true,
        yearRange: '1980:+5'
	});
  
};

App.Autocomplete = function (element, url) {
    
    element.autocomplete({
        source: App.URL + url,
        select: function(e, ui) {
            var id = ui.item.id;
            
            element.after($('<input />', {
                type: 'hidden',
                name: element.attr('id'),
                value: id    
            }));
            
            element.removeAttr('name');
        }
    });    
};

App.FakkSortable = function() {
    $(".fakks-list").sortable({
		connectWith: ".fakks-list",
		stop: function (event, ui) {
		    var el = ui.item,
		        id = el.attr('fakkid'),
		        o = $(event.target).attr('group'),
		        n = el.parents('.fakks-list').attr('group');
		    
		    $.post(App.URL+'fakk/change_group', 
		        {
		            ci_csrf_token:$.cookie('ci_csrf_token'),
		            old_group: o,
		            new_group: n,
		            fakk_id: id
		        }, 
		        function() {
		        
		        }
		    );
		}
	}).disableSelection();     
};

App.DeleteProductionData = function() {
    
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
            
        });
        
        return false;
    });
};

App.UpdatePeoductionData = function() {

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
            
        })    
            
        return false;
    });
},

App.UpdateFoodOrDeathForDay = function () {
    
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
            
        });    
            
        return false;
    });
};

App.UpdateCommenOrVitamin = function(selector, field) {
    
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
            
        });
        
        return false;
    });    
},

App.SetSelectedBreedersite = function() {
    $('select[name=breeder_site_id]').bind('change', function() {
        var breederSite = $(this).val();
        
        if ($.trim(breederSite).length && breederSite != 0) {
            
            $.get(App.URL + "egg/set_selected_breedersite/"+breederSite, function() {
                location.reload();
            });
        } 
    });    
}

$(function() {
    App.Dialog();
    App.Confirm();
    
    $('button, input[type=submit], .button').button();
   
    $('#loading-global')
       .ajaxStart(function() {
           
    		$(this).show();
       })
       .ajaxStop(function() {
    		$(this).hide();
    });
    
     
    App.Datepicker();
    
    App.SetSelectedBreedersite();
    
    App.UpdatePeoductionData();
    App.DeleteProductionData();
    
    App.UpdateFoodOrDeathForDay();
    
    App.UpdateCommenOrVitamin('.update-production-comment', 'comment');
    App.UpdateCommenOrVitamin('.update-production-vitamin', 'vitamin');

});