$(function(){
    var $optionsSwitch = $('.options-switch');
    var $optionsMenu = $('.options-dropdown');
    $optionsSwitch.click(function(e){
        $optionsMenu.slideToggle(75);
        e.stopPropagation();
    });

    $(document).click(function(e){

        if (!$optionsMenu.is(e.target)
            && $optionsMenu.has(e.target).length === 0)
        {
            $optionsMenu.slideUp(75);
        }
    });

});