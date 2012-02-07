App.Egg = {
    
    AddStockToFakk: function() {
        $('body').delegate('#add-stock-to-fakk', 'click', function() {
            
            var self = $(this), fakk = $('#fakks').find(':checked').val(), stock = $("#stocks").find(':checked').val();
            
            if (fakk && stock) {
                var dialog = $('#dialog-add-stock-to-fakk');
                
                dialog.attr('href', App.URL + self.data('target') + '/add_stock_to_fakk/' + fakk + '/' + stock);
                
                $('#dialog-add-stock-to-fakk').trigger('click');
            }
            
            return false;
        });
        
        $('#fakks-and-stocks').equalHeights();
    }
};

$(function() {
    App.Egg.AddStockToFakk();
});