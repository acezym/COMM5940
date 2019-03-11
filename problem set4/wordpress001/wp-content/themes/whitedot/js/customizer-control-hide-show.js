/**
 * File customizer-control-hide-show.js.
 *
 * Handles the visiblity of Controls inside the Customizer panel.
 *
 */

(function( $ ) {
    wp.customize.bind( 'ready', function() {
    
    var customize = this;
    customize( 'enable_header_notice', function( value ) {
 

        var Controls = [
            'whitedot_header_notice',
            'header_notice_text_color',
            'enable_header_bar_call_to_action',
            'hide_header_notice_in_mobile'
        ];

        $.each( Controls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );

    } );

    var customize = this;
    customize( 'enable_header_bar_call_to_action', function( value ) {
 

        var Controls = [
            'call_to_action_text',
            'call_to_action_url',
            'calltoaction_bg_color',
            'calltoaction_text_color',
            'calltoaction_hover_bg_color',
            'calltoaction_hover_text_color'
        ];

        $.each( Controls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );

    } );

    function hideShowcalltoaction() {
        var colorControlIds = [
            'call_to_action_text',
            'call_to_action_url',
            'calltoaction_bg_color',
            'calltoaction_text_color',
            'calltoaction_hover_bg_color',
            'calltoaction_hover_text_color'

        ];

        if ( wp.customize.instance( 'enable_header_notice' ).get() === false && wp.customize.instance( 'enable_header_bar_call_to_action' ).get() === true ) {
            $.each( colorControlIds, function ( i, value ) {    
                $( '#customize-control-' + value ).hide();
            } );
        } else if ( wp.customize.instance( 'enable_header_notice' ).get() === true && wp.customize.instance( 'enable_header_bar_call_to_action' ).get() === false ) {
            $.each( colorControlIds, function ( i, value ) { 
                $( '#customize-control-' + value ).hide();
            } );
        } else if ( wp.customize.instance( 'enable_header_notice' ).get() === true && wp.customize.instance( 'enable_header_bar_call_to_action' ).get() === true ) {
            $.each( colorControlIds, function ( i, value ) { 
                $( '#customize-control-' + value ).show();
            } );
        } 
        
        return hideShowcalltoaction;

    }

    hideShowcalltoaction();
    $( '#customize-control-enable_header_notice' ).on( 'change', hideShowcalltoaction );
 

} );
})( jQuery );