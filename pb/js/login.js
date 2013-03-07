// JavaScript Document


$(document).ready(function() {
document.getElementById( 'signup' ).addEventListener( 'click', function( event ) {
    
    event.preventDefault();
    document.getElementById( 'side-2' ).className = 'flip flip-side-1';
    document.getElementById( 'side-1' ).className = 'flip flip-side-2';
    
}, false );

document.getElementById( 'login1' ).addEventListener( 'click', function( event ) {
    
    event.preventDefault();
    document.getElementById( 'side-2' ).className = 'flip';
    document.getElementById( 'side-1' ).className = 'flip';
    
}, false );
});
